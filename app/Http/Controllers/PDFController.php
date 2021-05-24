<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream();
    }

    public function PDFHistoriaclinica($id){
        $historiaclinica = DB::table('solicitud_consultamedica as c')
                    -> join('historiaclinica as hc','c.id','=','hc.solicitud_consultamedica_id')
                    -> join('signosvitales as sv','c.id','=','sv.solicitud_consultamedica_id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> select('hc.id as cod','hc.created_at as fecha','hc.motivoconsulta','hc.enfermedadactual','hc.examenfisico','hc.analisisclinico','hc.planaccion','p.*','sv.*')
                    -> where('c.id', '=', $id)
                    -> first();

        $pdf = PDF::loadView('prueba', compact('historiaclinica'));
        return $pdf->stream();
    }
}
