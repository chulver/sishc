@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
    <h1>Consulta Medica</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="consultas" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>N°</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>ENFERMERA</th>
                    <th>PACIENTE</th>
                    <th>SERVICO</th>
                    <th>ESTADO</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->numeroturno}}</td>
                    <td>{{$consulta->fecha}}</td>
                    <td>{{$consulta->hora}}</td>
                    <td>{{$consulta->user}}</td>
                    <td>{{$consulta->paciente}}</td>
                    <td>{{$consulta->serviciomedico}}</td>
                    <td>
                        @if($consulta->estado == '1')
                            <p class="text-danger">Pendiente</p>
                        @elseif($consulta->estado == '2')
                            <p class="text-danger">Pendiente</p>
                        @elseif($consulta->estado == '3')
                            <p class="text-success">Completado</p>
                        @endif     
                    </td>
                    <td>
                        @if($consulta->estado == '2')
                            <a href="{{ route('historiaclinica.create', $consulta->id) }}" class="btn btn-primary">Atender paciente</a>
                        @elseif($consulta->estado == '3')
                            <a href="{{ route('historiaclinica.edit', $consulta->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('generarPDF', $consulta->id) }}" class="btn btn-success" target="_blank"><i class="fas fa-print"></i></a>
                        @endif   
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop