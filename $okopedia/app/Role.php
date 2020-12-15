<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function roleUsers() {
        return $this->hasMany(RoleUser::class);
    }
    protected $table = 'roles';
}
