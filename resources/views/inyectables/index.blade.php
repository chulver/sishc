@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Venta de Inyectable</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('inyectables.registrar') }}" method="GET">
            <div class="form-group row">
                <label for="paciente" class="col-sm-1 col-form-label">Paciente:</label>
                <div class="col-sm-5">
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

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Confirmar</button>
                <button class="btn btn-danger" type="submit">Cancelar</button>
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