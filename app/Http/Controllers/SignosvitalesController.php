<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signosvitales;
use App\Models\Consultamedica;

use DB;
use Carbon\Carbon;

class SignosvitalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','name as medico')
                    -> where('c.estado', '=', 1)
                    -> get();

        return view('signosvitales.index', compact('consultas'));
    }

    public function create($id)
    {
        $consulta = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.paciente_id', DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'), 'sexo','c.serviciomedico_id','s.serviciomedico','name as medico', 'p.fechanacimiento')
                    -> where('c.id', '=', $id)
                    -> first();
        
        return view('signosvitales.create', compact('consulta'));
    }

    public function store(Request $request)
    {
        $signosvitales = new Signosvitales;
        $signosvitales->solicitud_consultamedica_id=$request->get('solicitud_consultamedica_id');
        $signosvitales->edad=$request->get('edad');
        $signosvitales->peso=$request->get('peso');
        $signosvitales->talla=$request->get('talla');
        $signosvitales->temperatura=$request->get('temperatura');
        $signosvitales->pasistolica=$request->get('pasistolica');
        $signosvitales->padiastolica=$request->get('padiastolica');
        $signosvitales->fcardiaca=$request->get('fcardiaca');
    	$signosvitales->frespiratoria=$request->get('frespiratoria');
        $signosvitales->estado='1';
        $signosvitales->created_at=NOW();
        $signosvitales->save();

        $consulta = Consultamedica::findOrFail($request->get('solicitud_consultamedica_id'));
        $consulta->estado='2';
        $consulta->update();

        return redirect()->route('signosvitales.index');
    }

    public function completadas()
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('sv.id','sv.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','medico','sv.estado','name as medico')
                    -> where('sv.estado', '=', 1)
                    -> orwhere('sv.estado', '=', 2)
                    -> get();

        return view('signosvitales.completadas', compact('signosvitales'));
    }

    public function edit($id)
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('*')
                    -> where('sv.id', '=', $id)
                    -> first();

        return view('signosvitales.edit',compact('signosvitales'));
    }

    public function update(Request $request, $id)
    {
        $signosvitales = Signosvitales::findOrFail($id);

        $signosvitales->peso=$request->get('peso');
        $signosvitales->talla=$request->get('talla');
        $signosvitales->pasistolica=$request->get('pasistolica');
        $signosvitales->padiastolica=$request->get('padiastolica');
        $signosvitales->fcardiaca=$request->get('fcardiaca');
    	$signosvitales->frespiratoria=$request->get('frespiratoria');
        $signosvitales->temperatura=$request->get('temperatura');
        $signosvitales->fum=$request->get('fum');
        $signosvitales->observaciones='';
        $signosvitales->updated_at=NOW();
        $signosvitales->update();

        return redirect()->route('signosvitales.completadas');
    }

    public function show($id)
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('*')
                    -> where('sv.id', '=', $id)
                    -> first();

        return view('signosvitales.show',compact('signosvitales'));
    }
}
