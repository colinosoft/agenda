<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Tratamientos;
use Livewire\WithPagination;

class TratamientosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $listeners = ['tratamientoUpdate' =>'render', 'delete'];


    public $search;

    public function updatingSearch(){

        $this->resetPage();
        // Prueba

    }

    public function render()
    {
        $tratamientos = Tratamientos::where('nombreTratamiento', 'LIKE' , '%'. $this->search . '%')
        ->orWhere('duracion','LIKE', '%'. $this->search . '%')
        ->paginate();

        return view('livewire.admin.tratamientos-index', compact('tratamientos'));
    }

    public function delete(Tratamientos $tratamiento){
        $tratamiento->delete();
    }
}
