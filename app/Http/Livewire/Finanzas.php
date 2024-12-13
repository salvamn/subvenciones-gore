<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use App\Models\Rendicion;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade as PDF;

class Finanzas extends Component
{
    public $proyecto;
    public $rendicionesTotales;
    public $montoFaltante;


    public function mount()
    {

        $this->proyecto = Proyecto::find(1);
        $this->rendicionesTotales = Rendicion::sum('monto_rendido');

        $restaMontoYRendiciones = $this->proyecto->monto - $this->rendicionesTotales;
        $this->montoFaltante = $restaMontoYRendiciones;

        // $this->$montoFaltante
        Log::info($restaMontoYRendiciones);
        // $sumaRendiciones = 




    }


    // public function generatePDF()
    // {
    //     // Datos para pasar a la vista
    //     // $data = [
    //     //     'title' => 'Reporte de Rendición',
    //     //     'content' => 'Este es el contenido de nuestro reporte.',
    //     // ];

    //     // Cargar la vista HTML para el PDF
    //     // $pdf = Pdf::loadView('livewire/p-d-freporte', $data);

    //     // Retornar el PDF como respuesta (esto descarga el archivo)
    //     // return $pdf->download('reporte_rendicion.pdf');
    //     $pdf = Pdf::loadView('livewire/p-d-freporte');
    //     return $pdf->download('reporte_rendicion.pdf');
    // }


    public function generarPdf()
    {
        $datos = [
            'titulo' => 'Reporte de Ventas',
            'ventas' => [
                ['producto' => 'Producto 1', 'cantidad' => 10, 'precio' => 100],
                ['producto' => 'Producto 2', 'cantidad' => 20, 'precio' => 200],
            ],
        ];

        // Cargar la vista de Blade con los datos y generar el PDF
        $pdf = PDF::loadView('livewire.p-d-freporte', $datos);

        // Descargar el PDF
        // return $pdf->download('reporte.pdf');
        return $pdf->stream('prueba.pdf');
    }



    public function render()
    {
        return view('livewire.finanzas');
    }
}
