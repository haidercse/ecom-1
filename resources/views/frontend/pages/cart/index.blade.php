@extends('frontend.layouts.master')
@section('title')
    Update Cart - Page
@endsection

@section('content')
    <div class="container my-5">
        @include('backend.layouts.partials.message')
        <div class="">
            <h2>My Cart Items</h2>
             @if (App\Models\Cart::totalItems() > 0)
             <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">
                        Product Quantity
                    </th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Sub Total Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $total_price = 0;
                    @endphp
                  @foreach (App\Models\Cart::totalCarts() as $cart)
                    <tr>
                        <th scope="row">
                            {{ $loop->index +1 }}
                        </th>
                        <td>
                            <a href="{{ route('frontend.product.showDetails',$cart->product->slug) }}">
                               {{ $cart->product->title}}
                            </a>
                        </td>
                        <td>
                            @if ($cart->product->image->count() > 0)
                               <img src="{{ asset('/images/product/'.$cart->product->image->first()->image) }}" alt="" width="72">
                            @endif
                        </td>
                        <td>
                            <form class="form-inline" action="{{ route('cart.update',$cart->id) }}" method="post">
                                @csrf
                                <input type="number" name="product_quantity" class=" form-control" value="{{ $cart->product_quantity }}">
                                <button type="submit" class="btn btn-success ml-1">Update</button>
                            </form>
                        </td>
                        <td>
                            {{ $cart->product->price }}.00 tk
                        </td>
                        <td>
                            @php
                                 $total_price += $cart->product->price* $cart->product_quantity
                            @endphp

                            {{ $cart->product->price* $cart->product_quantity }}.00 tk
                        </td>
                        <td>
                            <form class="form-inline" action="{{ route('cart.delete',$cart->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="cart_id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  <tr>
                      <th colspan="4"></th>
                      <th>
                          Total Amount:
                      </th>
                      <th colspan="2">
                          {{ $total_price }}.00 tk
                      </th>
                  </tr>
                </tbody>
              </table>
            <div class="float-right">
                <a href="{{ route('frontend.index') }}" class="btn btn-info btn-lg ">Continue Shopping.</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-warning btn-lg ">CheckOut</a>
            </div>
            @else
            <div class="alert alert-warning">
                <strong>There is no item in your cart </strong><br>
                <a href="{{ route('frontend.index') }}" class="btn btn-info btn-lg ">Continue Shopping.</a>
            </div>

            @endif
        </div>
    </div>

@endsection
