<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tratamientos;

class Cita extends Model
{
    use HasFactory;

    public static $rules=[
        'title'=>'required',
        'servicio'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['title','servicio','start','end'];

    public function user(){

        return $this->belongsToMany(User::class)->withTimestamps();

    }
    public function tratamiento(){

        return $this->belongsToMany(Tratamientos::class)->withTimestamps();

    }
}
