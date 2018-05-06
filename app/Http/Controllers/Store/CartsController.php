<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Customer;
use App\Traits\CartTrait;

class CartsController extends Controller
{
    use CartTrait;

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {   
        $items = Cart::orderBy('created_at', 'DESC')->get();
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
    
    public function updateStatus(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        try {
            $cart->status = $request->status;
            $cart->save();
            return response()->json([
                'response' => true,
                'newstatus' => $cart->status
            ]); 
        }  catch (\Exception $e) {
            return response()->json([
                'response'   => false,
                'error'    => 'Error: '.$e
            ]);    
        } 
    }
    
    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    // public function edit($id)
    // {
    //     $order = Cart::find($id);
    //     return view('vadmin.orders.edit')->with('order', $order);
    // }

    // public function update(Request $request, $id)
    // {
    //     $category = Category::find($id);

    //     $this->validate($request,[
    //         'name' => 'required|min:4|max:250|unique:categories,name,'.$category->id,
    //     ],[
    //         'name.required' => 'Debe ingresar un nombre a la categoría',
    //         'name.unique'   => 'La categoría ya existe'
    //     ]);
        
    //     $category->fill($request->all());
    //     $category->save();

    //     return redirect()->route('categories.index')->with('message','Categoría editada');
    // } 

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
    {   
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
    
        try {
            foreach ($ids as $id) {
                $item = Cart::find($id);
                $item->delete();
            }
            return response()->json([
                'success'   => true,
            ]); 
        }  catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'error'    => 'Error: '.$e
            ]);    
        } 
    }


}