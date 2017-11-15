<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogCategory;
use App\CatalogTag;
use App\CatalogArticle;
use App\CatalogImage;
use App\CatalogAtribute1;
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
        $title    = $request->get('name');
        // $category = $request->get('category');

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
        return view('vadmin.catalog.show')->with('article', $article);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {
        $categories = CatalogCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        $atribute1  = CatalogAtribute1::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = CatalogTag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('vadmin.catalog.create')
            ->with('categories', $categories)
            ->with('atribute1', $atribute1)
            ->with('tags', $tags);
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[

            'name'        => 'required|min:4|max:250|unique:catalog_articles',
            'code'        => 'unique:catalog_articles,code',
            'category_id' => 'required',
            'slug'        => 'required|alpha_dash|min:4|max:255|unique:catalog_articles,slug',
            'image'       => 'image',

        ],[
            'name.required'        => 'Debe ingresar un nombre',
            'name.min'             => 'El título debe tener al menos 4 caracteress',
            'name.max'             => 'El título debe tener como máximo 250 caracteress',
            'name.unique'          => 'El título ya existe en otro artículo',
            'code.unique'          => 'El código está utilizado por otro producto',
            'category_id.required' => 'Debe ingresar una categoría',
            'slug.required'        => 'Se requiere un slug',
            'slug.min'             => 'El slug debe tener 4 caracteres como mínimo',
            'slug.max'             => 'El slug debe tener 255 caracteres como máximo',
            'slug.max'             => 'El slug debe tener guiones bajos en vez de espacios',
            'slug.unique'          => 'El slug debe ser único, algún otro artículo lo está usando',
            'image'                => 'El archivo adjuntado no es soportado',
        ]);
    
        try {
            $article           = new CatalogArticle($request->all());
            $article->user_id  = \Auth::user()->id;
            
            $images            = $request->file('images');
            $imgPath           = public_path("webimages/catalogo/"); 
            $extension         = '.jpg';
            
            $article->thumb    = $article->code.'-thumb'.$extension;
            $article->save();
            $article->atribute1()->sync($request->atribute1);
            $article->tags()->sync($request->tags);
            
            $number = '0';
            try {
                foreach($images as $phisic_image)
                {
                    $filename = $article->code.'-'.$number++;
                    $img      = \Image::make($phisic_image);
                    $img->encode('jpg', 80)->fit(800, 800)->save($imgPath.$filename.$extension);
                    
                    $image            = new CatalogImage();
                    $image->name      = $filename.$extension;
                    $image->article()->associate($article);
                    $image->save();
                }
            } catch(\Exception $e) {
                $article->delete();
                return redirect()->route('catalogo.index')->with('message','Error al crear el artículo');
            }
            
            $thumb      = \Image::make($images[0]);
            $thumb->encode('jpg', 80)->fit(250, 250)->save($imgPath.$article->code.'-thumb'.$extension);
            
        } catch(\Exception $e){
            dd($e);
        }
        
        return redirect()->route('catalogo.index')->with('message','Artículo creado');
    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {   
        $tags       = CatalogTag::orderBy('name', 'DESC')->pluck('name', 'id');
        $atribute1  = CatalogAtribute1::orderBy('name', 'DESC')->pluck('name', 'id');
        $article    = CatalogArticle::find($id);
        $categories = CatalogCategory::orderBy('name', 'DESC')->pluck('name', 'id');
        $article->each(function($article){
                $article->images;
        });

        return view('vadmin.catalog.edit')
            ->with('categories', $categories)
            ->with('article', $article)
            ->with('tags', $tags)
            ->with('atribute1', $atribute1);
    }

    public function update(Request $request, $id)
    {
        $article   = CatalogArticle::find($id);
        $article->fill($request->all());
        
        $images    = $request->file('images');
        $imgPath   = public_path("webimages/catalogo/"); 
        $extension = '.jpg';
        
        try {

            $article->thumb    = $article->code.'-thumb'.$extension;
            $article->save();
            $article->atribute1()->sync($request->atribute1);
            $article->tags()->sync($request->tags);
            
            $number = '0';
            try {
                foreach($images as $phisic_image)
                {
                    $filename = $article->code.'-'.$number++;
                    $img      = \Image::make($phisic_image);
                    $img->encode('jpg', 80)->fit(800, 800)->save($imgPath.$filename.$extension);
                    
                    $image            = new CatalogImage();
                    $image->name      = $filename.$extension;
                    $image->article()->associate($article);
                    $image->save();
                }
            } catch(\Exception $e) {
                $article->delete();
                return redirect()->route('catalogo.index')->with('message','Error al crear el artículo');
            }

        } catch(\Exception $e){
            dd($e);
        }
          
        $thumb      = \Image::make($images[0]);
        $thumb->encode('jpg', 80)->fit(250, 250)->save($imgPath.$article->code.'-thumb'.$extension);

        return redirect()->route('catalogo.index')->with('message', 'Se ha editado el artículo con éxito');
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
        $ids      = json_decode('['.str_replace("'",'"',$request->id).']', true);
        $path     = 'webimages/catalogo/';

        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = CatalogArticle::find($id);
                    $record->tags()->detach();
                    $record->atribute1()->detach();
                    
                    $images = $record->images;
                    File::Delete(public_path( $path . $record->thumb));
                    foreach ($images as $image) {
                        File::Delete(public_path( $path . $image->name));
                    }

                    $record->delete();
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
        } else {
            try {
                $record = CatalogArticle::find($id);
                $record->tags()->detach();
                $record->atribute1()->detach();
                
                $images = $record->images;
                File::Delete(public_path( $path . $record->thumb));
                foreach ($images as $image) {
                    File::Delete(public_path( $path . $image->name));
                }

                $record->delete();
                    return response()->json([
                        'success'   => true,
                    ]);  
                    
                } catch (\Exception $e) {
                    return response()->json([
                        'success'   => false,
                        'error'    => 'Error: '.$e
                    ]);    
                }
        }
    }

}
