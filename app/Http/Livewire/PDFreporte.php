<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class PDFreporte extends Component
{
    public function render()
    {
        // $this->generatePDF();
        return view('livewire.p-d-freporte');
    }


    public function generatePDF()
    {
        // Datos para pasar a la vista
        // $data = [
        //     'title' => 'Reporte de Rendición',
        //     'content' => 'Este es el contenido de nuestro reporte.',
        // ];

        // Cargar la vista HTML para el PDF
        // $pdf = Pdf::loadView('livewire/p-d-freporte', $data);

        // Retornar el PDF como respuesta (esto descarga el archivo)
        // return $pdf->download('reporte_rendicion.pdf');
        // $pdf = Pdf::loadView('livewire/p-d-freporte');
        // return $pdf->download('reporte_rendicion.pdf');
    }

    // public function render()
    // {
    //     // return view('livewire.p-d-freporte');
    //     $pdf = Pdf::loadView('livewire/p-d-freporte');
    //     return $pdf->download('reporte_rendicion.pdf');
    // }
}
