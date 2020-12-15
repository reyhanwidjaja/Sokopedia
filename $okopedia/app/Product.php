<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
