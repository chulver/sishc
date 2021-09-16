@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Editar Venta</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('put')
            <div class="form-group row">
                <label for="paciente" class="col-sm-1 col-form-label">Paciente:</label>
                <div class="col-sm-5">
                    <select name="paciente" class="form-control selectpicker" data-live-search="true">
                    @foreach($pacientes as $paciente)
                        @if ($paciente->id == $consulta->paciente_id)
                            <option value="{{$consulta->paciente_id}}" selected>{{$consulta->paciente}}</option>
                        @else
                            <option value="{{$paciente->id}}">{{$paciente->paciente}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="serviciomedico" class="col-sm-1 col-form-label">Servicio:</label>
                <div class="col-sm-5">
                    <select name="serviciomedico" class="form-control selectpicker" data-live-search="true">
                    @foreach($servicios as $servicio)
                        @if ($servicio->id == $consulta->serviciomedico_id)
                            <option value="{{$consulta->serviciomedico_id}}" selected>{{$consulta->serviciomedico}}</option>
                        @else
                            <option value="{{$servicio->id}}">{{$servicio->serviciomedico}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="medico" class="col-sm-1 col-form-label">Medico:</label>
                <div class="col-sm-5">
                    <select name="medico" class="form-control selectpicker" data-live-search="true">
                    @foreach($medicos as $medico)
                        @if ($medico->id == $consulta->medico)
                            <option value="{{$consulta->medico}}" selected>{{$consulta->name}}</option>
                        @else
                            <option value="{{$medico->id}}">{{$medico->name}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>
        </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop
