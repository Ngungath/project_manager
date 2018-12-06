<?php

namespace Danny\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfController extends Controller
{
    public function make(){
        $data="hellow daniel";
    	$pdf = PDF::loadView('pdf.invoice', ["data"=>$data]);
        return $pdf->download('invoice.pdf');
    }
}
