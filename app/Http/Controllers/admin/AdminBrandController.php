<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;

class AdminBrandController extends Controller
{
    //
    function create(){

        return view('backend.pages.brand.create');
    }

    function store(Request $req){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',

        ],
        [
            'name.required' => 'please, insert Valid brand Name!!',
            'image.required' => 'Please, Insert Valid brand-Image Like .jpg .png .gif .svg extension !!',
        ]);


        $brands = new Brand;
        $brands->name = $req->name;
        $brands->description = $req->description;


            //insert image
            if($req->has('image')){
            $image = $req->file('image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images/brand');
            $image->move($dest,$reImage);

            // save in database
            $brands->image = $reImage;

        }

        $brands->save();


        return back()->with('success', ' brand has been added successfully!!');

    }

    function show(){
        $brands = Brand::orderBy('id','desc')->get();
       return view('backend.pages.brand.show',compact('brands'));
    }

    function edit($id){

         $brand = Brand::find($id);
         if(!is_null($brand)){
            return view('backend.pages.brand.edit',compact('brand'));
         }
         else{
             return back()->with('error','There is no data in this brand');
         }

    }

    function update(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',

        ],
        [
            'name.required' => 'please, insert Valid brand Name!!',
            'image.required' => 'Please, Insert Valid brand-Image Like .jpg .png .gif .svg extension !!',
        ]);


        $brand = Brand::find($id);
        $brand->name = $req->name;
        $brand->description = $req->description;


            //insert image
            if($req->has('image')){
                //deleted Old Images
                if(File::exists('images/brand/'.$brand->image)){
                    File::delete('images/brand/'.$brand->image);
                }
            $image = $req->file('image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('images/brand/');
            $image->move($dest,$reImage);

            // save in database
            $brand->image = $reImage;

        }

        $brand->save();


        return redirect()->route('admin.brand.show')->with('success', ' brand has been updated successfully!!');
    }

    function destroy($id){
        $brand = Brand::find($id);
        if(!is_null($brand)){

            //delete brand image
            if(File::exists('images/brand/'.$brand->image)){
                File::delete('images/brand/'.$brand->image);
            }
            $brand->delete();
        }
        return redirect()->route('admin.brand.show')->with('success','brand has been deleted successfully!!');
     }
}
