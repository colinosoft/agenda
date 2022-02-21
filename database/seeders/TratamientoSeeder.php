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
        for ($i = 0; $i <  10; $i++){
            $tratamientos = new Tratamientos();
            $tratamientos->nombreTratamiento = "Tratamientos-$i";
            $tratamientos->duracion = "$i";
            $tratamientos->cabina = "$i";
            $tratamientos->save();

        }
    }
}
