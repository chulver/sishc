@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Consulta medica</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label for="paciente" class="col-sm-1 col-form-label">Paciente:</label>
                <p class="col-sm-11 col-form-label">{{ $consulta->paciente }}</p> 
            </div>
        
            <div class="form-group row">
                <label for="serviciomedico" class="col-sm-1 col-form-label">Servicio:</label>
                <p class="col-sm-11 col-form-label">{{ $consulta->serviciomedico }}</p>
            </div>

            <div class="form-group row">
                <label for="medico" class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-11 col-form-label">{{ $consulta->name }}</p>
            </div>
        </div>
    </div>

@stop