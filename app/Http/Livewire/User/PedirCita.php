<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;

class PedirCita extends Component
{
    public Cita $cita;
    public Tratamientos $tratamientos;
    public $selectedClass = null;
    public $section = null;
    public $fechaActual = null;
    public $citaConsulta = null;

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
    public function mount(){
        $from = date('2022-05-01');
        $to = date('2022-05-20');

        $this->citaConsulta = Cita::whereBetween('start', [$from, $to ])->get();
                        // ->orWhere('end','<', 'now() + INTERVAL 1 DAY')
                        // ->paginate();

    }
    // public function mout(){
    //      $this->fechaActual = date('d-m-Y');
    // }
 }
