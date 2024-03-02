<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_products')
            ->select('products.id as product_id', 'products.name', 'products.price', 'products.description', 'sale_products.amount');
    }

    public function productsUpdate()
    {
        return $this->belongsToMany(Product::class, 'sale_products');
    }
}

