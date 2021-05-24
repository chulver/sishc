<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numeroturno extends Model
{
    //use HasFactory;
    protected $table='numeroturno';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'fecha',
        'numeroturno'
    ];

    protected $guarded =[

    ];
}
