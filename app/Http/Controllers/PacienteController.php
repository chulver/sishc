<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

use App\Http\Requests\PacienteFormRequest;

use Carbon\Carbon;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index')->with('pacientes',$pacientes);
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(PacienteFormRequest $request)
    {
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

        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show')->with('paciente',$paciente);
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit')->with('paciente',$paciente);
    }

    public function update(PacienteFormRequest $request, $id)
    {
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

        return redirect()->route('pacientes.index');
    }
}
