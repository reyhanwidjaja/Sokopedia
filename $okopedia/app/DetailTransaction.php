<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = [
        'transaction_id', 'product_id', 'quantity'
    ];

    public $timestamps = false;

    public function headerTransactions() {
        return $this->belongsTo(headerTransaction::class);
    }
    public function products() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    protected $table = 'detailtransactions';
}
