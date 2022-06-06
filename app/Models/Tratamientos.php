<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Tratamientos extends Model
{
    use HasFactory;

    static $rules=[
        'nombreTratamiento'=>'required',
        'duracion'=>'required',
        'cabina'=>'required'
    ];

    protected $fillable=['nombreTratamiento','duracion','cabina'];

    // public function cita(){
    //     return $this->hasMany(Cita::class);
    // }

    public function cita(){

        return $this->belongsToMany(Cita::class)->withTimestamps();

    }
}
