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
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Facades\Response;


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


    public function export()
    {
        // Obtener los datos de las rendiciones
        $rendiciones = Rendicion::all();

        // Crear una nueva hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar encabezados
        $sheet->setCellValue('A1', 'Número de Rendición');
        $sheet->setCellValue('B1', 'Fecha de Ingreso');
        $sheet->setCellValue('C1', 'Fecha de Cierre');
        $sheet->setCellValue('D1', 'Días');
        $sheet->setCellValue('E1', 'Monto Rendido');
        $sheet->setCellValue('F1', 'Monto Aprobado');
        $sheet->setCellValue('G1', 'Monto Observado');
        $sheet->setCellValue('H1', 'Analista');
        $sheet->setCellValue('I1', 'ID Proyecto');

        // Llenar la hoja con los datos de las rendiciones
        $row = 2; // Comenzamos desde la segunda fila porque la primera es para los encabezados
        foreach ($rendiciones as $rendicion) {
            $sheet->setCellValue('A' . $row, $rendicion->numero_de_rendicion);
            $sheet->setCellValue('B' . $row, $rendicion->fecha_de_ingreso);
            $sheet->setCellValue('C' . $row, $rendicion->fecha_de_cierre);
            $sheet->setCellValue('D' . $row, $rendicion->dias);
            $sheet->setCellValue('E' . $row, $rendicion->monto_rendido);
            $sheet->setCellValue('F' . $row, $rendicion->monto_aprobado);
            $sheet->setCellValue('G' . $row, $rendicion->monto_observado);
            $sheet->setCellValue('H' . $row, $rendicion->analista);
            $sheet->setCellValue('I' . $row, $rendicion->proyecto_id);
            $row++;
        }

        // Ajustar el tamaño de las columnas automáticamente
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Alinear todo el contenido de las celdas a la izquierda
        $sheet->getStyle('A1:I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        // Crear el escritor de Excel
        $writer = new Xlsx($spreadsheet);

        // Generar el archivo Excel y devolverlo como una respuesta para descarga
        $filename = 'rendiciones.xlsx';

        // Enviar el archivo para descarga
        return Response::stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="' . $filename . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );
    
    }


    public function render()
    {
        return view('livewire.finanzas');
    }
}
