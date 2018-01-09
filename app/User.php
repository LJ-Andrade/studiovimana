<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Scope;

class User extends Authenticatable
{

    protected $guard = 'user';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'group', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Search Scopes 
    public function scopeSearchname($query, $name)
    {
        $query->where('name', 'LIKE', "%$name%")
              ->orWhere('username', 'LIKE', "%$name%")
              ->orWhere('email', 'LIKE', "%$name%");
    }

    public function scopeSearchrole($query, $role)
    {
        $query->where('role', $role);
    }

    public function scopeSearchgroup($query, $group)
    {
        $query->where('group', $group);
    }

    public function scopeSearchrolegroup($query, $role, $group)
    {
        $query->where('role', $role)->where('group', $group);
    }
}
