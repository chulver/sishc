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
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <select name="paciente" class="selectpicker form-control" data-live-search="true">
                    <option></option>
                    @foreach($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->paciente}}</option>
                    @endforeach
                </select>
                @error('paciente')
                <br>
                    <small>*{{$message}}</small>
                <br>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="serviciomedico">Servicio</label>
                <select name="serviciomedico" class="selectpicker form-control" data-live-search="true">
                    <option></option>
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio->id}}">{{$servicio->serviciomedico}}</option>
                    @endforeach
                </select>
                @error('serviciomedico')
                <br>
                    <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div class="form-group">
                <label for="medico">Medico</label>
                <select name="medico" class="selectpicker form-control" data-live-search="true">
                    <option></option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('medico')
                <br>
                    <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
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