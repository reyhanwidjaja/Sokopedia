<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{

    protected $fillable = [
        'users_id'
    ];

    public function detailTransactions() {
        return $this->hasMany(detailTransaction::class);
    }
    public function users() {
        return $this->belongsTo(User::class);
    }
    protected $table = 'headertransactions';
}
