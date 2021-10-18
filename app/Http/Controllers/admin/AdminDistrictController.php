<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class AdminDistrictController extends Controller
{
    //
    function create(){
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.district.create',compact('divisions'));
    }

    function store(Request $req){
        $req->validate([
            'name' => 'required',
            'division_id' => 'required',


        ],
        [
            'name.required' => 'please, insert Valid district Name!!',
            'division_id.required' => 'please, insert district division_id!!',

        ]);


        $districts = new District;
        $districts->name = $req->name;
        $districts->division_id = $req->division_id;

        $districts->save();


        return back()->with('success', ' district has been added successfully!!');

    }

    function show(){
        $districts = District::orderBy('name','asc')->get();
       return view('backend.pages.district.show',compact('districts'));
    }

    function edit($id){
        $divisions = Division::orderBy('priority','asc')->get();
        $district = District::find($id);
         if(!is_null($district)){
            return view('backend.pages.district.edit',compact('district','divisions'));
         }
         else{
             return back()->with('error','There is no data in this district');
         }

    }

    function update(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'division_id' => 'required',

        ],
        [
            'name.required' => 'please, insert Valid district Name!!',
            'division_id.required' => 'please, insert district division_id!!',


        ]);


        $district = District::find($id);
        $district->name = $req->name;
        $district->division_id = $req->division_id;

        $district->save();


        return redirect()->route('admin.district.show')->with('success', ' district has been updated successfully!!');
    }

    function destroy($id){
        $district = district::find($id);
        if(!is_null($district)){

            $district->delete();
        }
        return redirect()->route('admin.district.show')->with('success','district has been deleted successfully!!');
     }
}
