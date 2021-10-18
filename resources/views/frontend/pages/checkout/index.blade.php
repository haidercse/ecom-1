@extends('frontend.layouts.master')
@section('title')
    Update Cart - Page
@endsection

@section('content')
    <div class="container my-4">
        @include('backend.layouts.partials.message')
        <div class="card">
            <div class="card-header">
                <h2>COnfirm Items</h2>
            </div>
            <div class="card-body">
             <div class="row">
                <div class="col-md-7 border-right">
                    @foreach (App\Models\Cart::totalCarts() as $cart)
                        <p>
                            {{ $cart->product->title }}-
                            <strong>{{ $cart->product->price }}.00 tk</strong>-
                            {{ $cart->product_quantity }} item
                        </p>
                    @endforeach
                </div>
                <div class="col-md-5">
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach (App\Models\Cart::totalCarts() as $cart)
                        @php
                            $total_price +=  $cart->product->price*$cart->product_quantity;
                        @endphp
                    @endforeach
                    <p>Total price : <strong>{{ $total_price }}.00 tk</strong></p>
                    <p>Total price with shipping Cost: <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }}.00 tk</strong></p>
                </div>
             </div>
            <p>
                <a href="{{ route('cart.index') }}">Change Carts items</a>
            </p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Confirm Shipping Address</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciver Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name: '' }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email: '' }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no: '' }}" required autocomplete="phone_no">

                            @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Aditional Message(Optional)') }}</label>

                        <div class="col-md-6">
                            <textarea id="message"  class="form-control @error('message') is-invalid @enderror" name="message" rows="4" autocomplete="message"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                        <div class="col-md-6">
                            <textarea id="shipping_address"  class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" rows="4" autocomplete="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address: '' }}</textarea>

                            @error('shipping_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                        <div class="col-md-6">
                           <select name="payment_method_id" class="form-control" required id="payments">
                               <option value="">Please, Select Payment method</option>
                               @foreach ($payments as $payment)
                                 <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                               @endforeach
                           </select>
                            @foreach ($payments as $payment)
                               <div>
                                    @if ($payment->short_name == 'Cash_in')
                                        <div id="payment_{{ $payment->short_name }}"class="hidden alert alert-primary mt-2">
                                            <h3>For Cash In there is nothing necessary. Just Click Finish Order</h3>
                                            <small>You Will get Your Product Two Or Three Days</small>
                                        </div>
                                    @else
                                        <div id="payment_{{ $payment->short_name }}"class="hidden alert alert-secondary mt-2">
                                            <h3>{{ $payment->name }} Payment</h3>
                                            <p>
                                                <strong>{{ $payment->name }} No: {{ $payment->no }}</strong>
                                                <br>
                                                <strong>Account Type: {{ $payment->type }}</strong>
                                            </p>
                                           <div class="alert alert-success">
                                                please send the money to this bkas no and write your transaction code below there.
                                            </div>

                                        </div>
                                    @endif
                               </div>
                            @endforeach
                            <input type="text" id="transaction_id" placeholder="Please, Enter transaction id" name="transaction_id" class="form-control hidden">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Order Now') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $("#payments").change(function(){
        $payment_method = $("#payments").val();
        if ($payment_method == "Cash_in") {
            $("#payment_Cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
        }
        else if($payment_method == "bkash"){
            $("#payment_bkash").removeClass('hidden');
            $("#payment_Cash_in").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }
        else if($payment_method == "rocket"){
            $("#payment_rocket").removeClass('hidden');
            $("#payment_Cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }

    })
   </script>
@endsection
