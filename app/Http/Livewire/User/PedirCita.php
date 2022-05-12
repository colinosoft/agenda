<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;

class PedirCita extends Component
{
    public Cita $cita;
    public Tratamientos $tratamientos;


    public $showDiv;

    public function render()
    {
        $citas = Cita::all();
        $tratamiento = Tratamientos::all();

        return view('livewire.user.pedir-cita', compact('citas','tratamiento'));
    }
    public function show(){
       $this->showDiv = false;
    }
 }
