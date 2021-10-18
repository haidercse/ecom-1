<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use File;

class AdminCategoryController extends Controller
{
    //
    function create(){
        $main_categories = Category::orderBy('name','asc')->where('parent_id', NULL)->get();
        return view('backend.pages.category.create',compact('main_categories'));
    }

    function store(Request $req){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',

        ],
        [
            'name.required' => 'please, insert Valid Category Name!!',
            'image.required' => 'Please, Insert Valid Category-Image Like .jpg .png .gif .svg extension !!',
        ]);


        $categories = new Category;
        $categories->name = $req->name;
        $categories->description = $req->description;
        $categories->parent_id = $req->parent_id;

            //insert image
            if($req->has('image')){
            $image = $req->file('image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images/category');
            $image->move($dest,$reImage);

            // save in database
            $categories->image = $reImage;

        }

        $categories->save();


        return back()->with('success', ' Category has been added successfully!!');

    }

    function show(){
        $categories = Category::orderBy('id','desc')->get();
       return view('backend.pages.category.show',compact('categories'));
    }

    function edit($id){
        $main_categories = Category::orderBy('name','asc')->where('parent_id', NULL)->get();
         $category = Category::find($id);
         if(!is_null($category)){
            return view('backend.pages.category.edit',compact('category','main_categories'));
         }
         else{
             return back()->with('error','There is no data in this category');
         }

    }

    function update(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',

        ],
        [
            'name.required' => 'please, insert Valid Category Name!!',
            'image.required' => 'Please, Insert Valid Category-Image Like .jpg .png .gif .svg extension !!',
        ]);


        $category = Category::find($id);
        $category->name = $req->name;
        $category->description = $req->description;
        $category->parent_id = $req->parent_id;

            //insert image
            if($req->has('image')){
                //deleted Old Images
                if(File::exists('images/category/'.$category->image)){
                    File::delete('images/category/'.$category->image);
                }
            $image = $req->file('image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('images/category/');
            $image->move($dest,$reImage);

            // save in database
            $category->image = $reImage;

        }

        $category->save();


        return redirect()->route('admin.category.show')->with('success', ' Category has been updated successfully!!');
    }

    function destroy($id){
        $category = Category::find($id);
        if(!is_null($category)){
            //if it is parent category then it delete all sub category
            if($category->parent_id == NULL){
                //delete sub category
                $sub_categories = Category::orderBy('name','asc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub) {
                    if(File::exists('images/category/'.$sub->image)){
                        File::delete('images/category/'.$sub->image);
                    }
                    $sub->delete();
                }
            }
            //delete category image
            if(File::exists('images/category/'.$category->image)){
                File::delete('images/category/'.$category->image);
            }
            $category->delete();
        }
        return redirect()->route('admin.category.show')->with('success','category has been deleted successfully!!');
     }
}
