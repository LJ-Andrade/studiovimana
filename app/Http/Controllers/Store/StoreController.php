<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\CatalogCategory;
use App\CatalogArticle;
use App\CatalogImage;
use App\CatalogAtribute1;
use App\CatalogTag;
use App\CatalogFav;
use App\Customer;
use App\Shipping;
use App\Payment;
use MP;

// Prov
use App\Cart;
use App\CartDetail;


class StoreController extends Controller
{
    
    public $customer = '2';
    
    public function __construct()
    {
        //$this->middleware('auth:customer');
        // $customer = auth()->guard('customer')->user();     
    }
    
    public function index(Request $request)
    {   
        if($request->category)
        {
            $articles = CatalogArticle::orderBy('id', 'DESC')->active()->where('category_id', $request->category)->paginate(15);
        } elseif($request->atributes1 || $request->tags)
        {
            $articles = CatalogArticle::orderBy('id', 'DESCC')->active()->paginate(15);
        } else {
            $articles = CatalogArticle::orderBy('id', 'DESCC')->active()->paginate(15);
        }


        // $articles->each(function($articles){
            //     $articles->category;
            //     $articles->user;
            // });
        $user       = auth()->guard('customer')->user();
        $categories = CatalogCategory::all();
        $tags       = CatalogTag::orderBy('id', 'ASC')->select('name', 'id')->get();
        $atributes1 = CatalogAtribute1::orderBy('id', 'ASC')->select('name', 'id')->get();
            
        $activeCart = $this->getActiveCart();
        $favs       = $this->getCustomerFavs();

        return view('store.index')
            ->with('articles', $articles)
            ->with('atributes1', $atributes1)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('user', $user)
            ->with('favs', $favs)
            ->with('activeCart', $activeCart);
    }
    
