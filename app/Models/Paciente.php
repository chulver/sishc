<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //use HasFactory;
    protected $table='paciente';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'ci',
        'apaterno',
        'amaterno',
        'nombre',
        'sexo',
    	'fechanacimiento',
    	'domicilio',
        'telefonodomicilio',
        'telefonocelular',
        'email'
    ];

    protected $guarded =[

    ];
}
