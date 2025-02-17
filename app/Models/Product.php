<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'discount_price',
        'quantity', 'sku', 'category_id', 'brand_id', 'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

   
    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }
}

