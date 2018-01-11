<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ['status', 'order_date', 'arrived_date'];

    public function cartDetails(){
    	return $this->hasMany('App\CartDetail');
    }

}