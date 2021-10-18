<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Auth;
class CartController extends Controller
{
    //
    function index(){
       return view('frontend.pages.cart.index');
    }

    function store(Request $req){
        $req->validate([
            'product_id' => 'required',
        ]);
        if(Auth::check()){
            $carts = Cart::Where('user_id', Auth::id())
            ->Where('product_id', $req->product_id)
            ->Where('order_id', NULL)
            ->first();
        }
        else{
            $carts = Cart::Where('ip_address', request()->ip())
            ->Where('product_id', $req->product_id)
            ->Where('order_id', NULL)
            ->first();
        }

        if(!is_null($carts)){
           $carts->increment('product_quantity');
        }
        else{
            $carts = new Cart();
            if(Auth::check()){
                $carts->user_id = Auth::id();
            }
            $carts->ip_address = request()->ip();
            $carts->product_id = $req->product_id;
            $carts->save();
        }



      return back()->with('success','Product has been added to Cart!!');
    }
    function update(Request $req, $id){
      $cart = Cart::find($id);
      if(!is_null($cart)){
         $cart->product_quantity = $req->product_quantity;
         $cart->save();
      }
      else{
          return redirect()->route('cart.index');
      }
      return back()->with('success','Cart item has been updated successfully!!');
    }
    function destroy($id){
        $cart = Cart::find($id);
        if(!is_null($cart)){
           $cart->delete();
        }
        else{
            return redirect()->route('cart.index');
        }
        return back()->with('success','Cart item has been deleted successfully!!');
    }

}
