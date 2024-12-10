<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rendicion;

class TablaSubvenciones extends Component
{
    public $rendiciones;


    public function mount()
    {
        // Log::info('este metodo se esta ejecutando');
        $this->rendiciones = Rendicion::orderBy('numero_de_rendicion', 'asc')->get();
    }

    // function formatear_numero($numero)
    // {
    //     return number_format($numero, 2, ',', '.');
    // }


    
    public function render()
    {
        return view('livewire.tabla-subvenciones');
    }
}
