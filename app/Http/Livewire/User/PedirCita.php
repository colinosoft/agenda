<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;
use DateTime;
use DateInterval;
use IntlDateFormatter;

class PedirCita extends Component
{

    public Cita $cita;
    public Tratamientos $tratamientos;
    public $selectedClass = null;
    public $section = [];
    public $intervalClass = null;
    public $fechaseleccion = null;
    public $suma = 1;
    public $showDiv;


    protected $listeners = ['horaReserva'];

    public function horaReserva($hora)
    {
        // dd($this->tratamientos);
        $this->fechaseleccion = $hora;
    }

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
    public function updatingintervalClass($fecha){

        $this->fechaseleccion = $fecha;
    }

    public function updatedSelectedClass($duracion)
    {

        setlocale(LC_ALL, 'esn');


        $from = date_add(new DateTime(),date_interval_create_from_date_string('1 days'));
        // $to = new DateTime($from);
        $to = date_add(new DateTime(), date_interval_create_from_date_string('4 days'));

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
        for ($i = 0; $i < count($citaConsulta); $i++) {

            if ((count($citaConsulta) - 1) !== $i) {
                $fin = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i]->end);

                $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i + 1]->start);

                // $interval = $inicio->diff($fin);
                // $this->section = $interval->format('%r%y years, %m months, %d days, %h hours, %i minutes, %s seconds');
                // $interval =  $inicio->diff($fin);
                // $min = PedirCita::calculateMinutes($interval);

                // $this->listaEspacioLibres[] = $inicio->format('Y-m-d H:i:s');

                $diferenciaMin = abs(($inicio->getTimestamp()) - ($fin->getTimestamp())) / 60;
                //Hay espacio para la cita
                if ($diferenciaMin >= $duracion) {

                    $horasPosibles = round($diferenciaMin / $duracion);

                    $listaEspacioLibres[] =  $fin->format('d-m-Y H:i:s');

                    // if($horasPosibles > 1){
                    // $listaEspacioLibres[] = $citaConsulta[$i]->end;
                    for ($e = 1; $e < $horasPosibles; $e++) {
                        // $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        //  $addDuracion =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());
                        //  $listaEspacioLibres[] = $addDuracion;

                        $listaEspacioLibres[] =  $fin->add(new DateInterval(('PT' . $duracion . 'M')))->format('d-m-Y H:i:s');
                    }

                    // }else {
                    //     // $listaEspacioLibres[] = $citaConsulta[$i]->end;
                    //     // $listaEspacioLibres[] = $horasPosibles;
                    // }


                    // $listaEspacioLibres[] =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());


                    // //No hay espacio para la cita
                } else {

                    $this->section = "No quedan espacios para las citas";
                }
            }
        }

        // dd($listaEspacioLibres);
        $this->section = $listaEspacioLibres;
    }
}
