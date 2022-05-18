<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table= 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image_path'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->belongsToMany(
            Cart::class,
            'cart_products',
            'product_id',
            'cart_id'
        );
    }

    public function transactions(){
        return $this->belongsToMany(
            Transaction::class,
            'transaction_products',
            'product_id',
            'transaction_id'
        );
    }
}
