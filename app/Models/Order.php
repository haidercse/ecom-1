<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = [
         'user_id',
         'payment_id',
         'ip_address',
         'name',
         'phone_no',
         'shipping_address',
         'email',
         'is_paid',
         'is_completed',
         'is_seen_by_admin',
         'transaction_ida'
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

    /**
     * Get all of the cart for the cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    /**
     * Get the payment that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
