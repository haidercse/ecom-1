


    <div class="container">
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
                    <th colspan="3"></th>
                    <th>
                        Discount:
                    </th>
                    <th colspan="3">
                        {{ $order->custom_discount }}.00 tk
                    </th>
                </tr>
                <tr>
                    <th colspan="3"></th>
                    <th>
                        Shippin Cost:
                    </th>
                    <th colspan="3">
                        {{ $order->shipping_charge }}.00 tk
                    </th>
                </tr>
                   <tr>
                       <th colspan="3"></th>
                       <th>
                           Total Amount:
                       </th>
                       <th colspan="2">
                           {{ $total_price +$order->shipping_charge - $order->custom_discount}}.00 tk
                       </th>
                   </tr>
                 </tbody>
               </table>
               @endif
           </div>
        </div>
    </div>

