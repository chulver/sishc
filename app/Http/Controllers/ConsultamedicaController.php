<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultamedica;
use App\Models\Numeroturno;

use App\Http\Requests\ConsultamedicaFormRequest;

use DB;
use Carbon\Carbon;

class ConsultamedicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:consultas.index')->only('index');
        //$this->middleware('can:consultas.create')->only('create', 'store');
        //$this->middleware('can:consultas.edit')->only('edit', 'update');
        //$this->middleware('can:consultas.destroy')->only('destroy');
        //$this->middleware('can:consultas.fichas')->only('fichas');
    }

    public function index()
    {
        $fecha = Carbon::now('America/La_Paz');
        
        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.numeroturno',DB::Raw('DATE(c.created_at) as fecha'),DB::Raw('TIME(c.created_at) as hora'),DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','name as medico','c.estado')
                    //-> where('c.estado', '=', 1)
                    -> wheredate('c.created_at', $fecha->toDateString())
                    -> get();

        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $fecha = Carbon::now('America/La_Paz');

        $pacientes = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->get();
        $servicios = DB::table('serviciomedico')->get();
        //$users = DB::table('users')->get();
        $medicos = DB::table('model_has_roles')
                -> join('users as u','model_id','=','u.id') 
                -> select('u.id','u.name')
                -> where('model_id', '=', 2)       
                -> get();
        
        $numeroturno = DB::table('numeroturno')->wheredate('fecha',$fecha->toDateString())->first();

        if(!$numeroturno) {
            $numeroturno =  new Numeroturno;
            $numeroturno->fecha=$fecha->toDateString();
            $numeroturno->numeroturno=1;
            $numeroturno->save();
        }

        return view('consultas.create', compact('pacientes','servicios','medicos','numeroturno'));
    }

    public function store(Request $request)
    {
        $fecha = Carbon::now('America/La_Paz');

        $consulta = new Consultamedica;

        $consulta->user_id=auth()->user()->id;
        $consulta->numeroturno=$request->get('numeroturno');
        $consulta->paciente_id=$request->get('paciente');
        $consulta->serviciomedico_id=$request->get('serviciomedico');
        $consulta->medico=$request->get('medico');
        $consulta->estado='1';
        $fecha = Carbon::now('America/La_Paz');
        $consulta->created_at=$fecha->toDateTimeString();
        $consulta->updated_at=$fecha->toDateTimeString();
        $consulta->save();

        Numeroturno::where('fecha',$fecha->toDateString())->increment('numeroturno');

        return redirect()->route('consultas.index')->with('info', 'Venta registrado con exito');
    }

    public function edit($id)
    {
        $consulta = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.paciente_id', DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'c.serviciomedico_id','s.serviciomedico','c.medico','u.name')
                    -> where('c.id', '=', $id)
                    -> first();
        $pacientes = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->get();
        $servicios = DB::table('serviciomedico')->get();
        //$users = DB::table('users')->get();
        $medicos = DB::table('model_has_roles')
                -> join('users as u','model_id','=','u.id') 
                -> select('u.id','u.name')
                -> where('model_id', '=', 2)       
                -> get();
        
        return view('consultas.edit', compact('consulta','pacientes','servicios','medicos'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consultamedica::findOrFail($id);

        $consulta->paciente_id=$request->get('paciente');
        $consulta->serviciomedico_id=$request->get('serviciomedico');
        $consulta->medico=$request->get('medico');
        $fecha = Carbon::now('America/La_Paz');
        $consulta->updated_at=$fecha->toDateTimeString();
        $consulta->update();

        return redirect()->route('consultas.index')->with('info', 'Venta actualizada con exito');
    }

    public function show($id)
    {
        $consulta = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select(DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','u.name')
                    -> where('c.id', '=', $id)
                    -> first();
        
        return view('consultas.show', compact('consulta'));
    }

    public function destroy($id)
    {
        $consulta = Consultamedica::find($id);
        $consulta->estado='0';
        $consulta->update();

        return redirect()->route('consultas.index')->with('info', 'Venta eliminada con exito');
    }

    public function fichas()
    {
        $consultas = DB::table('solicitud_consultamedica as c')
                    -> join('paciente as p','c.paciente_id','=','p.id')
                    -> join('serviciomedico as s','c.serviciomedico_id','=','s.id')
                    -> join('users as u','c.medico','=','u.id')
                    -> select('c.id','c.created_at as fecha',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'),'s.serviciomedico','name as medico', 'c.estado')
                    -> get();

        return view('consultas.fichas', compact('consultas'));
    }
}
