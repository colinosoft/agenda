<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class VerCita extends Component
{
    public function render()
    {

        $citas = DB::table('citas')
            ->join('tratamientos', 'citas.id_tratamiento', '=', 'tratamientos.id')
            ->where('citas.id_user', '=', Auth::user()->id)
            ->select('citas.title', 'citas.start', 'tratamientos.duracion')
            ->get();

        return view('livewire.user.ver-cita', compact('citas'));
    }

}
