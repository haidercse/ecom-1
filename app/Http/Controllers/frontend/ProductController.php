<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;

class ProductController extends Controller
{
    function index(){
        $sliders = Slider::orderBy('priority','desc')->get();
        $products = Product::orderBy('id','desc')->get();
        return view('frontend.pages.product.index',compact('products','sliders'));
    }

    function show($slug){
         $product =  Product::where('slug',$slug)->first();
         if(!is_null($product)){
             return view('frontend.pages.product.show',compact('product'));
         }
         else{
             return view('frontend.pages.product.show')->with('error', 'There is no product in this URL!');
         }
    }

    function search(Request $req){
         $search = $req->search;
        $products = Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('slug','like','%'.$search.'%')
        ->orWhere('price','like','%'.$search.'%')
        ->orWhere('quantity','like','%'.$search.'%')
        ->orderBy('id','desc')
        ->paginate(9);

        return view('frontend.pages.product.search',compact('search','products'));
    }


}
