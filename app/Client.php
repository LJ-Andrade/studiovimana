<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Scope;
use App\CatalogFav;

class Client extends Authenticatable
{
    protected $guard = 'customer';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'group', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relations
    public function catalogFavs()
    {
    	return $this->hasMany(CatalogFav::class);
    }

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

}
