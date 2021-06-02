@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
@stop

@section('content')
    <form action="{{ route('historiaclinica.store') }}" method="POST">
    @csrf
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
                <p class="col-sm-2 col-form-label">{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y años, %m meses, %d dias') }}</p>
                <label for="precio" class="col-sm-2 col-form-label">S:</label>
                <div class="col-sm-2">
                    <input type="text" name="precio" class="form-control">
                </div>
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
            <input type="hidden" name="solicitud_consultamedica_id" value="{{ $signosvitales->solicitud_consultamedica_id }}">
            <input type="hidden" name="anios" id="anios" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y') }}">
            <input type="hidden" name="meses" id="meses" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%m') }}">
            <input type="hidden" name="dias" id="dias" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%d') }}">
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
        </div>
    </div>
    </form>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
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