<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $fillable = [
        'role_id', 'user_id',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
    public function roles() {
        return $this->belongsTo(Role::class);
    }
    protected $table = 'role_user';
}
