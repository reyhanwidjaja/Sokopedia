<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class);
    }
    protected $table = 'categories';
}
