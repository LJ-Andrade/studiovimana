<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogCategory;
use App\CatalogTag;
use App\CatalogArticle;
use App\CatalogImage;
use File;


class ArticlesController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $title    = $request->get('title');
        $category = $request->get('category');

        // if(isset($title)){
        //     $articles = Catalog\Catalog::searchtitle($title)->orderBy('id', 'ASC')->paginate(15); 
        // } elseif(isset($category)) {
        //     $articles = Catalog::where('category_id', $category)->orderBy('id', 'ASC')->paginate(15);
        // } else {
             $articles = CatalogArticle::orderBy('id', 'DESCC')->paginate(15);
             $articles->each(function($articles){
                 $articles->category;
                 $articles->user;
             });
        // }

        $categories = CatalogCategory::orderBy('id','ASC')->pluck('name','id');

        return view('vadmin.catalog.index')
            ->with('articles', $articles)
            ->with('categories', $categories);

    }

    public function show($id)
    {
        $article = CatalogArticle::find($id);
        return view('vadmin.portfolio.show')->with('article', $article);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {
        $categories = CatalogCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = CatalogTag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('vadmin.catalog.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'title'       => 'required|min:4|max:250|unique:cat_articles',
            'category_id' => 'required',
            'slug'        => 'required|alpha_dash|min:5|max:255|unique:cat_articles,slug',
            'content'     => 'required|min:1',
            'image'       => 'image',

        ],[
            'title.required'       => 'Debe ingresar un título',
            'title.min'            => 'El título debe tener al menos 4 caracteress',
            'title.max'            => 'El título debe tener como máximo 250 caracteress',
            'title.unique'         => 'El título ya existe en otro artículo',
            'category_id.required' => 'Debe ingresar una categoría',
            'slug.required'        => 'Se requiere un slug',
            'slug.min'             => 'El slug debe tener 5 caracteres como mínimo',
            'slug.max'             => 'El slug debe tener 255 caracteres como máximo',
            'slug.max'             => 'El slug debe tener guiones bajos en vez de espacios',
            'slug.unique'          => 'El slug debe ser único, algún otro artículo lo está usando',
            'content.min'          => 'El contenido debe contener al menos 60 caracteres',
            'content.required'     => 'Debe ingresar contenido',
            'image'                => 'El archivo adjuntado no es soportado',
        ]);

        $path             = public_path("webimages/catalog/"); 
        $article          = new CatalogArticle($request->all());

        $article->user_id = \Auth::user()->id;
        $article->save();

        // Sync() fills pivote table. Gets un array.
        $article->tags()->sync($request->tags);

        $images           = $request->file('images');

        if ($article->save() && $images)
        {
            foreach($images as $phisic_image)
            {
                $name     = md5($phisic_image->getFilename().time()).'.'.$phisic_image->getClientOriginalExtension();
                $img      = \Image::make($phisic_image->path());
                
                $img->fit(600)->save($path.'/'.$name);

                $image            = new Image();
                $image->name      = $name;
                $image->article()->associate($article);
                $image->save();
            }
        } 
        return redirect()->route('portfolio.index')->with('message','Artículo creado');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {   
        $tags       = CatalogTag::orderBy('name', 'DESC')->pluck('name', 'id');
        $article    = CatalogArticle::find($id);
        $article->category;
        $categories = CatalogCategory::orderBy('name', 'DESC')->pluck('name', 'id');
        $article->each(function($article){
                $article->images;
        });

        // Acá se llaman los id de los tags y se los convierte de objeto a array
        $actual_tags = $article->tags->pluck('id')->ToArray();
        $status      = $article->status;

        return view('vadmin.portfolio.edit')
            ->with('categories', $categories)
            ->with('article', $article)
            ->with('tags', $tags)
            ->with('actual_tags', $actual_tags)
            ->with('status', $status);
    }

    public function update(Request $request, $id)
    {
        $path      = public_path("webimages/catalog/"); 

        $article   = CatalogArticle::find($id);
        $article->fill($request->all());
        $article->save();

        // Sync() fills pivote table. Gets un array.
        $article->tags()->sync($request->tags);

        $images    = $request->file('images');

        if ($article->save() && $images)
        {
            foreach($images as $phisic_image)
            {
                $name         = md5($phisic_image->getFilename().time()).'.'.$phisic_image->getClientOriginalExtension();
                $img          = \Image::make($phisic_image->path());
                
                $img->fit(600)->save($path.'/'.$name);

                $image        = new Image();
                $image->name  = $name;
                $image->article()->associate($article);
                $image->save();
            }
        } 
        return redirect()->route('portfolio.index')->with('message', 'Se ha editado el artículo con éxito');
    }

    public function updateStatus(Request $request, $id)
    {
            $article = CatalogArticle::find($id);
            $article->status = $request->status;
            $article->save();

            return response()->json([
                "lastStatus" => $article->status,
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
    {   
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        
        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = CatalogArticle::find($id);
                    $record->delete();
                }
                return response()->json([
                    'success'   => true,
                ]); 
            }  catch (Exception $e) {
                return response()->json([
                    'success'   => false,
                    'error'    => 'Error: '.$e
                ]);    
            }
        } else {
            try {
                $record = CatalogArticle::find($id);
                $record->delete();
                    return response()->json([
                        'success'   => true,
                    ]);  
                    
                } catch (Exception $e) {
                    return response()->json([
                        'success'   => false,
                        'error'    => 'Error: '.$e
                    ]);    
                }
        }
    }

}
