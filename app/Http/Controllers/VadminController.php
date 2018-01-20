<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Cart;

class VadminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    public function index(Request $request)
    {
        $messages = Contact::where('status', '=', '0')->count();
        return view('vadmin.vadmin')->with('messages', $messages);
    }

    public function storeControlPanel(Request $request)
    {
        $activeCarts = Cart::where('status', 'Active')->count();
        return view('vadmin.catalog.control-panel')
            ->with('activeCarts', $activeCarts);
    }

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

}
