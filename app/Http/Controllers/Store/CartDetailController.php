<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        $cartDetail = new CartDetail();
        dd(auth()->customer()->carts());
        $cartDetail->cart_id = auth()->guard('customer')->user()->cart_id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        return back();
    }
}
