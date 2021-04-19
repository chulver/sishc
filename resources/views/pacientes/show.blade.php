@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
   <h1>Paciente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">                                        
                    <p><strong>CI:</strong>     {{ $paciente->ci }}</p>
                    <p><strong>Apellido paterno:</strong>      {{ $paciente->apaterno }}</p>
                    <p><strong>Apellido materno:</strong>      {{ $paciente->amaterno }}</p>
                    <p><strong>Nombre:</strong>      {{ $paciente->nombre }}</p>
                    <p><strong>Sexo:</strong>      {{ $paciente->sexo }}</p>
                    <p><strong>Fecha de nacimiento:</strong>      {{ $paciente->fechanacimiento }}</p>
                    <p><strong>Domicilio:</strong>      {{ $paciente->domicilio }}</p>
                    <p><strong>Telefono delular:</strong>      {{ $paciente->telefonodomicilio }}</p>
                    <p><strong>Telefono celular:</strong>      {{ $paciente->telefonocelular }}</p>
                    <p><strong>Email:</strong>      {{ $paciente->email }}</p>

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