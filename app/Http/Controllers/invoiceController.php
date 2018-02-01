<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use App\User;

class invoiceController extends Controller
{
    public function exportViewPdf($view, $model, $filename)
    {   
        
        $prefix = "App";
        $modelname = $prefix . "\\". $model;
        $items = $modelname::all();
        $pdf = PDF::loadView($view, array('items' => $items));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream($filename.'.pdf');
    }
}
