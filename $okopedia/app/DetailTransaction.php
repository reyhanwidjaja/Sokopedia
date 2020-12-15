<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function headerTransactions() {
        return $this->belongsTo(headerTransaction::class);
    }
    public function products() {
        return $this->belongsTo(Product::class);
    }
    protected $table = 'detailtransactions';
}
