<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogCategory;
use App\CatalogArticle;
use App\CatalogImage;
use App\CatalogAtribute1;

class StoreController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $articles = CatalogArticle::orderBy('id', 'DESCC')->where('status','1')->paginate(15);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });
        $categories = CatalogCategory::all();
        $atributes1  = CatalogAtribute1::orderBy('id', 'ASC')->pluck('name', 'id');

    return view('store.index')
        ->with('articles', $articles)
        ->with('atributes1', $atributes1)
        ->with('categories', $categories);
    }

    public function product(Request $request)
    {
        $article = CatalogArticle::findOrFail($request->id);
        return view('store.product')->with('article', $article);
    }

}
