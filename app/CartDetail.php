<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = "cart_id, product_id, quantity, discount, cart_details";

    protected $fillable = ['status', 'order_date', 'arrived_date'];
}
