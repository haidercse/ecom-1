<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'title',
        'description',
        'slug',
        'price',
        'quantity',
        'offer_price',
        'admin_id',
    ];
    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
