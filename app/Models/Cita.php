<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules=[

        'servicio'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['servicio','start','end'];
}
