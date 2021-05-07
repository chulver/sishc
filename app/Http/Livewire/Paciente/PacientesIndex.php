<?php

namespace App\Http\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

use Livewire\WithPagination;

class PacientesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $pacientes = Paciente::where('nombre', 'LIKE', '%' . $this->search . '%')->paginate();
        
        return view('livewire.paciente.pacientes-index', compact('pacientes'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }
}
