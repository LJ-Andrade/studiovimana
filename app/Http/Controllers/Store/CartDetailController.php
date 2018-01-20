<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CartDetail;
use App\Cart;
use App\CatalogArticle;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->guard('customer')->user()->cart->id;
        $cartDetail->article_id = $request->article_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->size = $request->size;

        $article = CatalogArticle::where('id', $request->article_id)->first();
        if($article->discount > 0){
            $cartDetail->price = calcValuePercentNeg($article->price, $article->discount);
        } else {
            $cartDetail->price = $article->price;
        }
        $cartDetail->save();

        return response()->json(['response' => true, 'result' => 'done', 'message' => 'done']); 
    }

    public function destroy(Request $request)
    {
        $item = CartDetail::findOrFail($request->detailid);
        try{
            $item->delete();
        } catch (\Exception $e) {
            return response()->json([
                'response'   => false,
                'error'    => 'Error: '.$e
                ]);
            }
            
            // If last article is deleted also delete activecart
        $cart = Cart::findOrFail($item->cart->id);
        if($cart->details->count() < 1)
        {
            $cart->delete();
            return response()->json([
                'response'   => true,
                'doaction'   => 'back'
            ]);  
        } else {
            return response()->json([
                'response'   => true,
                'doaction'   => 'reload'
            ]);  
        }
    }



}
