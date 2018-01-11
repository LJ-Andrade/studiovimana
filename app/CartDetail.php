<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = "cart_details";

    protected $fillable = ['cart_id', 'product_id', 'quantity', 'discount'];

    public function cart(){
    	return $this->belongsTo('App\Cart');
    }

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }
}
