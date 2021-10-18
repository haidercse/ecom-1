@extends('frontend.layouts.master')
@section('title')
    COntact - Page
@endsection

@section('content')
    <div class="container my-5">

            <div class="row">
                <div class="col-md-4">
                    @include('frontend.layouts.partials.frontend-list')
                </div>
                <div class="col-md-8">
                    <div class="jumbotron">
                        <h1>Contact page </h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente et molestias explicabo ab soluta enim, suscipit cum exercitationem? Et laudantium quasi vitae delectus quod velit officia odit nisi iure! Repellat, accusantium deleniti illum cumque ducimus voluptas corrupti voluptate dicta facere.</p>
                    </div>
                </div>
            </div>

    </div>

@endsection
