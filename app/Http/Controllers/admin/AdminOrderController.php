<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class AdminOrderController extends Controller
{
    //
    function create(){
        $orders = Order::orderBy('id','desc')->get();
        return view('backend.pages.order.index',compact('orders'));
    }

    function show($id){
       $order = Order::find($id);
       $order->is_seen_by_admin = 1;
       $order->save();
       return view('backend.pages.order.show',compact('order'));
    }

     function completed($id){
      $order =Order::find($id);
      if($order->is_completed){
        $order->is_completed = 0;
      }
      else{
        $order->is_completed = 1;
      }
      $order->save();
      return back()->with('success','Order completed status change!!');
     }
     function paid($id){
        $order =Order::find($id);
        if($order->is_paid){
          $order->is_paid = 0;
        }
        else{
          $order->is_paid = 1;
        }
        $order->save();
        return back()->with('success','Order paid status change!!');
       }

       function chargeUpdate(Request $req,$id){
        $order = Order::find($id);
        $order->shipping_charge = $req->shipping_charge;
        $order->custom_discount = $req->custom_discount;

        $order->save();
        return back()->with('success','Order charge and discount change!!');
       }
       /**
        * generate Invoice
        *
        * @return type PDF
        */

       function generateInvoice($id){
         $order = Order::find($id);
         return view('backend.pages.order.invoice',compact('order'));
         $pdf = PDF::loadView('backend.pages.order.invoice',compact('order'));

         return $pdf->stream('invoice.pdf');
        // return $pdf->download('invoice.pdf');
       }
}