    public function show(Request $request)
    {
        $article = CatalogArticle::findOrFail($request->id);
        $activeCart = $this->getActiveCart();
        
        $user    = auth()->guard('customer')->user();
        $isFav   = CatalogFav::where('customer_id', '=', $user->id)->where('article_id', '=', $article->id)->get();
        if(!$isFav->isEmpty()){
            $isFav = true;
        } else {
            $isFav = false;
        }
        return view('store.show')
        ->with('article', $article)
        ->with('isFav', $isFav)
        ->with('user', $user)
        ->with('activeCart', $activeCart);
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCHS
    |--------------------------------------------------------------------------
    */



    /*
    |--------------------------------------------------------------------------
    | SHOP and CHECKOUT LOGIC
    |--------------------------------------------------------------------------
    */


    // Checkout Step 1
    
    public function checkout(Request $request)
    {
        $activeCart = $this->getActiveCart();
        return view('store.checkout-checkdata')
            ->with('activeCart', $activeCart);
    }
    
    public function checkoutCustomerData(Request $request)
    {
            $user = auth()->guard('customer')->user();
            $item = Customer::find($user->id);

            $this->validate($request,[
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'username' => 'required|string|max:20|unique:customers,username,'.$user->id,
                'email' => 'required|string|email|max:255|unique:customers,email,'.$user->id,
                'phone' => 'required|max:255',
                'address' => 'required|max:255',
                'cp' => 'required',
                'province_id' => 'required|max:255',
                'location_id' => 'required|max:255',
            ]);
            
            $item->fill($request->all());
            $item->save();
            
            $items = Shipping::all();
            $activeCart = $this->getActiveCart();
            return view('store.checkout-shipping')
                ->with('activeCart', $activeCart)
                ->with('items', $items);
    }

    public function checkoutShippingGet()
    {
        $items = Shipping::all();
        $activeCart = $this->getActiveCart();
        return view('store.checkout-shipping')
            ->with('activeCart', $activeCart)
            ->with('items', $items);
    }

    // Checkout Step 2
    public function checkoutShipping(Request $request)
    {   
        $shipping = Shipping::findOrFail($request->shipping_id);
        $cart = Cart::where('customer_id', auth()->guard('customer')->user()->id)->where('status', '=', 'active')->first();
        $cart->shipping_id = $request->shipping_id;
        $cart->save();
        
        $items = Payment::all();
        $activeCart = $this->getActiveCart();
        return view('store.checkout-payment')
            ->with('activeCart', $activeCart)
            ->with('items', $items);
    }

    // Checkout Step 3
    public function checkoutPayment(Request $request)
    {
        $payment = Payment::findOrFail($request->payment_method_id);
        $cart = Cart::where('customer_id', auth()->guard('customer')->user()->id)->where('status', '=', 'active')->first();
        $cart->payment_method_id = $request->payment_method_id;
        $cart->save();
        
        $activeCart = $this->getActiveCart();
        
        return view('store.checkout-review')
            ->with('activeCart', $activeCart);
    }
        
    public function checkoutPaymentGet()
    {
        $items = Payment::all();
        $activeCart = $this->getActiveCart();
        return view('store.checkout-payment')
            ->with('activeCart', $activeCart)
            ->with('items', $items);
    }

    // Step 4
    public function checkoutReview(Request $request)
    {
        $activeCart = $this->getActiveCart();
        return view('store.checkout-review')
            ->with('activeCart', $activeCart);
    }

    // Check if data is full (Not used yet)
    public function checkoutCheckData(Request $request)
    {
        // Check if customer data has null or empty values
        $customer = Customer::where('id', auth()->guard('customer')->user()->id)->first();
        $customer = $customer->toArray();
        unset($customer['id'], $customer['created_at'], $customer['updated_at'], $customer['avatar'], $customer['phone2']);
        
        $emptyValues = [];
        foreach ($customer as $key => $val) {
            if($val == '' or $val === '0' or $val === null){
                $emptyValues += [$key => $val];
            }
        }
        if(!$emptyValues){
            return true;
        } else {
            return back()->with('message','Debe completar todos los datos requeridos');
        }    
    }

    public function mpConnect(Request $request)
    {
        $cartid = $request->cartId;
        $cart = Cart::where('id', $cartid)->first();
        $cartTotal = $request->cartTotal;
        // Al pedo el quilombo mandar solo el detalle general de la compra
        $preferenceData = [
            'items' => [
                [
                    'id' => 'ORD#'.$cart->id,
                    'category_id' => '-',
                    'title' => 'Compra Vadmin',
                    'description' => 'iPhone 6 de 64gb nuevo',
                    'picture_url' => 'http://d243u7pon29hni.cloudfront.net/images/products/iphone-6-dorado-128-gb-red-4g-8-mpx-1256254%20(1)_m.png',
                    'quantity' => 1,
                    'currency_id' => 'ARS',
                    'unit_price' => floatval($cartTotal)
                ]
            ],
        ];
        //dd($preferenceData);
        try{
            $preference = MP::create_preference($preferenceData);
            //return dd($preference);
            $initPoint = $preference['response']['init_point'];
            //return dd($preference['response']['init_point']);
            return response()->json(['response' => true, 'result' => $initPoint]);
        } catch (\Exception $e){
            return response()->json(['response' => true, 'result' => $e]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */

    public function customerAccount(Request $request)
    {
        $favs       = $this->getCustomerFavs();
        $activeCart = $this->getActiveCart();
        return view('store.customer-account')
            ->with('activeCart', $activeCart)
            ->with('favs', $favs);
    }

    public function customerOrders(Request $request)
    {
        $customer = auth()->guard('customer')->user();
        $carts    = Cart::where('customer_id', auth()->guard('customer')->user()->id)->get();
        $activeCart = $this->getActiveCart();
        return view('store.customer-orders')
            ->with('customer', $customer)
            ->with('carts', $carts)
            ->with('activeCart', $activeCart);
    }

    public function customerCartDetail(Request $request)
    {
        $cart = Cart::where('id', $request->id)->first();
        $cartTotal = 0;
        $activeCart = $this->getActiveCart();

        foreach($cart->details as $item){
            $cartTotal += $item->article->price;
        }

        return view('store.customer-cart')
            ->with('cartTotal', $cartTotal)
            ->with('cart', $cart)
            ->with('activeCart', $activeCart);
    }
    
    public function customerActiveCartDetail(Request $request)
    {
        $cart = $this->getActiveCart();
        $activeCart = $cart;
        return view('store.customer-active-cart')
            ->with('cart', $cart)
            ->with('activeCart', $activeCart);
    }
    
    public function getActiveCart()
    {
        $cartTotal = 0;
        if(auth()->guard('customer')->check()){
            $activeCart = Cart::where('status', '=', 'Active')->where('customer_id', auth()->guard('customer')->user()->id)->first();
        } else {
            $activeCart = null;
        }
        if(!$activeCart){
        } else {
            foreach($activeCart->details as $item){
                $cartTotal += $item->article->price;
            }
        }
    
        return array("activeCart" => $activeCart,
                     "cartTotal" => $cartTotal);
    }

    public function updatePassword(Request $request)
    {
        $cart = $this->getActiveCart();
        $activeCart = $cart;

        return view('store.customer-updatepassword')
            ->with('activeCart', $activeCart)
            ->with('cart', $cart);
    }

    /*
    |--------------------------------------------------------------------------
    | WISHLIST METHODS
    |--------------------------------------------------------------------------
    */

    public function customerWishlist(Request $request)
    {
        $activeCart = $this->getActiveCart();
 
        if(auth()->guard('customer')->check()){
            $favs = $this->getCustomerFavs();
            $customer = auth()->guard('customer')->user();
        } else {
            $favs = null;
            $customer = null;
        }
        
        return view('store.customer-wishlist')
            ->with('customer', $customer)
            ->with('favs', $favs)
            ->with('activeCart', $activeCart);
    }
    
    public function getCustomerFavs()
    {
        if(auth()->guard('customer')->check()){
            $favs        = CatalogFav::where('customer_id', '=', auth()->guard('customer')->user()->id)->get();
            $articleFavs = CatalogFav::where('customer_id', '=', auth()->guard('customer')->user()->id)->pluck('article_id');
            $articleFavs = $articleFavs->toArray();
        } else {
            $favs = null;
            $articleFavs = null;
        }
        return array("articleFavs" => $articleFavs,
                     "favs" => $favs);
    }

    public function addArticleToFavs(Request $request)
    {        
        $customer_id = auth()->guard('customer')->user()->id;
        try{
            $favs= CatalogFav::where('customer_id', '=', $customer_id)->where('article_id', '=', $request->article_id)->pluck('id');
            if(!$favs->isEmpty()) {
                $item = CatalogFav::find($favs[0]);
                $item->delete();
                return response()->json(['response' => true, 'result' => 'removed', 'message' => 'Hecho']); 
            } else { 
                $item = new CatalogFav($request->all());
                $item->customer_id = $customer_id;
                $item->save();
                return response()->json(['response' => true, 'result' => 'added', 'message' => 'Hecho']); 
            }

        } catch (\Exception $e){
            return response()->json(['response' => false, 'message' => $e]); 
        }
    }

    public function removeArticleFromFavs(Request $request)
    {
        try{
            $item = CatalogFav::find($request->fav_id);
            $item->delete();
            return response()->json(['response' => true, 'result' => 'removed', 'doaction' => 'reload']);
        } catch (\Exception $e){
            return response()->json(['response' => false, 'message' => $e]); 
        }
    }

    public function removeAllArticlesFromFavs(Request $request)
    {
        try{
            $items = CatalogFav::where('customer_id', '=', $request->customer_id)->delete();
            return response()->json(['response' => true, 'result' => 'removed', 'message' => 'Hecho']);
        } catch (\Exception $e){
            return response()->json(['response' => false, 'message' => $e]); 
        }
    }

}
