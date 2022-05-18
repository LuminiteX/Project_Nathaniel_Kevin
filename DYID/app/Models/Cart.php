<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['user_id'];

    // Many - to - Many
    // (RelatedModel, pivot_table, fk_of_current_model_in_pivot_table, fk_of_other_model_in_pivot_table)
    // public function products(){
    //     return $this->belongsToMany(
    //         Product::class,
    //         'cart_products',
    //         'cart_id',
    //         'product_id'
    //     );
    // }

    //with additional pivot column
    public function products(){
        return $this->belongsToMany(Product::class, 'cart_products')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

}
