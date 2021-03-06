@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Signos vitales</h3>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Nombre:</label>
                        <p class="col-sm-3 col-form-label">{{ $consulta->nombre }}</p>
                        <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                        <p class="col-sm-2 col-form-label">{{ $consulta->apaterno }}</p>
                        <label class="col-sm-2 col-form-label">Apellido materno:</label>
                        <p class="col-sm-2 col-form-label">{{ $consulta->amaterno }}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Sexo:</label>
                        <p class="col-sm-3 col-form-label">{{ $consulta->sexo }}</p>
                        <label class="col-sm-2 col-form-label">Edad:</label>
                        <p class="col-sm-2 col-form-label">{{ \Carbon\Carbon::createFromDate($consulta->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y años, %m meses, %d dias') }}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Medico:</label>
                        <p class="col-sm-3 col-form-label">{{ $consulta->medico }}</p>
                        <label class="col-sm-2 col-form-label">Servicio:</label>
                        <p class="col-sm-3 col-form-label">{{ $consulta->serviciomedico }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <form action="{{ route('signosvitales.store') }}" method="POST">
                <input type="hidden" name="anios" id="anios" value="{{ \Carbon\Carbon::createFromDate($consulta->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y') }}">
                <input type="hidden" name="meses" id="meses" value="{{ \Carbon\Carbon::createFromDate($consulta->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%m') }}">
                <input type="hidden" name="dias" id="dias" value="{{ \Carbon\Carbon::createFromDate($consulta->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%d') }}">
                @csrf
                    <input type="hidden" name="solicitud_consultamedica_id" value="{{ $consulta->id }}">
                    <div class="form-group row">
                        <label for="peso" class="col-sm-1 col-form-label">Peso</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="peso" step="any">
                            <div class="input-group-prepend">
                                <div class="input-group-text">kg.</div>
                            </div>
                        </div>
                        <label for="talla" class="col-sm-1 col-form-label">Talla</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="talla">
                            <div class="input-group-prepend">
                                <div class="input-group-text">cm.</div>
                            </div>
                        </div>
                        <label for="temperatura" class="col-sm-1 col-form-label">T°</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="temperatura" step="any">
                            <div class="input-group-prepend">
                                <div class="input-group-text">°C</div>
                            </div>
                        </div>
                        <label for="presionarterial" class="col-sm-1 col-form-label">PA</label>
                        <div class="input-group col-sm-2">
                            <input type="text" class="form-control" name="presionarterial">
                            <div class="input-group-prepend">
                                <div class="input-group-text">mm Hg</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="spo2" class="col-sm-1 col-form-label">SpO2</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="spo2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                        <label for="fcardiaca" class="col-sm-1 col-form-label">FC</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="fcardiaca">
                            <div class="input-group-prepend">
                                <div class="input-group-text">lpm</div>
                            </div>
                        </div>
                        <label for="frespiratoria" class="col-sm-1 col-form-label">FR</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="frespiratoria">
                            <div class="input-group-prepend">
                                <div class="input-group-text">rpm</div>
                            </div>
                        </div>
                        <label for="glicemia" class="col-sm-1 col-form-label">Glicemia</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="glicemia">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
            </form>
        </div>
    </div>
@stop
