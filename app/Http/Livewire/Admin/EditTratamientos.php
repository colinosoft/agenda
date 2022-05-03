<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tratamientos;
use LivewireUI\Modal\ModalComponent;

class EditTratamientos extends ModalComponent
{

    public $title = "Editar tratamientos";
    public Tratamientos  $tratamiento;

    protected $rules = [
        'tratamiento.nombreTratamiento' =>  ['requiered'],
        'tratamiento.duracion' => ['requiered','integer'],
        'tratamiento.cabina' => ['requiered','integer'],
    ];

    public function mount(Tratamientos $tratamiento){
        $this->tratamiento = $tratamiento;
    }


    public function render()
    {
        return view('livewire.admin.edit-tratamientos');
    }

    public function update()
    {
        // $this->validate();

        $this->tratamiento->save();

        $this->closeModalWithEvents([
            TratamientosIndex::getName() => 'tratamientoUpdate',
        ]);
    }


}
