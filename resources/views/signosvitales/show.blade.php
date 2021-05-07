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
                <label class="col-sm-1 col-form-label">Paciente:</label>
                <p class="col-sm-4 col-form-label">{{ $signosvitales->apaterno }} {{ $signosvitales->amaterno }} {{ $signosvitales->nombre }}</p>
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->sexo }}</p>
                <label class="col-sm-1 col-form-label">Edad:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->edad }}  AÑOS</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Servicio:</label>
                <p class="col-sm-4 col-form-label">{{ $signosvitales->serviciomedico }}</p>
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-6 col-form-label">{{ $signosvitales->name }}</p>
            </div>
        </div>
    </div>  

    <div class="card">
        <div class="card-header">
            <h3>Signos Vitales</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-3">Peso:</label>
                <p class="col-sm-1">{{ $signosvitales->peso }}</p>
                <p class="col-sm-1">kg.</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Talla:</label>
                <p class="col-sm-1">{{ $signosvitales->talla }}</p>
                <p class="col-sm-1">cm.</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Temperatura:</label>
                <p class="col-sm-1">{{ $signosvitales->temperatura }}</p>
                <p class="col-sm-1">°C</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Presion Arterial Sistolica:</label>
                <p class="col-sm-1">{{ $signosvitales->pasistolica }}</p>
                <p class="col-sm-1">mm Hg</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Presion Arterial Diastolica:</label>
                <p class="col-sm-1">{{ $signosvitales->padiastolica }}</p>
                <p class="col-sm-1">mm Hg</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Frecuencia Cardiaca:</label>
                <p class="col-sm-1">{{ $signosvitales->fcardiaca }}</p>
                <p class="col-sm-1">lpm</p>
            </div>
            <div class="row">
                <label class="col-sm-3">Frecuencia Respiratoria:</label>
                <p class="col-sm-1">{{ $signosvitales->frespiratoria }}</p>
                <p class="col-sm-1">rpm</p>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    
@stop