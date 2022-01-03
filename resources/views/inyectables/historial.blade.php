@extends('adminlte::page')

@section('title', 'Historial de Inyectables')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('inyectables.registrar', $paciente->id) }}" class="btn btn-warning float-right"><strong>Registrar</strong></a>
            <h3>Historial de Inyectables</h3>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Nombre:</label>
                        <p class="col-sm-3 col-form-label">{{ $paciente->nombre }}</p>
                        <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                        <p class="col-sm-2 col-form-label">{{ $paciente->apaterno }}</p>
                        <label class="col-sm-2 col-form-label">Apellido materno:</label>
                        <p class="col-sm-2 col-form-label">{{ $paciente->amaterno }}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Sexo:</label>
                        <p class="col-sm-3 col-form-label">{{ $paciente->sexo }}</p>
                        <label class="col-sm-2 col-form-label">Edad:</label>
                        <p class="col-sm-2 col-form-label">{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y años, %m meses, %d dias') }}</p>
                    </div>
                </div>
            </div>

            <table id="completadas" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>VIA</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historialinyectables as $historial)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($historial->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $historial->hora }}</td>
                    <td>{{ $historial->via }}</td>
                    <td>
                        <a href="{{ route('inyectables.show', $historial->id) }}" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop
