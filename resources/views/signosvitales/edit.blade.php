@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
    <h1>Editar signos vitales</h1>
@stop
    
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Paciente:</label>
                <p class="col-sm-4 col-form-label">{{ $signosvitales->apaterno }} {{ $signosvitales->amaterno }} {{ $signosvitales->nombre }}</p>
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->sexo }}</p>
                <label class="col-sm-1 col-form-label">Edad:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->edad }} AÑOS</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Servicio:</label>
                <p class="col-sm-4 col-form-label">{{ $signosvitales->serviciomedico }}</p>
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-6 col-form-label">{{ $signosvitales->name }}</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('signosvitales.update', $signosvitales->cod) }}" method="POST">
        @csrf
        @method('put')
            <div class="form-group row">
                <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="peso" value="{{ $signosvitales->peso }}" step="any">
                </div>
                <label class="col-sm-3 col-form-label">	kg.</label>
            </div>
            <div class="form-group row">
                <label for="talla" class="col-sm-3 col-form-label">Talla</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="talla" value="{{ $signosvitales->talla }}">
                </div>
                <label class="col-sm-3 col-form-label">cm.</label>
            </div>
            <div class="form-group row">
                <label for="temperatura" class="col-sm-3 col-form-label">Temperatura</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="temperatura" value="{{ $signosvitales->temperatura }}" step="any">
                </div>
                <label class="col-sm-3 col-form-label">°C</label>
            </div>
            <div class="form-group row">
                <label for="paasistolica" class="col-sm-3 col-form-label">Presion Arterial Sistolica</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="pasistolica" value="{{ $signosvitales->pasistolica }}">
                </div>
                <label class="col-sm-3 col-form-label">mm Hg</label>
            </div>
            <div class="form-group row">
                <label for="padiastolica" class="col-sm-3 col-form-label">Presion Arterial Diastolica</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="padiastolica" value="{{ $signosvitales->padiastolica }}">
                </div>
                <label class="col-sm-3 col-form-label">mm Hg</label>
            </div>
            <div class="form-group row">
                <label for="fcardiaca" class="col-sm-3 col-form-label">Frecuencia Cardiaca</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="fcardiaca" value="{{ $signosvitales->fcardiaca }}">
                </div>
                <label class="col-sm-3 col-form-label">lpm</label>
            </div>
            <div class="form-group row">
                <label for="frespiratoria" class="col-sm-3 col-form-label">Frecuencia Respiratoria</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="frespiratoria" value="{{ $signosvitales->frespiratoria }}">
                </div>
                <label class="col-sm-3 col-form-label">rpm</label>
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

@stop

@section('js')

@stop