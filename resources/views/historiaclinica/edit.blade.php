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
                <p class="col-sm-3 col-form-label">{{ $historiaclinica->nombre }}</p>
                <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                <p class="col-sm-2 col-form-label">{{ $historiaclinica->apaterno }}</p>
                <label class="col-sm-2 col-form-label">Apellido materno:</label>
                <p class="col-sm-2 col-form-label">{{ $historiaclinica->amaterno }}</p>
            </div>
            <div class="row">
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-3 col-form-label">{{ $historiaclinica->sexo }}</p>
                <label class="col-sm-2 col-form-label">Edad:</label>
                <p class="col-sm-2 col-form-label">{{ $historiaclinica->edad }} AÑOS</p>
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
                <p class="col-sm-3">{{ $historiaclinica->peso }} kg.</p>
                <label class="col-sm-1">Talla:</label>
                <p class="col-sm-3">{{ $historiaclinica->talla }} cm.</p>
                <label class="col-sm-1">T:</label>
                <p class="col-sm-3">{{ $historiaclinica->temperatura }} °C</p>
            </div>
            <div class="row">
                <label class="col-sm-1">PA:</label>
                <p class="col-sm-3">{{ $historiaclinica->presionarterial }} mm Hg</p>
                <label class="col-sm-1">FC:</label>
                <p class="col-sm-3">{{ $historiaclinica->fcardiaca }} lpm</p>
                <label class="col-sm-1">FR:</label>
                <p class="col-sm-3">{{ $historiaclinica->frespiratoria }} rpm</p>
            </div>
        </div>
    </div> 

    <div class="card">
        <div class="card-header">
            <h3>Historia Clinica</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('historiaclinica.update', $historiaclinica->cod) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="motivoconsulta">Motivo de Consulta</label>
                    <textarea class="form-control" name="motivoconsulta" id="motivoconsulta">{{ old('motivoconsulta', $historiaclinica->motivoconsulta) }}</textarea>
                    @error('motivoconsulta')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="enfermedadactual">Enfermedad Actual</label>
                    <textarea class="form-control" name="enfermedadactual" id="enfermedadactual">{{ old('enfermedadactual', $historiaclinica->enfermedadactual) }}</textarea>
                    @error('enfermedadactual')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="examenfisico">Examen Fisico</label>
                    <textarea class="form-control" name="examenfisico" id="examenfisico">{{ old('examenfisico', $historiaclinica->examenfisico) }}</textarea>
                    @error('examenfisico')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="analisisclinico">Analisis Clinico</label>
                    <textarea class="form-control" name="analisisclinico" id="analisisclinico">{{ old('analisisclinico', $historiaclinica->analisisclinico) }}</textarea>
                    @error('analisisclinico')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="planaccion">Plan de Accion</label>
                    <textarea class="form-control" name="planaccion" id="planaccion">{{ old('planaccion', $historiaclinica->planaccion) }}</textarea>
                    @error('planaccion')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Finalizar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
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