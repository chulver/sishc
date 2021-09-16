<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Carbon\Carbon;
use DB;

class ClienteController extends Controller
{
    public function __construct()
    {

    }

    public function datatable()
    {
        $pacientes = Paciente::select('id',DB::raw('CONCAT(IFNULL(apaterno,"")," ",IFNULL(amaterno,"")," ",nombre) as paciente'),'sexo')->get();

        return datatables()->of($pacientes)->addColumn('btn','clientes/actions')->rawColumns(['btn'])->toJson();
        //return datatables()->of($pacientes)->toJson();
    }


    public function index()
    {
        return view('clientes.index');
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'fechanacimiento' => 'required'
        ]);

        $paciente = new Paciente;

        $paciente->ci=$request->get('ci');
        $paciente->apaterno=$request->get('apaterno');
        $paciente->amaterno=$request->get('amaterno');
        $paciente->nombre=$request->get('nombre');
        $paciente->fechanacimiento=$request->get('fechanacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->domicilio=$request->get('domicilio');
        $paciente->telefonodomicilio=$request->get('telefonodomicilio');
        $paciente->telefonocelular=$request->get('telefonocelular');
        $paciente->email=$request->get('email');
        $fecha = Carbon::now('America/La_Paz');
        $paciente->created_at=$fecha->toDateTimeString();
        $paciente->updated_at=$fecha->toDateTimeString();
        $paciente->save();

        //return redirect()->route('clientes.index')->with('info', 'Paciente registrado con exito');
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        //return view('clientes.edit')->with('paciente',$paciente);
        return response()->json($paciente);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'fechanacimiento' => 'required'
        ]);

        $paciente = Paciente::findOrFail($id);

        $paciente->ci=$request->get('ci');
        $paciente->apaterno=$request->get('apaterno');
        $paciente->amaterno=$request->get('amaterno');
        $paciente->nombre=$request->get('nombre');
        $paciente->fechanacimiento=$request->get('fechanacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->domicilio=$request->get('domicilio');
        $paciente->telefonodomicilio=$request->get('telefonodomicilio');
        $paciente->telefonocelular=$request->get('telefonocelular');
        $paciente->email=$request->get('email');
        $fecha = Carbon::now('America/La_Paz');
        $paciente->updated_at=$fecha->toDateTimeString();
        $paciente->update();

        //return redirect()->route('pacientes.index')->with('info', 'Paciente actualizado con exito');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        //return view('pacientes.show')->with('paciente',$paciente);
        return response()->json($paciente);
    }
}
