<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tratamientos;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Cejas";
            $tratamientos->duracion = "15";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Uñas";
            $tratamientos->duracion = "15";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Depilación";
            $tratamientos->duracion = "30";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Rayos uva";
            $tratamientos->duracion = "30";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Maquillaje boda";
            $tratamientos->duracion = "60";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Microblaiding";
            $tratamientos->duracion = "45";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Cuidado de la piel";
            $tratamientos->duracion = "45";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Adulación";
            $tratamientos->duracion = "60";
            $tratamientos->cabina = "1";
            $tratamientos->save();

            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Manicura";
            $tratamientos->duracion = "30";
            $tratamientos->cabina = "1";
            $tratamientos->save();

    }
}
