<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signosvitales;
use App\Models\Consultamedica;

use App\Http\Requests\SignosvitalesFormRequest;

use DB;
use Carbon\Carbon;

class SignosvitalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:signosvitales.index')->only('index');
        $this->middleware('can:signosvitales.create')->only('create', 'store');
        $this->middleware('can:signosvitales.edit')->only('edit', 'update');
        $this->middleware('can:signosvitales.completadas')->only('completadas');
        $this->middleware('can:signosvitales.show')->only('show');
    }

    public function index()
    {
        $fecha = Carbon::now('America/La_Paz');

        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as m','c.medico','=','m.id')
                    -> join('users as u','c.user_id','=','u.id')
                    -> select('c.id','c.numeroturno',DB::Raw('DATE(c.created_at) as fecha'),DB::Raw('TIME(c.created_at) as hora'),'u.name as user',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','m.name as medico','c.estado')
                    -> wheredate('c.created_at', $fecha->toDateString())
                    -> whereIn('c.estado', [1, 2, 3])
                    -> get();

        return view('signosvitales.index', compact('consultas'));
    }

    public function create($id)
    {
        $consulta = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.paciente_id','p.apaterno','p.amaterno','nombre','sexo','c.serviciomedico_id','s.serviciomedico','name as medico', 'p.fechanacimiento')
                    -> where('c.id', '=', $id)
                    -> first();
        
        return view('signosvitales.create', compact('consulta'));
    }

    public function store(SignosvitalesFormRequest $request)
    {
        $signosvitales = new Signosvitales;

        $signosvitales->user_id=auth()->user()->id;
        $signosvitales->solicitud_consultamedica_id=$request->get('solicitud_consultamedica_id');
        $signosvitales->anios=$request->get('anios');
        $signosvitales->meses=$request->get('meses');
        $signosvitales->dias=$request->get('dias');
        $signosvitales->peso=$request->get('peso');
        $signosvitales->talla=$request->get('talla');
        $signosvitales->temperatura=$request->get('temperatura');
        $signosvitales->presionarterial=$request->get('presionarterial');
        $signosvitales->spo2=$request->get('spo2');
        $signosvitales->fcardiaca=$request->get('fcardiaca');
    	$signosvitales->frespiratoria=$request->get('frespiratoria');
        $signosvitales->glicemia=$request->get('glicemia');
        $signosvitales->estado='1';
        $fecha = Carbon::now('America/La_Paz');
        $signosvitales->created_at=$fecha->toDateTimeString();
        $signosvitales->updated_at=$fecha->toDateTimeString();
        $signosvitales->save();

        $consulta = Consultamedica::findOrFail($request->get('solicitud_consultamedica_id'));
        $consulta->estado='2';
        $consulta->update();

        return redirect()->route('signosvitales.index')->with('info', 'Signos Vitales registrado con exito');
    }

    public function edit($id)
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('sv.id as cod','sv.anios','sv.meses','sv.dias','sv.peso','sv.talla','sv.temperatura','sv.presionarterial','sv.spo2','sv.fcardiaca','sv.frespiratoria','sv.glicemia','s.*','p.*','u.*')
                    //-> where('sv.id', '=', $id)
                    -> where('c.id', '=', $id)
                    -> first();

        return view('signosvitales.edit',compact('signosvitales'));
    }

    public function update(Request $request, $id)
    {
        $signosvitales = Signosvitales::findOrFail($id);

        $signosvitales->peso=$request->get('peso');
        $signosvitales->talla=$request->get('talla');
        $signosvitales->temperatura=$request->get('temperatura');
        $signosvitales->presionarterial=$request->get('presionarterial');
        $signosvitales->spo2=$request->get('spo2');
        $signosvitales->fcardiaca=$request->get('fcardiaca');
    	$signosvitales->frespiratoria=$request->get('frespiratoria');
        $signosvitales->glicemia=$request->get('glicemia');
        $fecha = Carbon::now('America/La_Paz');
        $signosvitales->updated_at=$fecha->toDateTimeString();
        $signosvitales->update();

        return redirect()->route('signosvitales.index')->with('info', 'Signos Vitales actualizado con exito');
    }

    public function show($id)
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('*')
                    -> where('C.id', '=', $id)
                    -> first();

        return view('signosvitales.show',compact('signosvitales'));
    }

    public function pendientes()
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

    public function completadas()
    {
        $signosvitales = DB::table('signosvitales as sv')
                    -> join('solicitud_consultamedica as c','sv.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> join('users as e','sv.user_id','=','e.id')
                    -> select('sv.id','sv.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','medico','sv.estado','u.name as medico')
                    -> where('sv.estado', '=', 1)
                    -> orwhere('sv.estado', '=', 2)
                    -> get();

        return view('signosvitales.completadas', compact('signosvitales'));
    }
}
