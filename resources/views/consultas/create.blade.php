@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Registrar consulta medica</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
        <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
            <div class="form-group row">
                <label for="numeroturno" class="col-sm-1 col-form-label">N° Turno:</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" name="numeroturno" value="{{ $numeroturno->numeroturno }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="paciente" class="col-sm-1 col-form-label">Paciente:</label>
                <div class="col-sm-11">
                    <select name="paciente" class="selectpicker form-control" data-live-search="true">
                        <option></option>
                        @foreach($pacientes as $paciente)
                        <option value="{{$paciente->id}}">{{$paciente->paciente}}</option>
                        @endforeach
                    </select>
                </div>
                @error('paciente')
                <br>
                    <small class="text-danger">*{{$message}}</small>
                <br>
                @enderror
            </div>
        
            <div class="form-group row">
                <label for="serviciomedico" class="col-sm-1 col-form-label">Servicio:</label>
                <div class="col-sm-11">
                    <select name="serviciomedico" class="selectpicker form-control" data-live-search="true">
                        <option></option>
                        @foreach($servicios as $servicio)
                        <option value="{{$servicio->id}}">{{$servicio->serviciomedico}}</option>
                        @endforeach
                    </select>
                    </div>
                @error('serviciomedico')
                <br>
                    <small class="text-danger">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div>
                <input type="hidden" name="precio" value="0.0">
            </div>

            <div class="form-group row">
                <label for="medico" class="col-sm-1 col-form-label">Medico:</label>
                <div class="col-sm-11">
                    <select name="medico" class="selectpicker form-control" data-live-search="true">
                        <option></option>
                        @foreach($medicos as $medico)
                        <option value="{{$medico->id}}">{{$medico->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('medico')
                <br>
                    <small class="text-danger">*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
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