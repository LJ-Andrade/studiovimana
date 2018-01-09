<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CatalogCategory;
use App\CatalogArticle;
use App\CatalogImage;
use App\CatalogAtribute1;
use App\CatalogFav;


class StoreController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:customer');
    }

    public function index()
    {
        $articles = CatalogArticle::orderBy('id', 'DESCC')->where('status','1')->paginate(15);
        // $articles->each(function($articles){
        //     $articles->category;
        //     $articles->user;
        // });
        $categories = CatalogCategory::all();
        $atributes1 = CatalogAtribute1::orderBy('id', 'ASC')->pluck('name', 'id');
        $favs       = $this->getCustomerFavs();

    return view('store.index')
        ->with('articles', $articles)
        ->with('atributes1', $atributes1)
        ->with('categories', $categories)
        ->with('favs', $favs);
    }

    // public function login()
    // {
    //     return view('store.login');
    // }

    // public function register()
    // {
    //     return view('store.register');
    // }

    public function clientProfile(Request $request){
        $favs    = $this->getCustomerFavs();
        return view('store.client-profile')->with('favs', $favs);
    }

    public function show(Request $request)
    {
        $article = CatalogArticle::findOrFail($request->id);
        $user    = auth()->guard('customer')->user();
        $isFav   = CatalogFav::where('client_id', '=', $user->id)->where('article_id', '=', $article->id)->get();
        if(!$isFav->isEmpty()){
            $isFav = true;
        } else {
            $isFav = false;
        }
        return view('store.show')
            ->with('article', $article)
            ->with('isFav', $isFav)
            ->with('user', $user);
    }

    /*
    |--------------------------------------------------------------------------
    | WISHLIST METHODS
    |--------------------------------------------------------------------------
    */

    public function clientWishlist(Request $request){
        if(auth()->guard('customer')->check()){
            $favs = $this->getCustomerFavs();
            $customer = auth()->guard('customer')->user();
        } else {
            $favs = null;
        }
        
        return view('store.client-wishlist')
            ->with('customer', $customer)
            ->with('favs', $favs)
            ->with('message', 'Mensaje');
    }
    
    public function getCustomerFavs(){
        if(auth()->guard('customer')->check()){
            $favs        = CatalogFav::where('client_id', '=', auth()->guard('customer')->user()->id)->get();
            $articleFavs = CatalogFav::where('client_id', '=', auth()->guard('customer')->user()->id)->pluck('article_id');
            $articleFavs = $articleFavs->toArray();
        } else {
            $favs = null;
            $articleFavs = null;
        }
        return array("articleFavs" => $articleFavs,
                     "favs" => $favs);
    }

    public function addArticleToFavs(Request $request){        
        
        try{
            $favs= CatalogFav::where('client_id', '=', $request->client_id)->where('article_id', '=', $request->article_id)->pluck('id');
            if(!$favs->isEmpty()) {
                $item = CatalogFav::find($favs[0]);
                $item->delete();
                return response()->json(['response'   => true, 'result' => 'removed', 'message' => 'Hecho']); 
            } else { 
                $item = new CatalogFav($request->all());
                $item->save();
                return response()->json(['response'   => true, 'result' => 'added', 'message' => 'Hecho']); 
            }

        } catch (\Exception $e){
            return response()->json(['response' => false, 'message' => $e]); 
        }
    }

    public function removeArticleFromFavs(Request $request){
        try{
            $item = CatalogFav::find($request->fav_id);
            $item->delete();
            return response()->json(['response'   => true, 'result' => 'removed', 'message' => 'Hecho']);
        } catch (\Exception $e){
            return response()->json(['response'   => false, 'message' => $e]); 
        }
    }

    public function removeAllArticlesFromFavs(Request $request){
        try{
            $items = CatalogFav::where('client_id', '=', $request->customer_id)->delete();
            return response()->json(['response'   => true, 'result' => 'removed', 'message' => 'Hecho']);
        } catch (\Exception $e){
            return response()->json(['response'   => false, 'message' => $e]); 
        }
    }

}
