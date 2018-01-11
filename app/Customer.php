<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Scope;
use App\CatalogFav;
use App\Cart;

class Customer extends Authenticatable
{
    protected $guard = 'customer';

    protected $table = 'customers';

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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->first();
        if($cart){
            return $cart;
        } else {
            $cart = new Cart();
            $cart->status = 'Active';
            $cart->user_id = $this->id;
            $cart->save(); 
            return $cart;
        }
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
