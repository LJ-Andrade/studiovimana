<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Customer;

class OrdersController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {   
        $items = Cart::all();
        return view('vadmin.orders.index')->with('items', $items);    
    }

    public function show($id)
    {
        $order = Cart::find($id);
        $customer = Customer::find($order->customer_id);
        
        $prices = $this->calcCartTotalPrice($order);
        
        $subtotal = $prices['subtotal'];
        $total = $prices['total'];

        return view('vadmin.orders.show')
        ->with('order', $order)
        ->with('subtotal', $subtotal)
        ->with('total', $total)
        ->with('customer', $customer);
    }
    
    public function calcCartTotalPrice($cart)
    {

        $articlesPrice = 0;
        $shippingCost = 0;
        $paymentCost = 0;
        $total = 0;
        
        // Sum all article prices
        foreach($cart->details as $detail)
        {
            // Check discounts
            if($detail->discount != '0'){
                $articlesPrice += calcValuePercentNeg($detail->price, $detail->discount);
            } else {
                $articlesPrice += $detail->price;
            }
        }

        $subtotal = $articlesPrice;
        
        // Check for shipping cost
        if($cart->shipping_id != null){
            $shippingCost = $cart->shipping->price;
        }

        // Check for payment cost
        if($cart->payment_method_id != null){
            $paymentCost  = calcValuePercentNeg($subtotal, $cart->payment->percent);
        }
        
        $total = $subtotal + $shippingCost + $paymentCost;
              
        return array("subtotal" => $subtotal, "total" => $total);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $order = Cart::find($id);
        return view('vadmin.orders.edit')->with('order', $order);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:categories,name,'.$category->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la categoría',
            'name.unique'   => 'La categoría ya existe'
        ]);
        
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('message','Categoría editada');
    } 

}