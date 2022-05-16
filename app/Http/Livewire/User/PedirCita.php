<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;
use DateTime;
use DateInterval;

class PedirCita extends Component
{

    public Cita $cita;
    public Tratamientos $tratamientos;
    public $selectedClass = null;
    public $section = [];
    public $suma = 1;
    public $showDiv;



    protected $rules = [
        'interval' =>  ['requiered']
    ];

    public function render()
    {
        $citas = Cita::all();
        $tratamiento = Tratamientos::all();

        return view('livewire.user.pedir-cita', compact('citas', 'tratamiento'));
    }

    public function show()
    {

        $this->showDiv = false;
    }

    function calculateMinutes(DateInterval $int){
        $days = $int->format('%a');
        return ($days * 24 * 60) + ($int->h * 60) + $int->i;
    }


    public function updatedSelectedClass($duracion)
    {

        setlocale(LC_ALL, 'esn');


        $from = date('Y-m-d h:i:s');
        $to = new DateTime($from);
        date_add($to, date_interval_create_from_date_string('3 days'));

        $citaConsulta = Cita::whereBetween('start', [$from, $to])->get();
        // ->orWhere('end','<', 'now() + INTERVAL 1 DAY')
        // ->paginate();

        // foreach ($citaConsulta as $index=>$cita) {
        //     $inicio = DateTime::createFromFormat('Y-m-d h:i:s', $cita->start);

        //     $fin = DateTime::createFromFormat('Y-m-d h:i:s', $cita->end);
        //     // $interval = $inicio->diff($fin);
        //     // $this->section = $interval->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
        //     array_push($interval, $inicio->diff($fin));
        //     $this->section = $index;

        // }
        $listaEspacioLibres = [];
        for ($i = 0; $i < count($citaConsulta); $i++ ) {

            if( (count($citaConsulta) -1) !== $i){
                $fin = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i]->end);

                $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i+1]->start);

                // $interval = $inicio->diff($fin);
                // $this->section = $interval->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
                // $interval =  $inicio->diff($fin);
                // $min = PedirCita::calculateMinutes($interval);

                // $this->listaEspacioLibres[] = $inicio->format('Y-m-d H:i:s');

                $diferenciaMin = abs(($inicio->getTimestamp()) - ($fin->getTimestamp())) / 60;
                //Hay espacio para la cita
                if($diferenciaMin >= $duracion){

                    // $listaEspacioLibres[] =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());
                $listaEspacioLibres[] = $fin->format('Y-m-d H:i:s');
                //No hay espacio para la cita
                }else {
                     $this->section = "No quedan espacios para las citas";
                }
            }
        }
        // dd($listaEspacioLibres);
        $this->section = $listaEspacioLibres ;
    }

}
