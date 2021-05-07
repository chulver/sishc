<?php

namespace App\Http\Livewire\Paciente;

use Livewire\Component;

class CreatePaciente extends Component
{
    public $open = false;

    public function render()
    {
        return view('livewire.paciente.create-paciente');
    }
}
