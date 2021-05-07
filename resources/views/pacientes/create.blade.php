@extends('adminlte::page')

@section('title', 'Registrar Paciente')

@section('content_header')
   <h1>Registrar paciente</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="apaterno">Apellido paterno</label>
                        <input type="text" name="apaterno" class="form-control" value="{{ old('apaterno') }}">
                    </div>
                    <div class="form-group">
                        <label for="amaterno">Apellido materno</label>
                        <input type="text" name="amaterno" class="form-control" value="{{ old('amaterno') }}">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="masculino" value="MASCULINO">
                            <label class="form-check-label" for="masculino">MASCULINO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="femenino" value="FEMENINO">
                            <label class="form-check-label" for="femenino">FEMENINO</label>
                        </div>
                        @error('sexo')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fechanacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechanacimiento" class="form-control" value="{{ old('fechanacimiento') }}">
                        @error('fechanacimiento')
                            <br>
                            <small>*{{$message}}</small>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <textarea name="domicilio" class="form-control">{{ old('domicilio') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telefonodomicilio">Telefono domicilio</label>
                        <input type="number" name="telefonodomicilio" class="form-control" value="{{ old('telefonodomicilio') }}">
                    </div>
                    <div class="form-group">
                        <label for="telefonocelular">Telefono celular</label>
                        <input type="number" name="telefonocelular" class="form-control" value="{{ old('telefonocelular') }}">
                    </div>
                    <div class="form-group">
                        <label for="ci">CI</label>
                        <input type="number" name="ci" class="form-control" value="{{ old('ci') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
        </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop