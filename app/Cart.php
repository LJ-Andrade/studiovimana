<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetail;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ['customer_id', 'status', 'shipping_id', 'payment_method_id', 'payment_token', 'order_date', 'arrived_date'];

    public function details(){
    	return $this->hasMany('App\CartDetail');
    }

    public function shipping()
    {
        return $this->belongsTo('App\Shipping');
    }
    
    public function payment()
    {
        return $this->belongsTo('App\Payment', 'payment_method_id');
    }

}
