<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class AdminSliderController extends Controller
{
    //
    function create(){

        return view('backend.pages.slider.create');
    }

    function store(Request $req){
        $req->validate([
            'title' => 'required',
            'image' => 'required|image',
            'priority' => 'required',
            'button_link' => 'nullable|url',


        ]);

        $slider = new Slider();
        $slider->title = $req->title;
        $slider->button_text = $req->button_text;
        $slider->button_link = $req->button_link;
        $slider->priority = $req->priority;

        //image insert
        if($req->has('image')){
        $image = $req->file('image');
        $reImage = time().'.'.$image->getClientOriginalExtension();
        $dest = public_path('images/slider/');
        $image->move($dest,$reImage);

        // save in database
        $slider->image = $reImage;

        }

        $slider->save();
        return back()->with('success', ' slider has been added successfully!!');

    }

    function show(){
        $sliders = Slider::orderBy('priority','asc')->get();
       return view('backend.pages.slider.show',compact('sliders'));
    }

    // function edit($id){

    //      $slider = Slider::find($id);
    //      if(!is_null($slider)){
    //         return view('backend.pages.slider.edit',compact('slider'));
    //      }
    //      else{
    //          return back()->with('error','There is no data in this slider');
    //      }

    // }

    function update(Request $req, $id){
        $req->validate([
            'title' => 'required',
            'image' => 'nullable',
            'priority' => 'required',
            'button_link' => 'nullable|url',


        ]);

        $slider = Slider::find($id);
        $slider->title = $req->title;
        $slider->button_text = $req->button_text;
        $slider->button_link = $req->button_link;
        $slider->priority = $req->priority;
        //insert image
        if($req->has('image')){
            //deleted Old Images
            if(File::exists('images/slider/'.$slider->image)){
                File::delete('images/slider/'.$slider->image);
            }
        $image = $req->file('image');
        $reImage = time().'.'.$image->getClientOriginalExtension();
        $dest = public_path('images/slider/');
        $image->move($dest,$reImage);
        // save in database
        $slider->image = $reImage;
        }

        $slider->save();
        return back()->with('success', ' slider has been updated successfully!!');
    }

    function destroy($id){
        $slider = Slider::find($id);
         if(!is_null($slider)){
          //deleted Old Images
          if(File::exists('images/slider/'.$slider->image)){
            File::delete('images/slider/'.$slider->image);

          }
         $slider->delete();
     }

        return back()->with('success','slider has been deleted successfully!!');
     }
}
