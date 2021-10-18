@extends('frontend.layouts.master')
@section('title')
   {{ $product->title }} | gofur Store
@endsection
@section('content')

<div class="container ">
    <div class="row my-4">
        <div class="col-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($product->image as $item)
                        <div class="carousel-item product-item {{ $i == 1 ? 'active':' '}} " >
                           <img src="{{ asset('images/product/'.$item->image) }}" class="d-block w-100" alt="...">
                        </div>
                      @php
                          $i++;
                      @endphp
                    @endforeach


                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
            <div>
               <h4> Category:<span class="badge badge-primary">{{ $product->category->name }}</span></h4>
               <h4> Brand:<span class="badge badge-primary">{{ $product->brand->name }}</span></h4>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{$product->title}} </h3>
                </div>
                <div class="card-body">
                    <h4>Taka: {{ $product->price}}
                        <span class="badge badge-primary">
                            {{ $product->quantity < 1 ? 'No item is available': $product->quantity.'in stock'}}
                        </span>
                    </h4>

                    <hr>
                    <h5>{{ $product->description}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
