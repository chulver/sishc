@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Paciente</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Nombre:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->nombre }}</p>
                <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->apaterno }}</p>
                <label class="col-sm-2 col-form-label">Apellido materno:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->amaterno }}</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->sexo }}</p>
                <label class="col-sm-2 col-form-label">Edad:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->anios }} AÑOS</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->name }}</p>
                <label class="col-sm-2 col-form-label">Servicio:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->serviciomedico }}</p>
            </div>
        </div>
    </div>
    </div>  

    <div class="card">
        <div class="card-header">
            <h3>Signos Vitales</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1">Peso:</label>
                <p class="col-sm-2">{{ $signosvitales->peso }} kg.</p>
                <label class="col-sm-1">Talla:</label>
                <p class="col-sm-2">{{ $signosvitales->talla }} cm.</p>
                <label class="col-sm-1">T:</label>
                <p class="col-sm-2">{{ $signosvitales->temperatura }} °C</p>
                <label class="col-sm-1">PA:</label>
                <p class="col-sm-2">{{ $signosvitales->presionarterial }} mm Hg</p>
            </div>
            <div class="row">
                <label class="col-sm-1">SpO2:</label>
                <p class="col-sm-2">{{ $signosvitales->spo2 }} mm Hg</p>
                <label class="col-sm-1">FC:</label>
                <p class="col-sm-2">{{ $signosvitales->fcardiaca }} lpm</p>
                <label class="col-sm-1">FR:</label>
                <p class="col-sm-2">{{ $signosvitales->frespiratoria }} rpm</p>
                <label class="col-sm-1">Glicemia:</label>
                <p class="col-sm-2">{{ $signosvitales->glicemia }}</p>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    
@stop