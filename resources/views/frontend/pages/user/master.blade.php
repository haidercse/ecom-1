@extends('frontend.layouts.master')
@section('title')
    User master - Page
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item" href="">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 250px;" alt="">
                    </a>
                    <a class="list-group-item {{ Route::is('user.dashboard') ? 'active': ' '}}" href="{{ route('user.dashboard') }}">Dashboard</a>
                    <a class="list-group-item {{ Route::is('user.profile') ? 'active': ' '}}" href="{{ route('user.profile') }}">Update Profile</a>

                    <a class="list-group-item" href="">Logout</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class=" card card-body">
                   @yield('sub-content')
                </div>
            </div>
        </div>
    </div>

@endsection
