@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
    <h1>Signos Vitales</h1>
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
                    <th scope="col">N°</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">HORA</th>
                    <th scope="col">ENFERMERA</th>
                    <th scope="col">PACIENTE</th>
                    <th scope="col">SERVICIO</th>
                    <th scope="col">MEDICO</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->numeroturno}}</td>
                    <td>{{\Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y')}}</td>
                    <td>{{$consulta->hora}}</td>
                    <td>{{$consulta->user}}</td>
                    <td>{{$consulta->paciente}}</td>
                    <td>{{$consulta->serviciomedico}}</td>
                    <td>{{$consulta->medico}}</td>
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
                        @if($consulta->estado == '1')
                            <a href="{{ route('signosvitales.create', $consulta->id) }}" class="btn btn-primary">Signos vitales</a>
                        @elseif($consulta->estado == '2')
                            <a href="{{ route('signosvitales.edit', $consulta->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @elseif($consulta->estado == '3')
                            <a href="{{ route('signosvitales.show', $consulta->id) }}" class="btn btn-secondary">Ver</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop