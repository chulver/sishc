<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultamedica;
use DB;

class ConsultamedicaController extends Controller
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

        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes = DB::table('paciente as p')
                    ->select('p.id',DB::raw('CONCAT(p.apaterno," ",p.amaterno," ",nombre) as paciente'))
                    ->get();
        $servicios = DB::table('serviciomedico')->get();
        $users = DB::table('users')->get();

        return view('consultas.create', compact('pacientes','servicios','users'));
    }

    public function store(Request $request)
    {
        $consulta = new Consultamedica;

        $consulta->paciente_id=$request->get('paciente');
        $consulta->serviciomedico_id=$request->get('serviciomedico');
        $consulta->medico=$request->get('medico');
        $consulta->estado='1';
        $consulta->created_at=NOW();

        $consulta->save();

        return redirect()->route('consultas.index');
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
        $users = DB::table('users')->get();
        
        return view('consultas.edit', compact('consulta','pacientes','servicios','users'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consultamedica::findOrFail($id);

        $consulta->paciente_id=$request->get('paciente');
        $consulta->serviciomedico_id=$request->get('serviciomedico');
        $consulta->medico=$request->get('medico');
        $consulta->updated_at=NOW();

        $consulta->update();

        return redirect()->route('consultas.index');
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

    public function destroy($id)
    {
        $consulta = Consultamedica::find($id);
        $consulta->estado='0';
        $consulta->update();

        return redirect()->route('consultas.index');
    }
}
