<?php
 
namespace App\Traits;
 
trait CartTrait {
 
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
              
        return array("shipping" => $shippingCost, "payment" => $paymentCost, "subtotal" => $subtotal, "total" => $total);
    }
 
}