<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    function dashboard(){
        $user = Auth::user();
        return view('frontend.pages.user.dashboard',compact('user'));
    }

    function profile(){
        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();
        $user = Auth::user();
        return view('frontend.pages.user.profile',compact('user','divisions','districts'));
    }

    function profile_update(Request $req){
        $user = Auth::user();
        $req->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:15'],
            'username' => ['required','string', 'alpha_dash', 'max:100', 'unique:users,username'.$user->id],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'.$user->id],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'phone_no' => ['required', 'max:12','unique:users,phone_no'.$user->id],
            'street_address' => ['required', 'max:100'],
        ]);

        $user = Auth::user();
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->division_id = $req->division_id;
        $user->district_id = $req->district_id;
        $user->street_address = $req->street_address;
        $user->shipping_address = $req->shipping_address;
        $user->ip_address= $req()->ip();
        $user->save();

        return back()->with('success','User profile updated successfully!!');
    }
}
