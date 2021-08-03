<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InyectableMedicamento extends Model
{
    //use HasFactory;
    protected $table='inyectable_medicamento';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        
    ];

    protected $guarded =[

    ];
}
