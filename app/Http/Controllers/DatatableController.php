<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;

use DB;

class DatatableController extends Controller
{
    public function paciente()
    {
        $pacientes = Paciente::select('id',DB::raw('CONCAT(apaterno," ",amaterno," ",nombre) as paciente'),'sexo')->get();

        return datatables()->of($pacientes)->addColumn('btn','actions')->rawColumns(['btn'])->toJson();
        //return datatables()->of($pacientes)->toJson();
    }

}
