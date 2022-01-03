@extends('adminlte::page')

@section('title', 'Reporte de Ventas')

@section('css')

@stop

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Reporte de Ventas</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('reportes.resultado') }}" method="POST">
            @csrf
            <div class="row">
                <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Desde:</div>
                    </div>
                    <input type="date" class="form-control" name="fechainicial" @if (isset($fechainicial)) value="{{ $fechainicial }}" @endif>
                </div>
                <div class="input-group col-sm-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Hasta:</div>
                    </div>
                    <input type="date" class="form-control" name="fechafinal" @if (isset($fechafinal)) value="{{ $fechafinal }}" @endif>
                </div>
                <div class="input-group col-sm-2">
                    <button class="btn btn-primary" type="submit">Mostrar</button>
                </div>
            </div>
            <div class="row">
                <div class="input-group col-sm-3">
                    @error('fechainicial')
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="input-group col-sm-3">
                    @error('fechafinal')
                        <small>*{{$message}}</small>
                    @enderror
                </div>
            </div>
            </form>
            @if (isset($ventas))
                <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-4">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">SERVICIO</th>
                        <th scope="col">PACIENTE</th>
                        <th scope="col">PRECIO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->serviciomedico }}</td>
                        <td>{{ $venta->paciente }}</td>
                        <td>{{ $venta->precio }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            @endif
        </div>
    </div>

@stop

@section('js')

@stop
