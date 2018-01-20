<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetail;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ['customer_id', 'status', 'shipping', 'payment_method', 'payment_token', 'order_date', 'arrived_date'];

    public function details(){
    	return $this->hasMany('App\CartDetail');
    }

}
