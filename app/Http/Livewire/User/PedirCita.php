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

use function PHPSTORM_META\type;

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

    public function guardarCita($nombreSeleccion, $idTratamiento)
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

        $from = date('Y-m-d 08:00:00', strtotime(date('Y-m-d 10:00:00') . "+1 days"));
        // $to = new DateTime($from);
        $to =  date('Y-m-d 20:00:00', strtotime(date('Y-m-d 20:00:00') . "+4  days"));

        $citaConsulta = Cita::whereBetween('start', [$from, $to])->orderBy('start')->get();

        $horaFechaIncio = date('Y-m-d 08:00:00', strtotime(date('Y-m-d 10:00:00') . "+1 days"));

        $horaIncio =   date_add(new DateTime('10:00:00'), date_interval_create_from_date_string('1 days '));
        $horaFinDia =   date_add(new DateTime('20:00:00'), date_interval_create_from_date_string('1 days '));


        //Si hay alguna cita calculo los huecos por delante con un maximo de 10
        if (count($citaConsulta) > 0) {

            $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[0]->start);

            $huecoMinHastaPrimeraCita = abs(($horaIncio->getTimestamp()) - ($inicio->getTimestamp())) / 60;

            //Si hay hueco inserto cita
            if ($huecoMinHastaPrimeraCita >= $this->duracion) {

                //Calculo los huecos posibles
                $horasPosibles = round($huecoMinHastaPrimeraCita / $this->duracion);

                //Asigno una que sera la primera siempre
                $listaEspacioLibres[] =  $horaIncio->format('d-m-Y H:i:s');

                //Recorro hasta el hueco lo maximo que entre
                for ($e = 1; $e < $horasPosibles; $e++) {

                    //Le añado a la lista con el espacio de tiempo correspondiente de cada tratamiento
                    $listaEspacioLibres[] =  $horaIncio->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                }
            }

            //Si no hay ninguna cita asigno 10 huecos temporales


            for ($i = 0; $i < count($citaConsulta); $i++) {

                if ((count($citaConsulta) - 1) !== $i) {

                    $fin = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i]->end);

                    $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[$i + 1]->start);


                    $diferenciaMin = abs(($inicio->getTimestamp()) - ($fin->getTimestamp())) / 60;

                    //Hay espacio para la cita
                    if ($diferenciaMin >= $this->duracion) {

                        $horasPosibles = round($diferenciaMin / $this->duracion);
                        $listaEspacioLibres[] =  $fin->format('d-m-Y H:i:s');


                        for ($e = 1; $e < $horasPosibles; $e++) {
                            // $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                            //  $addDuracion =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());
                            //  $listaEspacioLibres[] = $addDuracion;

                            $listaEspacioLibres[] =  $fin->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                        }

                        // $listaEspacioLibres[] =  strftime("%A día %d a las %H:%M",$fin->getTimestamp());


                        // //No hay espacio para la cita
                    } else {

                        $this->section = "No quedan espacios para las citas";
                    }
                }
            }
        //Sino existe ninguna cita
        } else {
            //Asigno una que sera la primera siempre
            $listaEspacioLibres[] =  $horaIncio->format('d-m-Y H:i:s');

            //Recorro hasta el hueco lo maximo que entre
            for ($e = 1; $e < 10; $e++) {

                //Le añado a la lista con el espacio de tiempo correspondiente de cada tratamiento
                $listaEspacioLibres[] =  $horaIncio->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
            }
        }
        if (count($listaEspacioLibres) < 10 && count($citaConsulta) > 0) {


            $huecoMinHastaPrimeraCita = abs(($horaIncio->getTimestamp()) - (strtotime($horaFechaIncio))) / 60;

            if ($huecoMinHastaPrimeraCita >= $this->duracion) {

                $horasPosibles = round($huecoMinHastaPrimeraCita / $this->duracion);
                $horas = 10 - count($listaEspacioLibres);
                $horafin = DateTime::createFromFormat('Y-m-d H:i:s', $citaConsulta[count($citaConsulta) - 1]->end);
                $listaEspacioLibres[] =  $horafin->format('d-m-Y H:i:s');
                for ($e = 1; $e < $horas; $e++) {

                    $listaEspacioLibres[] =  $horafin->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');
                }
            }
        }


        PedirCita::nombre($nombreTratamieto, $idTratamiento);

        //Para no pasarse de la hora
        for ($i = 0; $i < count($listaEspacioLibres); $i++) {
            // dd(strtotime($listaEspacioLibres[$i]));

            $fecha = DateTime::createFromFormat('d-m-Y H:i:s', $listaEspacioLibres[$i]);

            if ($fecha->format('Y-m-d H:i:s') > $horaFinDia->format('Y-m-d H:i:s')) {
                array_splice($listaEspacioLibres, $i);
                // $horaIncioDiaSiguiente =   date_add(new DateTime('10:00:00'), date_interval_create_from_date_string('2 days '));
                // $listaEspacioLibres[] =  $horaIncioDiaSiguiente->add(new DateInterval(('PT' . $this->duracion . 'M')))->format('d-m-Y H:i:s');

            }
        }

        $this->section = $listaEspacioLibres;
    }
}
