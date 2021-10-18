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
                    <h3>Searching Products for <span class="badge badge-primary">{{ $search}}</span></h3>

                </div>
                
                @include('frontend.pages.product.partials.all_products')
            </div>
        </div>
    </div>
</div>

@endsection
