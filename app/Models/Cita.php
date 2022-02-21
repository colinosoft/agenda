<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules=[

        'title'=>'required',
        'servicio'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['title','servicio','start','end'];
}
