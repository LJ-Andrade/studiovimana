<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Cart;
use App\User;
use Mail;
use App\Mail\SendMail;

class VadminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    public function index(Request $request)
    {
        return view('vadmin.vadmin');
    }

    public function storeControlPanel(Request $request)
    {
        $activeCarts = Cart::where('status', 'Active')->count();
        return view('vadmin.catalog.control-panel')
            ->with('activeCarts', $activeCarts);
    }

    public function docs(Request $request)
    {
        return view('vadmin.support.docs');
    }

    /*
    |--------------------------------------------------------------------------
    | MESSAGES / CONTACTS
    |--------------------------------------------------------------------------
    */

    public function storedContacts(Request $request)
    {
        $items = Contact::orderBy('id','ASC')->paginate(10);
        return view('vadmin.contact.index')
            ->with('items', $items);
    }

    public function showStoredContact(Request $request, $id)
    {
        $item = Contact::findOrFail($id);
        return view('vadmin.contact.show')
            ->with('item', $item);
    }

    public function updateMessageStatus(Request $request, $id)
    {
        try{
            $item = Contact::findOrFail($id);
            $item->status = $request->status;
            $item->user = $request->user;
            $item->save();
            return response()->json([
                'response'   => true,
                'message'    => 'Mensaje Actualizado'
            ]); 
        } catch (\Exception $e) {
            return response()->json([
                'response'   => false,
                'message'    => $e
            ]); 
        }
    }

    public function setMessageAsReaded(Request $request){
        // Set All messages as readed
        $user = auth()->guard('user')->user();
        if($request->id == null){
            try{
                $items = Contact::where('status', '0')->get();
                foreach($items as $item){
                    $item->status = '1';
                    $item->user = $user->name;
                    $item->save();
                }
                $newMessagesN = Contact::where('status', '=', '0')->count();
                return response()->json([
                    'response'    => true,
                    'message'     => 'Mensaje Actualizado',
                    'newMessagesN' => $newMessagesN
                ]); 
    
            } catch (\Exception $e) {
                return response()->json([
                    'response'   => false,
                    'message'    => $e
                ]); 
            }
        } else { 
            // Set Specific messages as readed    
            $id = $request->id;
            
            
            try{
                $item = Contact::findOrFail($id);
                $item->status = '1';
                $item->user = $user->name;
                $item->save();
                $newMessagesN = Contact::where('status', '=', '0')->count(); 

                return response()->json([
                    'response'    => true,
                    'message'     => 'Mensaje Actualizado',
                    'newMessagesN' => $newMessagesN
                ]); 

            } catch (\Exception $e) {
                return response()->json([
                    'response'   => false,
                    'message'    => $e
                ]); 
            }
        }
    }

    public function destroyStoredContacts(Request $request)
    {       
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        
        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = Contact::find($id);
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
                $record = Contact::find($id);
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

    public function sendMail()
    {
        //dd('Ok, estoy en mail');
        $subject = 'Asunto de la notificación';
        $content = 'Pruebita';

        try {
            Mail::to(APP_EMAIL_1)->send(new SendMail($subject, $content));

            return redirect('vadmin')->with('message','Mail Enviado');
        } catch (\Exception $e) {
            dd($e);
            return view('vadmin.vadmin')->with('error', 'Ha ocurrido un error '. $e);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | CONFIGS
    |--------------------------------------------------------------------------
    */

    public function configs()
    {
        return view('vadmin.configs');
    }

    public function infophp()
    {
        phpinfo();
    }


}
