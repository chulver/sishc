@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Paciente</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Nombre:</label>
                <p class="col-sm-3 col-form-label">{{ $paciente->nombre }}</p>
                <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                <p class="col-sm-2 col-form-label">{{ $paciente->apaterno }}</p>
                <label class="col-sm-2 col-form-label">Apellido materno:</label>
                <p class="col-sm-2 col-form-label">{{ $paciente->amaterno }}</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-3 col-form-label">{{ $paciente->sexo }}</p>
                <label class="col-sm-2 col-form-label">Edad:</label>
                <p class="col-sm-2 col-form-label edad"></p>
            </div>
            <div class="row">
                <input type="hidden" id="fechanacimiento" value="{{ $paciente->fechanacimiento }}">
            </div>
        </div>
    </div>  

    <div class="card">
        <div class="card-header">
            <h3>Signos Vitales</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1">Peso:</label>
                <p class="col-sm-2">{{ $signosvitales->peso }} kg.</p>
                <label class="col-sm-1">Talla:</label>
                <p class="col-sm-2">{{ $signosvitales->talla }} cm.</p>
                <label class="col-sm-1">T°:</label>
                <p class="col-sm-2">{{ $signosvitales->temperatura }} °C</p>
                <label class="col-sm-1">PA:</label>
                <p class="col-sm-2">{{ $signosvitales->presionarterial }} mm Hg</p>
            </div>
            <div class="row">
                <label class="col-sm-1">SpO2:</label>
                <p class="col-sm-2">{{ $signosvitales->spo2 }} %</p>
                <label class="col-sm-1">FC:</label>
                <p class="col-sm-2">{{ $signosvitales->fcardiaca }} lpm</p>
                <label class="col-sm-1">FR:</label>
                <p class="col-sm-2">{{ $signosvitales->frespiratoria }} rpm</p>
                <label class="col-sm-1">Glicemia:</label>
                <p class="col-sm-2">{{ $signosvitales->glicemia }}</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Historia Clinica</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('historiaclinica.store') }}" method="POST">
                @csrf
                <input type="hidden" name="solicitud_consultamedica_id" value="{{ $signosvitales->solicitud_consultamedica_id }}">
                <input type="text" name="anios" id="anios">
                <input type="text" name="meses" id="meses" value="0">
                <input type="text" name="dias" id="dias" value="0">
                <div class="form-group">
                    <label for="motivoconsulta">Motivo de Consulta</label>
                    <textarea class="form-control" name="motivoconsulta" id="motivoconsulta">{{ old('motivoconsulta') }}</textarea>
                    @error('motivoconsulta')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="enfermedadactual">Enfermedad Actual</label>
                    <textarea class="form-control" name="enfermedadactual" id="enfermedadactual">{{ old('enfermedadactual') }}</textarea>
                    @error('enfermedadactual')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="examenfisico">Examen Fisico</label>
                    <textarea class="form-control" name="examenfisico" id="examenfisico">{{ old('examenfisico') }}</textarea>
                    @error('examenfisico')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="analisisclinico">Analisis Clinico</label>
                    <textarea class="form-control" name="analisisclinico" id="analisisclinico">{{ old('analisisclinico') }}</textarea>
                    @error('analisisclinico')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="planaccion">Plan de Accion</label>
                    <textarea class="form-control" name="planaccion" id="planaccion">{{ old('planaccion') }}</textarea>
                    @error('planaccion')
                    <br>
                    <small>*{{$message}}</small>
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

@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
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

            anios = Math.floor(((fechaActual - fechaNacimineto) / (1000 * 60 * 60 * 24) / 365));

            $('#anios').val(anios);
            $('.edad').text(anios+" AÑOS");
        });

        ClassicEditor
        .create( document.querySelector( '#motivoconsulta' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#enfermedadactual' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#examenfisico' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#analisisclinico' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#planaccion' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@stop