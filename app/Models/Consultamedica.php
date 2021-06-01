<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultamedica extends Model
{
    //use HasFactory;
    protected $table='solicitud_consultamedica';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'user_id',
        'numeroturno',
        'paciente_id',
        'serviciomedico_id',
        'precio',
    	'medico',
    	'estado',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
