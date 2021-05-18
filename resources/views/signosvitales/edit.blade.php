@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
    <h1>Editar signos vitales</h1>
@stop
    
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Nombre:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->nombre }}</p>
                <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->apaterno }}</p>
                <label class="col-sm-2 col-form-label">Apellido materno:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->amaterno }}</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->sexo }}</p>
                <label class="col-sm-2 col-form-label">Edad:</label>
                <p class="col-sm-2 col-form-label">{{ $signosvitales->edad }} AÑOS</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->name }}</p>
                <label class="col-sm-2 col-form-label">Servicio:</label>
                <p class="col-sm-3 col-form-label">{{ $signosvitales->serviciomedico }}</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('signosvitales.update', $signosvitales->cod) }}" method="POST">
        @csrf
        @method('put')
            <div class="form-group row">
                <label for="peso" class="col-sm-1 col-form-label">Peso</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="peso" step="any" value="{{ $signosvitales->peso }}">
                </div>
                <p class="col-sm-1 col-form-label">kg.</p>
                <label for="talla" class="col-sm-1 col-form-label">Talla</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="talla" value="{{ $signosvitales->talla }}">
                </div>
                <p class="col-sm-1 col-form-label">cm.</p>
                <label for="temperatura" class="col-sm-1 col-form-label">T</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="temperatura" step="any" value="{{ $signosvitales->temperatura }}">
                </div>
                <p class="col-sm-1 col-form-label">°C</p>
            </div>
            <div class="form-group row">
                <label for="presionarterial" class="col-sm-1 col-form-label">PA</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="presionarterial" value="{{ $signosvitales->presionarterial }}">
                </div>
                <p class="col-sm-1 col-form-label">mm Hg</p>
                <label for="fcardiaca" class="col-sm-1 col-form-label">FC</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="fcardiaca" value="{{ $signosvitales->fcardiaca }}">
                </div>
                <p class="col-sm-1 col-form-label">lpm</p>
                <label for="frespiratoria" class="col-sm-1 col-form-label">FR</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="frespiratoria" value="{{ $signosvitales->frespiratoria }}">
                </div>
                <p class="col-sm-1 col-form-label">rpm</p>
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