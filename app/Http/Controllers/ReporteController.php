<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function reporteventas()
    {
        return view('reportes.reporteventas');
    }

    public function resultado(Request $request)
    {
        $request->validate([
            'fechainicial' => 'required',
            'fechafinal' => 'required'
        ]);

        $fechainicial = $request->fechainicial;
        $fechafinal = $request->fechafinal;

        $fechai = $fechainicial.' 00:00:00';
        $fechaf = $fechafinal.' 23:59:59';

        //$ventas = Consultamedica::whereBetween('created_at', [$fechainicial, $fechafinal])->get();
        $ventas = DB::table('solicitud_consultamedica as scm')
                    ->join('serviciomedico as sm', 'scm.serviciomedico_id', '=', 'sm.id')
                    ->join('paciente as p', 'scm.paciente_id', '=', 'p.id')
                    ->select('scm.id',DB::Raw('DATE_FORMAT(DATE(scm.created_at), "%d/%m/%Y") as fecha'), 'sm.serviciomedico',DB::raw('CONCAT(IFNULL(apaterno,"")," ",IFNULL(amaterno,"")," ",nombre) as paciente'),'scm.precio')
                    ->whereBetween('scm.created_at', [$fechai, $fechaf])
                    ->groupBy('scm.created_at')
                    ->get();

        //dd($ventas);

        return view('reportes.reporteventas', compact('ventas', 'fechainicial', 'fechafinal'));
    }
}
