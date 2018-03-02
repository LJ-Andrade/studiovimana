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
    public function scopeSearchName($query, $name)
    {
        $query->where('name', 'LIKE', "%$name%")
              ->orWhere('username', 'LIKE', "%$name%")
              ->orWhere('email', 'LIKE', "%$name%");
    }

    public function scopeSearchRole($query, $role)
    {
        $query->where('role', $role);
    }

    public function scopeSearchGroup($query, $group)
    {
        $query->where('group', $group);
    }

    public function scopeSearchRoleGroup($query, $role=null, $group=null)
    {
        if($role != null && $group != null)
        {
            return $query->where('role', $role)->where('group', $group);
        } 
        elseif($role != null)
        {
            return $query->where('role', $role);
        }
        elseif($group != null)
        {
            return $query->where('group', $group);
        }
    }
}
