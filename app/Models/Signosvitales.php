<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signosvitales extends Model
{
    //use HasFactory;
    protected $table='signosvitales';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'user_id',
        'solicitud_consultamedica_id',
    	'peso',
        'talla',
        'pasistolica',
        'padiastolica',
        'fcardiaca',
    	'frespiratoria',
    	'temperatuta',
        'fum',
        'observaciones',
        'estado',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
