@extends('frontend.pages.user.master')
@section('title')
    User Dashboard - Page
@endsection

@section('sub-content')
    <div class="container my-5">
        <div class="">
            <h3>Welcome {{ $user->first_name.' '.$user->last_name }}</h3>
            <p>You can change your profile and every informations here..</p>

            <hr>
             <div class="row">
                 <div class="col-md-4">
                    <div class="card card-body mt-2 pointer" onclick="location.href='{{ route('user.profile') }}'">
                      <h5>Update Profile</h5>
                    </div>
                 </div>
             </div>
        </div>

    </div>

@endsection
