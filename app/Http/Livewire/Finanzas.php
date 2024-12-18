<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use App\Models\Rendicion;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade as PDF;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Finanzas extends Component
{
    public $proyecto;
    public $rendiciones;
    public $rendicionesTotales;
    public $montoFaltante;

    public $datos;

    // animacion
    public $cargando = false;

    public function mount()
    {

        $this->proyecto = Proyecto::find(1);
        $this->rendiciones = Rendicion::all();
        $this->rendicionesTotales = Rendicion::sum('monto_rendido');

        $restaMontoYRendiciones = $this->proyecto->monto - $this->rendicionesTotales;
        $this->montoFaltante = $restaMontoYRendiciones;

        // $this->$montoFaltante
        // Log::info($restaMontoYRendiciones);
        // Log::info($this->rendiciones);
        // $sumaRendiciones = 
    }


    public function generarPdf()
    {
        $this->cargando = true;
        set_time_limit(120);

        $logoUrl = public_path('images/gorelogo.jpg');

        $this->datos = [
            'titulo' => 'U de Chile',
            'descripcion' => 'Lo mas grande',
            'proyecto' => $this->proyecto,
            'rendiciones' => $this->rendiciones,
            'montoFaltante' => $this->montoFaltante,
            'logo' => $logoUrl,
            // 'imagePath' => public_path('img/ulogo.png'),
        ];

        Log::info('boton clickeado');

        // información util
        // https://stackoverflow.com/questions/66082553/dompdf-not-downloading-pdf-from-laravel-8-and-a-livewire-view
        // https://stackoverflow.com/questions/77037520/laravel-livewire-and-dompdf
        // PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);->
        // https://stackoverflow.com/questions/45690599/laravel-dompdf-error-image-not-found-or-type-unknown

        $pdfContent = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pruebaPdf', ['datos'=>$this->datos])->output();
        $this->cargando = false; // Desactivar animación de carga
        return response()->streamDownload(
             fn () => print($pdfContent),
             "prueba.pdf"
        );


    }



    public function render()
    {
        return view('livewire.finanzas');
    }
}
