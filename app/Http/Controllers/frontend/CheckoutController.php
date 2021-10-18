<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;
class CheckoutController extends Controller
{
    //
    function index(){
        $payments = Payment::orderBy('priority','asc')->get();
       return view('frontend.pages.checkout.index',compact('payments'));
    }

    function store(Request $req){
        $req->validate([
            'name' =>'required',
            'phone_no' =>'required',
            'shipping_address' =>'required',
            'payment_method_id' =>'required',
        ]);

        $order = new Order();
        if($req->payment_method_id != 'Cash_in'){
          if($req->transaction_id == NULL || empty($req->transaction_id)){
              return back()->with('error', 'Please, Give your Transaction Id!');
          }
        }

        $order->name = $req->name;
        $order->phone_no = $req->phone_no;
        $order->email = $req->email;
        $order->shipping_address = $req->shipping_address;
        $order->message = $req->message;
        $order->ip_address = request()->ip();
        $order->transaction_id = $req->transaction_id;
        if(Auth::check()){
            $order->user_id = Auth::id();
        }

       $order->payment_id = Payment::where('short_name',$req->payment_method_id)->first()->id;

       $order->save();

       foreach (Cart::totalCarts() as $cart) {
         $cart->order_id = $order->id;
         $cart->save();
       }
       return redirect()->route('frontend.index')->with('success','Your order has been taken successfully. please, Wait Admin Will soon confirm it');
    }
}
