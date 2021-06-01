<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciomedico extends Model
{
    //use HasFactory;
    protected $table='serviciomedico';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'serviciomedico',
        'precio',
        'created_at',
        'updated_at'
    ];

    protected $guarded =[

    ];
}
