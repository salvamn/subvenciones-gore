<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\Rendicion;
use Illuminate\Http\Request;

class ModalFormularioRendicion extends Component
{
    public $isOpen = false;

    public $numero_de_rendicion;
    public $analista;
    public $fecha_de_ingreso;
    public $fecha_de_cierre;
    public $dias;
    public $monto_rendido;
    public $monto_aprobado;
    public $monto_observado;


    protected $rules = [
        'numero_de_rendicion' => 'nullable|numeric',
        'analista' => 'nullable|string|max:255',
        'fecha_de_ingreso' => 'nullable|date',
        'fecha_de_cierre' => 'nullable|date',
        'dias' => 'nullable|integer',
        'monto_rendido' => 'nullable|numeric',
        'monto_aprobado' => 'nullable|numeric',
        'monto_observado' => 'nullable|numeric',
    ];



    public function render()
    {
        return view('livewire.modal-formulario-rendicion');
    }


    public function openModal()
    {
        // Log::info(json_encode('Modal abierto'));
        $this->isOpen = true;
    }
    
    public function closeModal()
    {
        // Log::info(json_encode('Modal cerrado'));
        $this->isOpen = false;
    }



    public function submit(Request $request)
    {
        // Log::info($this->dias);
        // dd($validarData);
        // $this->formatear_numero($this->monto_rendido);
        $validarData = $this->validate();
        Rendicion::create($validarData);
        session(['data' => $validarData]);
        // $this->resetForm();
        // Log::info(json_encode($validarData));

        

        $this->closeModal();

        return view('welcome');
    }
}
