@extends('adminlte::page')

@section('title', 'Mostrar Paciente')

@section('content_header')
   <h1>Paciente</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">                                       
            <p><strong>Apellido paterno:</strong>      {{ $paciente->apaterno }}</p>
            <p><strong>Apellido materno:</strong>      {{ $paciente->amaterno }}</p>
            <p><strong>Nombre:</strong>      {{ $paciente->nombre }}</p>
            <p><strong>Sexo:</strong>      {{ $paciente->sexo }}</p>
            <p><strong>Fecha de nacimiento:</strong>      {{ $paciente->fechanacimiento }}</p>
            <p><strong>CI:</strong>     {{ $paciente->ci }}</p>
            <p><strong>Domicilio:</strong>      {{ $paciente->domicilio }}</p>
            <p><strong>Telefono delular:</strong>      {{ $paciente->telefonodomicilio }}</p>
            <p><strong>Telefono celular:</strong>      {{ $paciente->telefonocelular }}</p>
            <p><strong>Email:</strong>      {{ $paciente->email }}</p>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop