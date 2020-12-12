<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function detailTransaction() {
        return $this->hasMany(detailTransaction::class);
    }
    protected $table = 'products';
}
