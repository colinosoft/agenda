<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Tratamientos;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DateTime;
use DateInterval;
use DB;

class PedirCita extends Component
{

    public Cita $cita;
    public Tratamientos $tratamientos;
    public $selectedClass = null;
    public $section = [];
    public $intervalClass = null;
    public $fechaseleccion = null;
    public $duracion = null;
    public $nombreTratamieto;
    public $nombreSeleccion;


    protected $listeners = ['horaReserva', 'guardarCita'];


    public function horaReserva($hora)
    {

        $this->fechaseleccion = $hora;
    }
    public function nombre($nombre, $idTratamiento)
    {
        $this->nombreSeleccion = $nombre;
        $this->idTratamiento = $idTratamiento;
    }

    public function guardarCita($nombreSeleccion,$idTratamiento)
    {

        $fechaIncio =  DateTime::createFromFormat('d-m-Y H:i:s', $this->fechaseleccion);
        $fechaFin = DateTime::createFromFormat('d-m-Y H:i:s', $this->fechaseleccion);

        $insert = DB::table('citas')->insert([
            'title' => $nombreSeleccion,
            'id_user' => Auth::user()->id,
            'id_tratamiento' => $idTratamiento,
            'servicio' => $nombreSeleccion,
            'start' => $fechaIncio->format('Y-m-d H:i:s'),
            'end' => $fechaFin->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('Y-m-d H:i:s'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        return redirect(route('cita'));
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

    public function updatedSelectedClass($mensaje)
    {

        $mensaje = explode(",", $mensaje);
        $this->duracion = $mensaje[0];
        $idTratamiento = $mensaje[1];
        $nombreTratamieto = $mensaje[2];
        setlocale(LC_ALL, 'esn');
        $listaEspacioLibres = [];
        $listaFinal= [];

        $from = date_add(new DateTime(), date_interval_create_from_date_string('1 days'));
        // $to = new DateTime($from);
        $to = date_add(new DateTime(), date_interval_create_from_date_string('4 days'));

        $citaConsulta = Cita::whereBetween('start', [$from, $to])->orderBy('start')->get();

        $horaFechaIncio = date('Y-m-d 08:00:00', strtotime(date('Y-m-d 10:00:00') . "+1 days"));
        $horaFechaFin = date('Y-m-d 20:00:00', strtotime(date('Y-m-d 20:00:00') . "+4  days"));
        $horaIncio =   date_add(new DateTime('10:00:00'), date_interval_create_from_date_string('1 days '));
        $horaPrueba =   date_add(new DateTime('20:00:00'), date_interval_create_from_date_string('1 days '));

        //Si hay alguna cita calculo los huecos por delante con un maximo de 10
        if (count($citaConsulta) > 0) {

            $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[0]->start);
            $diferenciaMin1 = abs(($horaIncio->getTimestamp()) - ($inicio->getTimestamp())) / 60;

            if ($diferenciaMin1 >= $this->duracion) {

                $horasPosibles = round($diferenciaMin1 / $this->duracion);

                for ($e = 0; $e <= 10; $e++) {

                    $listaEspacioLibres[] =  $horaIncio->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                }
            }
        //Si no hay ninguna cita asigno 10 huecos temporales
        }else {


            $diferenciaMin1 = abs(($horaIncio->getTimestamp()) - (strtotime($horaFechaIncio))) / 60;

            if ($diferenciaMin1 >= $this->duracion) {

                $horasPosibles = round($diferenciaMin1 / $this->duracion);

                for ($e = 0; $e <= 10; $e++) {

                    $listaEspacioLibres[] =  $horaIncio->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                }
            }
        }

        // dd($citaConsulta);
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
                    if ($diferenciaMin >= $this->duracion) {

                        $horasPosibles = round($diferenciaMin / $this->duracion);
                        $listaEspacioLibres[] =  $fin->format('d-m-Y H:i:s');

                        // if($horasPosibles > 1){
                        // $listaEspacioLibres[] = $citaConsulta[$i]->end;
                        for ($e = 1; $e < $horasPosibles; $e++) {
                            // $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                            //  $addDuracion =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());
                            //  $listaEspacioLibres[] = $addDuracion;

                            $listaEspacioLibres[] =  $fin->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                        }

                        // if($horasPosibles <= 10){

                        //     for($c = 0; $c < (10 - $horasPosibles); $c++){
                        //         $listaEspacioLibres[] =  $fin->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                        //     }
                        // }

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


        PedirCita::nombre($nombreTratamieto, $idTratamiento);

        if(!empty($listaEspacioLibres)){
            for($i = 0; $i < 10; $i++){
                $listaFinal[] =  $listaEspacioLibres[$i];
            }
        }
        $this->section = $listaFinal;
    }
}
