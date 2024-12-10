<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;


class ModalCalendarioSubvenciones extends Component
{
    public $isOpen = false;
    public $dias = [
        'Lun',
        'Mar',
        'Mié',
        'Jue',
        'Vie',
        'Sáb',
        'Dom'
    ];
    
    public $diasVacios = 4;

    public function render()
    {
        // fecha del pago: 2024 - Nov - 27 
        $currentMonth = Carbon::now()->month;
        $currentMonthDays = Carbon::now()->daysInMonth;

        $diasMes = Carbon::create(2024, 11)->daysInMonth;



        return view('livewire.modal-calendario-subvenciones', compact('diasMes'));
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
