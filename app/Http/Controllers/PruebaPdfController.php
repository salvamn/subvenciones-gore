<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class PruebaPdfController extends Controller
{

    public function render()
    {
        return view('pruebaPdf');
    }


}
