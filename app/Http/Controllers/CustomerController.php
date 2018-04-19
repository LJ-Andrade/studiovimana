<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use Image;
use File;
use PDF;
use Excel;

class CustomerController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DISPLAY
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $name  = $request->get('name');
        $role  = $request->get('role');
        $group = $request->get('group');
        $paginate = 15;

        if(isset($name)){
            $items = Customer::searchName($name)->orderBy('id', 'ASC')->paginate($paginate); 
        }
        elseif(isset($role) || isset($group))
        {
            $items = Customer::searchRoleGroup($role, $group)->orderBy('id', 'ASC')->paginate($paginate); 
        }
        else 
        {
            $items = Customer::orderBy('id', 'ASC')->paginate($paginate); 
        }

        return view('vadmin.customers.index')
            ->with('items', $items)
            ->with('name', $name)
            ->with('role', $role)
            ->with('group', $group);
    }
    
    public function show($id)
    {
        $Customer = Customer::findOrFail($id);
        return view('vadmin.customers.show', compact('Customer'));
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    public function exportPdf($params)
    {   
        $items = $this->getData($params);
        dd($items);
        $pdf = PDF::loadView('vadmin.customers.invoice', array('items' => $items));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('listado-de-usuarios.pdf');
        
    }

    public function exportXls($params)
    {   
        $items = $this->getData($params);
        Excel::create('listado-de-usuarios', function($excel) use($items){
            $excel->sheet('Listado', function($sheet) use($items) {   
                $sheet->loadView('vadmin.customers.invoice-excel', 
                compact('items'));
            });
        })->export('xls');         
    }


    public function getData($params)
    {
        if($params == 'all'){
            $items = Customer::orderBy('id', 'ASC')->get(); 
            return $items;
        }

        parse_str($params , $query);
        if(isset($query['name'])){
            return $items = Customer::searchname($query['name'])->orderBy('id', 'ASC')->get(); 
        }

        if(isset($query['role']) && isset($query['group']) ){
            return $items = Customer::searchRoleGroup($query['role'], $query['group'])->orderBy('id', 'ASC')->get();
        } elseif(isset($query['group'])){
            return $items = Customer::searchRoleGroup($query['group'])->orderBy('id', 'ASC')->get();
        } elseif(isset($query['role'])){
            return $items = Customer::searchRoleGroup($query['role'])->orderBy('id', 'ASC')->get();
        } 

        $items = Customer::orderBy('id', 'ASC')->get(); 
        return $items;
    }



    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.customers.create');
    }

    public function store(Request $request)
    {
        $Customer = new Customer($request->all());
        $this->validate($request,[
            'name'           => 'required',
            'email'          => 'min:3|max:250|required|unique:customers,email',
            'password'       => 'min:4|max:12listado-usuarios0|required|',
            
        ],[
            'email.required' => 'Debe ingresar un email',
            'email.unique'   => 'El email ya existe',
            'password'       => 'Debe ingresar una contraseña',
        ]);

        if($request->file('avatar') != null){
            $avatar   = $request->file('avatar');
            $filename = $Customer->Customername.'.jpg';
            Image::make($avatar)->encode('jpg', 80)->fit(300, 300)->save(public_path('images/customers/'.$filename));
            $Customer->avatar = $filename;
        }

        $Customer->password = bcrypt($request->password);
        $Customer->save();

        return redirect('vadmin/customers')->with('message', 'Usuario agregado correctamente');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $Customer = Customer::findOrFail($id);
        return view('vadmin.customers.edit', compact('Customer'));
    }

    public function update(Request $request, $id)
    {
        $Customer = Customer::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|max:255',
            'Customername' => 'required|max:20|unique:customers,Customername,'.$Customer->id,
            'email' => 'required|email|max:255|unique:customers,email,'.$Customer->id,
            'password' => 'required|min:6|confirmed',
            
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'Customername.required' => 'Debe ingresar un nombre de usuario',
            'Customername.unique' => 'El nombre de usuario ya está siendo utilizado',
            'email.required' => 'Debe ingresar un email',
            'email.unique' => 'El email ya existe',
            'password.min' => 'El password debe tener al menos :min caracteres',
            'password.required' => 'Debe ingresar una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $Customer->fill($request->all());

        $Customer->password = bcrypt($request->password);
        if($request->file('avatar') != null){
            $avatar   = $request->file('avatar');
            $filename = $Customer->Customername.'.jpg';
            Image::make($avatar)->encode('jpg', 80)->fit(300, 300)->save(public_path('images/customers/'.$filename));
            $Customer->avatar = $filename;
        }

        $Customer->save();

        return redirect('vadmin/customers')->with('Message', 'Usuario '. $Customer->name .'editado correctamente');
    }

    // ---------- Update Avatar --------------- //
    public function updateAvatar(Request $request)
    {
        
        if ($request->hasFile('avatar')) {

            $Customer     = Customer::findOrFail($request->id);
            $avatar   = $request->file('avatar');
            $filename = $Customer->id.'.jpg';
            try{
                Image::make($avatar)->encode('jpg', 80)->fit(300, 300)->save(public_path('images/customers/'.$filename));
                if ($Customer->avatar != "default.jpg") {
                    $path     = public_path('images/customers/');
                    $lastpath = $Customer->avatar;
                    File::Delete($path . $lastpath);   
                }
                $Customer->avatar = $filename;
                $Customer->save();
                return redirect('vadmin/customers/'.$Customer->id)->with('message', 'Avatar actualizado');
            }   catch(\Exception $e){
                dd($e);
            }
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
                    $record = Customer::find($id);
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
                $record = Customer::find($id);
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
