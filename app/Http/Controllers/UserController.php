<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use File;

class UserController extends Controller
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
        
        if(isset($name) && $name != ''){
            $items = User::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else if(isset($role) && isset($group) && $role != '*' && $group != '*' ) {
            $items = User::searchrolegroup($role, $group)->orderBy('id', 'ASC')->paginate(15); 
        } else if(isset($role) && $role != '*') {
            $items = User::searchrole($role)->orderBy('id', 'ASC')->paginate(15); 
        } else if(isset($group) && $group != '*'){ 
            $items = User::searchgroup($group)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $items = User::orderBy('id', 'ASC')->paginate(15); 
        }        

        return view('vadmin.users.index')
            ->with('items', $items)
            ->with('name', $name)
            ->with('role', $role)
            ->with('group', $group);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('vadmin.users.show', compact('user'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.users.create');
    }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $this->validate($request,[
            'name'           => 'required',
            'email'          => 'min:3|max:250|required|unique:users,email',
            'password'       => 'min:4|max:120|required|',
            
        ],[
            'email.required' => 'Debe ingresar un email',
            'email.unique'   => 'El email ya existe',
            'password'       => 'Debe ingresar una contraseña',
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('vadmin/users')->with('message', 'Usuario agregado correctamente');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('vadmin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|max:255',
            'username' => 'required|max:20|unique:users,username,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'required|min:6|confirmed',
            
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'username.required' => 'Debe ingresar un nombre de usuario',
            'username.unique' => 'El nombre de usuario ya está siendo utilizado',
            'email.required' => 'Debe ingresar un email',
            'email.unique' => 'El email ya existe',
            'password.min' => 'El password debe tener al menos :min caracteres',
            'password.required' => 'Debe ingresar una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('vadmin/users')->with('Message', 'Usuario '. $user->name .'editado correctamente');
    }

    // ---------- Update Avatar --------------- //
    public function updateAvatar(Request $request)
    {
        
        if ($request->hasFile('avatar')) {

            $user     = User::findOrFail($request->id);
            $avatar   = $request->file('avatar');
            $filename = $user->id.'.jpg';
            try{
                Image::make($avatar)->encode('jpg', 80)->fit(300, 300)->save(public_path('images/users/'.$filename));
                if ($user->avatar != "default.jpg") {
                    $path     = public_path('images/users/');
                    $lastpath = $user->avatar;
                    File::Delete($path . $lastpath);   
                }
                $user->avatar = $filename;
                $user->save();
                return redirect('vadmin/users/'.$user->id)->with('message', 'Avatar actualizado');
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
                    $record = User::find($id);
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
                $record = User::find($id);
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
