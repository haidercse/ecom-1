@extends('frontend.layouts.master')

@section('content')

<div class="container ">
    <div class="row my-4">
        <div class="col-md-4">
            @include('frontend.layouts.partials.frontend-list')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>All Products in <span class="badge badge-primary">{{ $category->name }} category</span></h3>
                </div>
                @php
                    $products = $category->products;
                @endphp
                @if ($products->count() > 0)
                   @include('frontend.pages.product.partials.all_products')
                @else
                    <div class="alert alert-warning">
                        No product has been added yet in this category!!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
