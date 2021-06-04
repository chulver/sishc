@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Centro Medico La Salud Perfecta</h3>
@stop

@section('content')
    <div class="row">
        @can('pacientes.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h3>Pacientes</h3>
                    <p>Pacientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                    <a href="{{ route('pacientes.index') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('consultas.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>Ventas</h3>
                    <p>Ventas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                    <a href="{{ route('consultas.index') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('signosvitales.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>Signos Vitales</h3>
                    <p>Signos Vitales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-nurse"></i>
                </div>
                    <a href="{{ route('signosvitales.index') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('historiaclinica.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Consulta Medica</h3>
                    <p>Consulta Medica</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-md"></i>
                </div>
                    <a href="{{ route('historiaclinica.index') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('historiaclinica.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>Historia Clinica</h3>
                    <p>Historia Clinica</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                    <a href="{{ route('historiaclinica.completadas') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        @can('users.index')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="small-box bg-olive">
                <div class="inner">
                    <h3>Usuarios</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
    </div>
@stop