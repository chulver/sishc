<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historiaclinica;
use App\Models\Consultamedica;
use App\Models\Signosvitales;
use App\Models\Paciente;

use App\Http\Requests\HistoriaclinicaFormRequest;

use DB;
use Carbon\Carbon;

class HistoriaclinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:historiaclinica.index')->only('index');
        $this->middleware('can:historiaclinica.create')->only('create', 'store');
        $this->middleware('can:historiaclinica.edit')->only('edit', 'update');
        $this->middleware('can:historiaclinica.completadas')->only('completadas');
    }

    public function index()
    {
        $fecha = Carbon::now('America/La_Paz');

        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as m','c.medico','=','m.id')
                    -> join('users as u','c.user_id','=','u.id')
                    -> select('c.id','c.numeroturno',DB::Raw('DATE(c.created_at) as fecha'),DB::Raw('TIME(c.created_at) as hora'),'u.name as user',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','c.estado')
                    -> wheredate('c.created_at', $fecha->toDateString())
                    //-> where('c.medico', auth()->user()->id)
                    -> get();

        return view('historiaclinica.index', compact('consultas'));
    }

    public function pendientes()
    {
        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico')
                    -> where('c.estado', '=', 2)
                    //-> where('c.medico', auth()->user()->id)
                    -> get();

        return view('historiaclinica.index', compact('consultas'));
    }

    public function create($id)
    {
        $paciente = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> select('p.apaterno','p.amaterno','p.nombre','p.sexo','p.fechanacimiento')
                    -> where('c.id','=', $id)
                    -> first();

        $signosvitales = DB::table('solicitud_consultamedica as c')
                    -> join('signosvitales as sv','c.id','=','sv.solicitud_consultamedica_id')
                    -> select('*')
                    -> where('c.id','=', $id)
                    -> first();
        
        return view('historiaclinica.create', compact('paciente', 'signosvitales'));
    }

    public function store(HistoriaclinicaFormRequest $request)
    {
        $historiaclinica = new Historiaclinica;

        $historiaclinica->user_id=auth()->user()->id;
        $historiaclinica->solicitud_consultamedica_id=$request->get('solicitud_consultamedica_id');
        $historiaclinica->edad=$request->get('edad');
        $historiaclinica->motivoconsulta=$request->get('motivoconsulta');
        $historiaclinica->enfermedadactual=$request->get('enfermedadactual');
        $historiaclinica->examenfisico=$request->get('examenfisico');
        $historiaclinica->analisisclinico=$request->get('analisisclinico');
        $historiaclinica->planaccion=$request->get('planaccion');
        $historiaclinica->estado='1';
        $fecha = Carbon::now('America/La_Paz');
        $historiaclinica->created_at=$fecha->toDateTimeString();
        $historiaclinica->updated_at=$fecha->toDateTimeString();
        $historiaclinica->save();

        //$signosvitales = Signosvitales::findOrFail($request->get('solicitud_consultamedica_id'));
        //$signosvitales->estado='2';
        //$signosvitales->update();

        Signosvitales::where('solicitud_consultamedica_id', $request->get('solicitud_consultamedica_id'))->update(['estado' => '2']);

        $consulta = Consultamedica::findOrFail($request->get('solicitud_consultamedica_id'));
        $consulta->estado='3';
        $consulta->update();

        return redirect()->route('historiaclinica.index')->with('info', 'Historia Clinica guardado con exito');
    }

    public function edit($id)
    {
        $historiaclinica = DB::table('historiaclinica as hc')
                    -> join('solicitud_consultamedica as c','hc.solicitud_consultamedica_id','=','c.id')
                    -> join('signosvitales as sv','c.id','=','sv.solicitud_consultamedica_id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> select('hc.id as cod','hc.motivoconsulta','hc.enfermedadactual','hc.examenfisico','hc.analisisclinico','hc.planaccion','p.*','sv.*')
                    //-> where('hc.id', '=', $id)
                    -> where('c.id', '=', $id)
                    -> first();

        return view('historiaclinica.edit',compact('historiaclinica'));
    }

    public function update(HistoriaclinicaFormRequest $request, $id)
    {
        $historiaclinica = Historiaclinica::findOrFail($id);

        $historiaclinica->motivoconsulta=$request->get('motivoconsulta');
        $historiaclinica->enfermedadactual=$request->get('enfermedadactual');
        $historiaclinica->examenfisico=$request->get('examenfisico');
        $historiaclinica->analisisclinico=$request->get('analisisclinico');
        $historiaclinica->planaccion=$request->get('planaccion');
        $historiaclinica->estado='2';
        $fecha = Carbon::now('America/La_Paz');
        $historiaclinica->updated_at=$fecha->toDateTimeString();
        $historiaclinica->update();

        return redirect()->route('historiaclinica.index')->with('info', 'Historia Clinica Actualizado con exito');
    }

    public function completadas()
    {
        $completadas = DB::table('historiaclinica as hc')
                    -> join('solicitud_consultamedica as c','hc.solicitud_consultamedica_id','=','c.id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('hc.id','hc.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','hc.estado')
                    -> where('hc.estado', '=', 1)
                    -> orwhere('hc.estado', '=', 2)
                    //-> where('c.medico', auth()->user()->id)
                    -> get();
        return view('historiaclinica.completadas',compact('completadas'));
    }

    /*public function PDFHistoriaclinica($id){
        $historiaclinica = DB::table('historiaclinica as hc')
                    -> join('solicitud_consultamedica as c','hc.solicitud_consultamedica_id','=','c.id')
                    -> join('signosvitales as sv','c.id','=','sv.solicitud_consultamedica_id')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> select('hc.id as cod','hc.created_at as fecha','hc.motivoconsulta', 'hc.examenfisico','hc.analisisclinico','hc.planaccion','p.*','sv.*')
                    -> where('hc.id', '=', $id)
                    -> first();
        return view('prueba', compact('historiaclinica'));
    }*/
}
