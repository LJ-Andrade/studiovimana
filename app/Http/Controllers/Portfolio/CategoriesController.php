<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */
    
    public function index(Request $request)
    {   
        $name    = $request->get('name');

        if(isset($name)){
            $categories = Category::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $categories = Category::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.portfolio.categories.index')->with('categories', $categories);
    }

    public function show($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'max:120|required|unique:categories'
        ],[
            'name.unique'         => 'La categoría ya existe'
        ]);

        if ($request->ajax())
        {            
            $result = Category::create($request->all());
            if ($result)
            {
                return response()->json(['success'=>'true', 'message'=>'Categoria creada']);
            } else {
                return response()->json(['success'=>'false', 'error'=>'Error']);        
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $category = Category::find($id);
        return view('vadmin.categories.edit')->with('category', $category);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'     => 'max:120|required|unique:categories'
        ],[
            'name.unique'         => 'La categoría ya existe'
        ]);
        
        $category = Category::find($id);
        $category->fill($request->all());

        // // O se puede hacer individualmente
        // // $user->name  = $request->name;
        // // $user->email = $request->email;
        // // $user->type  = $request->type;
        
        $result = $category->save();
        if ($result) {
            return response()->json(['success'=>'true']);
        } else {
            return response()->json(['success'=>'false']);
        }
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
                    $record = Categorie::find($id);
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
                $record = Categorie::find($id);
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



} // End
