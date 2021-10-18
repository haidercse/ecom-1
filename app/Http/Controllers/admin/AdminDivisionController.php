<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class AdminDivisionController extends Controller
{
    //
    function create(){

        return view('backend.pages.division.create');
    }

    function store(Request $req){
        $req->validate([
            'name' => 'required',
            'priority' => 'required',


        ],
        [
            'name.required' => 'please, insert Valid division Name!!',
            'priority.required' => 'please, insert division priority!!',

        ]);


        $divisions = new Division;
        $divisions->name = $req->name;
        $divisions->priority = $req->priority;

        $divisions->save();


        return back()->with('success', ' division has been added successfully!!');

    }

    function show(){
        $divisions = Division::orderBy('priority','asc')->get();
       return view('backend.pages.division.show',compact('divisions'));
    }

    function edit($id){

         $division = Division::find($id);
         if(!is_null($division)){
            return view('backend.pages.division.edit',compact('division'));
         }
         else{
             return back()->with('error','There is no data in this division');
         }

    }

    function update(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'priority' => 'required',

        ],
        [
            'name.required' => 'please, insert Valid division Name!!',
            'priority.required' => 'please, insert division priority!!',


        ]);


        $division = Division::find($id);
        $division->name = $req->name;
        $division->priority = $req->priority;

        $division->save();


        return redirect()->route('admin.division.show')->with('success', ' division has been updated successfully!!');
    }

    function destroy($id){
        $division = Division::find($id);
         if(!is_null($division)){
         //delete all the division for the district
         $district = District::where('division_id',$division->id)->get();
          foreach ($district as $dis) {
              $dis->delete();
          }
         $division->delete();
     }

        return redirect()->route('admin.division.show')->with('success','division has been deleted successfully!!');
     }
}
