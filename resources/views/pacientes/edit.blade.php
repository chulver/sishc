@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
   <h1>Editar Paciente</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">                    
                <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="ci">CI</label>
                        <input type="number" name="ci" class="form-control" value="{{ $paciente->ci}}">
                    </div>
                    <div class="form-group">
                        <label for="apaterno">Apellido paterno</label>
                        <input type="text" name="apaterno" class="form-control" value="{{ $paciente->apaterno}}">
                    </div>
                    <div class="form-group">
                        <label for="amaterno">Apellido materno</label>
                        <input type="text" name="amaterno" class="form-control" value="{{ $paciente->amaterno}}">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" class="form-control">
                            <option></option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fechanacimiento">Fecha nacimiento</label>
                        <input type="date" name="fechanacimiento" class="form-control" value="{{ $paciente->fechanacimiento}}">
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <textarea name="domicilio" class="form-control">{{ $paciente->domicilio}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telefonodomicilio">Telefono domicilio</label>
                        <input type="number" name="telefonodomicilio" class="form-control" value="{{ $paciente->telefonodomicilio}}">
                    </div>
                    <div class="form-group">
                        <label for="telefonocelular">Telefono celular</label>
                        <input type="number" name="telefonocelular" class="form-control" value="{{ $paciente->telefonocelular}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $paciente->email}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop