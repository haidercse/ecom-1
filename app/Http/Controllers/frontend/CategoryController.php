<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index(){
        return view('frontend.pages.category.index');
    }
    function show($id){
        $category = Category::find($id);
        if(!is_null($category)){
            return view('frontend.pages.category.show',compact('category'));
        }
        else{
            return redirect()->route('frontend.index')->with('error','Sorry!! There is no category in this ID');
        }

    }
}
