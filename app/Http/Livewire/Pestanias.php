<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pestanias extends Component
{
    public $pestanias;
    
    public function render()
    {
        $this->pestanias = [
            'proyecto',
            'ant. de respaldo',
            'ant. financiero',
            'bitacora',
            'observación',
            'pertinencia',
            'finanzas',
        ]; 
        
        return view('livewire.pestanias');
    }
}
