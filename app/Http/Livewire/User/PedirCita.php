<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;
use DateTime;

class PedirCita extends Component
{
    public Cita $cita;
    public Tratamientos $tratamientos;
    public $selectedClass = null;
    public $section = null;

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

    public function mount( ){
        $timepo = $this->selectedClass;
        $from = date('Y-m-d h:i:s');
        $interval = null;
        $to = new DateTime( $from);
        date_add($to , date_interval_create_from_date_string('3 days'));

        $citaConsulta = Cita::whereBetween('start', [$from, $to ])->get();
                        // ->orWhere('end','<', 'now() + INTERVAL 1 DAY')
                        // ->paginate();

        foreach($citaConsulta as $cita){
            $inicio = DateTime::createFromFormat('Y-m-d h:i:s', $cita->start);

            $fin = DateTime::createFromFormat('Y-m-d h:i:s', $cita->end);
            $interval = $inicio->diff($fin);
            //  $this->interval = $interval->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
            $this->interval = $timepo;



        }
        // $this->citaConsulta = date_format($fecha, 'Y-m-d h:i:s');
    }
    // public function mout(){
    //      $this->fechaActual = date('d-m-Y');
    // }
 }
