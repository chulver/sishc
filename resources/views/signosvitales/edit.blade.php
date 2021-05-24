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
                <div class="input-group col-sm-2">
                    <input type="number" class="form-control" name="peso" step="any" value="{{ $signosvitales->peso }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">kg.</div>
                    </div>
                </div>
                <label for="talla" class="col-sm-1 col-form-label">Talla</label>
                <div class="input-group col-sm-2">
                    <input type="number" class="form-control" name="talla" value="{{ $signosvitales->talla }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">cm.</div>
                    </div>
                </div>
                <label for="temperatura" class="col-sm-1 col-form-label">T°</label>
                <div class="input-group col-sm-2">
                    <input type="number" class="form-control" name="temperatura" step="any" value="{{ $signosvitales->temperatura }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">°C</div>
                    </div>
                </div>
                <label for="presionarterial" class="col-sm-1 col-form-label">PA</label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="presionarterial" value="{{ $signosvitales->presionarterial }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">mm Hg</div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="spo2" class="col-sm-1 col-form-label">SpO2</label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="spo2" value="{{ $signosvitales->spo2 }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">%</div>
                    </div>
                </div>
                <label for="fcardiaca" class="col-sm-1 col-form-label">FC</label>
                <div class="input-group col-sm-2">
                    <input type="number" class="form-control" name="fcardiaca" value="{{ $signosvitales->fcardiaca }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">lpm</div>
                    </div>
                </div>
                <label for="frespiratoria" class="col-sm-1 col-form-label">FR</label>
                <div class="input-group col-sm-2">
                    <input type="number" class="form-control" name="frespiratoria" value="{{ $signosvitales->frespiratoria }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">rpm</div>
                    </div>
                </div>
                <label for="glicemia" class="col-sm-1 col-form-label">FR</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="glicemia" value="{{ $signosvitales->glicemia }}">
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

@stop

@section('js')

@stop