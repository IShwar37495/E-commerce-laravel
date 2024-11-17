<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = ['product_id', 'image_url'];

    /**
     * Define the inverse relationship with products.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

