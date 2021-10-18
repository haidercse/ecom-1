<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'product_quantity',
        'ip_address',

   ];

   /**
    * Get the user that owns the Order
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function product()
   {
       return $this->belongsTo(Product::class);
   }

   public function order()
   {
       return $this->belongsTo(Order::class);
   }

  /**
   * Total Items
   *
   * display in the Cart
   *
   * @return integer total Items
   *
   */

    public static  function totalItems(){
       if(Auth::check()){
         $carts = Cart::Where('user_id', Auth::id())
            ->where('order_id', NULL)
            ->get();
       }
       else{
        $carts = Cart::Where('ip_address', request()->ip()) ->where('order_id', NULL)->get();

       }
       $total_item =0;
        foreach ($carts as $cart) {
           $total_item = $total_item + $cart->product_quantity;
        }
       return $total_item;
   }


   /**
   * Total Carts
   *
   * display
   *
   * @return integer total Cart Model
   *
   */

  public static  function totalCarts(){
    if(Auth::check()){
      $carts = Cart::Where('user_id', Auth::id())
         ->where('order_id', NULL)
         ->get();
    }
    else{
     $carts = Cart::Where('ip_address', request()->ip())->where('order_id', NULL)->get();

    }

    return $carts;
}
}
