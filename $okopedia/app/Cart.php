<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products() {
        return $this->belongsTo(Product::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
    protected $table = 'carts';
}
