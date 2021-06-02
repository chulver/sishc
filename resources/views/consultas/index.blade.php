@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    @can('consultas.create')
        <a href="{{ route('consultas.create') }}" class="btn btn-secondary float-right">Registrar consulta medica</a>
    @endcan
    <h1>Ventas</h1>
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
                    <th scope="col">USUARIO</th>
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
                        @if($consulta->estado == '3')
                            <p class="text-success">Completado</p>
                        @else
                            <p class="text-danger">Pendiente</p>
                        @endif
                    </td>
                    <td>
                        @if($consulta->estado == '1')
                            @can('consultas.edit')
                                <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('consultas.destroy')
                                <button class="btn btn-danger" data-target="#modal-delete-{{$consulta->id}}" data-toggle="modal"><i class="fas fa-trash-alt"></i></button>
                            @endcan
                        @else
                            <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-secondary">Ver</a>
                        @endif
                    </td>
                </tr>
                @include('consultas.modal')
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop