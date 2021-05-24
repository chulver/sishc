@extends('adminlte::page')

@section('title', 'Signos Vitales')

@section('content_header')
    <h1>Signos vitales</h1>
@stop

@section('content')
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
                <p class="col-sm-2 col-form-label edad"></p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Medico:</label>
                <p class="col-sm-3 col-form-label">{{ $consulta->medico }}</p>
                <label class="col-sm-2 col-form-label">Servicio:</label>
                <p class="col-sm-3 col-form-label">{{ $consulta->serviciomedico }}</p>
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
                <label for="peso" class="col-sm-1 col-form-label">Peso</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="peso" step="any">
                </div>
                <p class="col-sm-1 col-form-label">kg.</p>
                <label for="talla" class="col-sm-1 col-form-label">Talla</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="talla">
                </div>
                <p class="col-sm-1 col-form-label">cm.</p>
                <label for="temperatura" class="col-sm-1 col-form-label">T</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="temperatura" step="any">
                </div>
                <p class="col-sm-1 col-form-label">°C</p>
            </div>
            <div class="form-group row">
                <label for="presionarterial" class="col-sm-1 col-form-label">PA</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="presionarterial">
                </div>
                <p class="col-sm-1 col-form-label">mm Hg</p>
                <label for="fcardiaca" class="col-sm-1 col-form-label">FC</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="fcardiaca">
                </div>
                <p class="col-sm-1 col-form-label">lpm</p>
                <label for="frespiratoria" class="col-sm-1 col-form-label">FR</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="frespiratoria">
                </div>
                <p class="col-sm-1 col-form-label">rpm</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
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