<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogCategory;
use App\CatalogArticle;
use App\CatalogImage;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = CatalogArticle::orderBy('id', 'DESCC')->where('status','1')->paginate(15);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });
        $categories = CatalogCategory::orderBy('id','ASC')->pluck('name','id');

    return view('store.index')
        ->with('articles', $articles)
        ->with('categories', $categories);
    }

    public function product()
    {
        return view('store.product');
    }

}