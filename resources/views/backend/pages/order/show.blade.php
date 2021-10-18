@extends('backend.layouts.master')

@section('title')
   Order Page -Admin
@endsection

@section('admin-content')
    <div class="container">
      @include('backend.layouts.partials.message')
        <div class="card">
           <div class="card-header">
               <h3>Order Information</h3>
           </div>
           <div class="card-body">
            <div class="card-header">
                <h3>Show Order #ECOM{{ $order->id }}</h3>
              </div>
              <div class="row">
                  <div class="col-md-6 border-right">
                     <p><strong>Order Name:</strong>{{ $order->name }}</p>
                     <p><strong>Order Phone:</strong>{{ $order->phone_no }}</p>
                     <p><strong>Order Email:</strong>{{ $order->email }}</p>
                     <p><strong>Order Shipping Address:</strong>{{ $order->shipping_address }}</p>
                  </div>
                  <div class="col-md-6">
                      <p><strong>Order Payment Method :</strong>{{ $order->payment->name }}</p>
                      <p><strong>Order Payment Transaction ID :</strong>{{ $order->transaction_id }}</p>
                  </div>
              </div>
              <hr>
              <h3>Order Items: </h3>
              @if ($order->cart->count() > 0)
              dd('test');
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
                   @foreach ($order->cart as $cart)
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
               @endif
               <hr>
               <form class=" mt-2" action="{{ route('admin.order.charge',$order->id) }}" method="post">
                @csrf
                    <label for="">Shipping Cost</label>
                    <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}"><br>

                    <label for="">Custom Discount</label>
                    <input type="number" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}"><br>

                    <input type="submit" value="update" class="btn btn-success ml-2 ">
                    <a  class="btn btn-info" href="{{ route('admin.order.invoice',$order->id) }}">Generate Invoice</a>
               </form>


               <hr>

               <form class="d-inline" action="{{ route('admin.order.completed',$order->id) }}" method="post">
                @csrf
                    @if ($order->is_completed)
                      <input type="submit" value="cancel order" class="btn btn-danger">
                    @else
                      <input type="submit" value="complete order" class="btn btn-success">
                    @endif
               </form>

               <form class="d-inline" action="{{ route('admin.order.paid',$order->id) }}" method="post">
                @csrf
                @if ($order->is_paid)
                  <input type="submit" value="cancel Pyament order" class="btn btn-danger">
                @else
                  <input type="submit" value="paid order" class="btn btn-success">
                 @endif
               </form>
           </div>
        </div>
    </div>
@endsection
