@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')

@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Paciente</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Nombre:</label>
                <p class="col-sm-3 col-form-label">{{ $paciente->nombre }}</p>
                <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                <p class="col-sm-2 col-form-label">{{ $paciente->apaterno }}</p>
                <label class="col-sm-2 col-form-label">Apellido materno:</label>
                <p class="col-sm-2 col-form-label">{{ $paciente->amaterno }}</p>
            </div>
        </div>
    </div> 

    <div class="card">
        <div class="card-header">
            <h3>Historia Clinica</h3>
        </div>
        <div class="card-body">
            <table id="completadas" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>SERVICIO</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiasclinicas as $hc)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($hc->fecha)->format('d/m/Y')}}</td>
                    <td>{{ $hc->hora }}</td>
                    <td>{{ $hc->serviciomedico }}</td>
                    <td>
                        <a href="{{ route('historiaclinica.edit', $hc->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('generarPDF', $hc->id) }}" class="btn btn-success" target="_blank"><i class="fas fa-print"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop