<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiaclinica extends Model
{
    //use HasFactory;
    protected $table='historiaclinica';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'user_id',
        'solicitud_consultamedica_id',
    	'motivoconsulta',
        'enfermedadactual',
        'examenfisico',
        'analisisclinico',
        'planaccion',
        'estado',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
