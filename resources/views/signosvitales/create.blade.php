@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
    <h1>Signos vitales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Paciente:</label>
                <p class="col-sm-4 col-form-label">{{ $consulta->paciente }}</p>
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-2 col-form-label">{{ $consulta->sexo }}</p>
                <label class="col-sm-1 col-form-label">Edad:</label>
                <p class="col-sm-3 col-form-label edad"></p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Servicio:</label>
                <p class="col-sm-4 col-form-label">{{ $consulta->serviciomedico }}</p>
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-6 col-form-label">{{ $consulta->medico }}</p>
            </div>
            <div class="row">
                <input type="hidden" id="fechanacimiento" value="{{ $consulta->fechanacimiento }}">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('signosvitales.store') }}" method="POST">
        <input type="hidden" name="edad" id="edad">
        @csrf
            <input type="hidden" name="solicitud_consultamedica_id" value="{{ $consulta->id }}">
            <div class="form-group row">
                <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="peso" step="any">
                </div>
                <label class="col-sm-3 col-form-label">	kg.</label>
            </div>
            <div class="form-group row">
                <label for="talla" class="col-sm-3 col-form-label">Talla</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="talla">
                </div>
                <label class="col-sm-3 col-form-label">cm.</label>
            </div>
            <div class="form-group row">
                <label for="temperatura" class="col-sm-3 col-form-label">Temperatura</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="temperatura" step="any">
                </div>
                <label class="col-sm-3 col-form-label">°C</label>
            </div>
            <div class="form-group row">
                <label for="paasistolica" class="col-sm-3 col-form-label">Presion Arterial Sistolica</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="pasistolica">
                </div>
                <label class="col-sm-3 col-form-label">mm Hg</label>
            </div>
            <div class="form-group row">
                <label for="padiastolica" class="col-sm-3 col-form-label">Presion Arterial Diastolica</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="padiastolica">
                </div>
                <label class="col-sm-3 col-form-label">mm Hg</label>
            </div>
            <div class="form-group row">
                <label for="fcardiaca" class="col-sm-3 col-form-label">Frecuencia Cardiaca</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="fcardiaca">
                </div>
                <label class="col-sm-3 col-form-label">lpm</label>
            </div>
            <div class="form-group row">
                <label for="frespiratoria" class="col-sm-3 col-form-label">Frecuencia Respiratoria</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="frespiratoria">
                </div>
                <label class="col-sm-3 col-form-label">	rpm</label>
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
<script>
    $(document).ready(function() {
        var fechaNacimineto = new Date($('#fechanacimiento').val());
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);

        edad = Math.floor(((fechaActual - fechaNacimineto) / (1000 * 60 * 60 * 24) / 365));

        $('#edad').val(edad);
        $('.edad').text(edad+" AÑOS");
    });
</script>
@stop