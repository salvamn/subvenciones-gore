<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rendicion;

class TablaSubvenciones extends Component
{
    public $rendiciones;
    public $montoProyecto;
    public $montoRendido;
    public $montoPorRendir;





    public function mount()
    {
        // Log::info('este metodo se esta ejecutando');
        $this->rendiciones = Rendicion::orderBy('numero_de_rendicion', 'asc')->get();
    }

    // function formatear_numero($numero)
    // {
    //     return number_format($numero, 2, ',', '.');
    // }


    // Escuchar eventos de otro componente para actualizar la tabla
    protected $listeners = [
        'rendicionAgregada' => 'actualizarTabla',
    ];


    // Método para actualizar la tabla después de agregar una rendición
    public function actualizarTabla()
    {
        $this->rendiciones = Rendicion::all();
    }


    
    public function render()
    {
        return view('livewire.tabla-subvenciones');
    }
}
