<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'product_name', 'product_photo', 'product_description', 'product_price'
    ];

    public $timestamps = false;

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function detailTransactions() {
        return $this->hasMany(detailTransaction::class);
    }
    protected $table = 'products';
}
