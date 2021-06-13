@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <a href="{{ route('servicios.create') }}" class="btn btn-warning float-right"><strong>Nuevo Servicio</strong></a>
    <h1>Listado de Servicios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">SERVICIO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->id }}</td>
                    <td>{{ $servicio->serviciomedico }}</td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger" data-target="#modal-delete-{{$servicio->id}}" data-toggle="modal">Eliminar</button>
                    </td>
                </tr>
                @include('servicios.modal')
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop