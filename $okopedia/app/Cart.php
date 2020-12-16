<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];

    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
    protected $table = 'carts';
}
