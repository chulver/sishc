<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;
use App\Models\Historiaclinica;

use DB;

class DatatableController extends Controller
{
    public function paciente()
    {
        $pacientes = Paciente::select('id',DB::raw('CONCAT(apaterno," ",amaterno," ",nombre) as paciente'),'sexo')->get();

        return datatables()->of($pacientes)->addColumn('btn','pacientes/actions')->rawColumns(['btn'])->toJson();
        //return datatables()->of($pacientes)->toJson();
    }

    public function historias()
    {
        //$historiasclinicas = Historiaclinica::select('id',DB::raw('CONCAT(apaterno," ",amaterno," ",nombre) as paciente'),'sexo')->get();
        $completadas = DB::table('paciente as p')
                    -> join('solicitud_consultamedica as c','p.id','=','c.paciente_id')
                    -> join('historiaclinica as hc','c.id','=','hc.solicitud_consultamedica_id')
                    -> select('p.id', DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'p.sexo')
                    //-> select('p.id',DB::raw("count(p.id) as user_count"), DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'p.sexo')
                    -> where('hc.estado','2')
                    //-> groupBy('p.id');
                    -> get();

        return datatables()->of($completadas)->addColumn('btn','historiaclinica/actions')->rawColumns(['btn'])->toJson();
        //return datatables()->of($pacientes)->toJson();
    }
}
