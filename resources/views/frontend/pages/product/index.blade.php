@extends('frontend.layouts.master')

@section('content')

<div class="container-fluid ">
    <div class="ourSlider">
        @include('frontend.pages.product.partials.slider')
    </div>

    <div class="row my-4">
        <div class="col-md-4">
            @include('frontend.layouts.partials.frontend-list')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>All Products</h3>
                </div>
                @include('frontend.pages.product.partials.all_products')
            </div>
        </div>
    </div>
</div>

@endsection
