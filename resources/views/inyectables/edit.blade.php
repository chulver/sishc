@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    
@stop

@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3>Registrar Inyectable</h3>
            <a href="{{ route('inyectables.registrar') }}" class="btn btn-primary">Registrar</a>
            <a href="{{ route('inyectables.edit', $paciente->id) }}" class="btn btn-primary">Inyectables</a>
        </div>
        <div class="card-body">
            
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop