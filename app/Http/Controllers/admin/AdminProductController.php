<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
class AdminProductController extends Controller
{
    //
    function create(){
        return view('backend.pages.product.create');
    }
    function store(Request $req){
        $req->validate([
            'title' => 'bail|required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);

        $products = new Product;
        $products->title = $req->title;
        $products->description = $req->description;
        $products->price = $req->price;
        $products->quantity = $req->quantity;


        $products->slug = str::slug($req->title);
        $products->admin_id = 1;
        $products->brand_id = $req->brand_id;
        $products->category_id =$req->category_id;
        $products->save();

        /*

           **** one image save in database ****


        */


        // if($req->has('image')){
        //     $image = $req->file('image');
        //     $reImage = time().'.'.$image->getClientOriginalExtension();
        //     $dest = public_path('/images/product');
        //     $image->move($dest,$reImage);

        //     // save in database
        //     $image = new ProductImage;
        //     $image->product_id = $products->id;
        //     $image->image = $reImage;
        //     $image->save();

        // }

        if(count($req->image) > 0){
               $i = 0;
            foreach ($req->image as $image) {

                    $reImage = time().$i.'.'.$image->getClientOriginalExtension();
                    $dest = public_path('/images/product');
                    $image->move($dest,$reImage);
                     // save in database
                    $image = new ProductImage;
                    $image->product_id = $products->id;
                    $image->image = $reImage;
                    $image->save();
                    $i++;
            }


        }

       return back()->with('success','Product has been added successfully !!');
    }

    function show(){
        $products = Product::orderBy('id','desc')->get();
       return view('backend.pages.product.show',compact('products'));
    }


    function edit($id){
        $product = Product::find($id);
        return view('backend.pages.product.edit',compact('product'));
    }
    function update(Request $req, $id){
        $req->validate([
            'title' => 'bail|required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->quantity = $req->quantity;
        $products->brand_id = $req->brand_id;
        $products->category_id =$req->category_id;
        $product->save();

        return redirect()->route('admin.product.show')->with('success','Product has been added successfully!!');
    }
    function destroy($id){
       $product = Product::find($id);
       if(!is_null($product)){
           $product->delete();
       }
       return redirect()->route('admin.product.show')->with('success','Product has been deleted successfully!!');
    }

}
