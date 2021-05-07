@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Datos del Paciente</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <label class="col-sm-1 col-form-label">Paciente:</label>
                <p class="col-sm-4 col-form-label">{{ $historiaclinica->apaterno }} {{ $historiaclinica->amaterno }} {{ $historiaclinica->nombre }}</p>
                <label class="col-sm-1 col-form-label">Sexo:</label>
                <p class="col-sm-2 col-form-label">{{ $historiaclinica->sexo }}</p>
                <label class="col-sm-1 col-form-label">Edad:</label>
                <p class="col-sm-3 col-form-label">{{ $historiaclinica->edad }} AÑOS</p>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Historia Clinica</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('historiaclinica.update', $historiaclinica->cod) }}" method="POST">
                    @csrf
                    @method('put')
                        <div class="form-group">
                            <label for="apaterno">Motivo de Consulta</label>
                            <textarea class="form-control" name="motivoconsulta" id="motivoconsulta">{{ $historiaclinica->motivoconsulta }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="apaterno">Examen Fisico</label>
                            <textarea class="form-control" name="examenfisico" id="examenfisico">{{ $historiaclinica->examenfisico }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="apaterno">Analisis Clinico</label>
                            <textarea class="form-control" name="analisisclinico" id="analisisclinico">{{ $historiaclinica->analisisclinico }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="apaterno">Plan de Accion</label>
                            <textarea class="form-control" name="planaccion" id="planaccion">{{ $historiaclinica->planaccion }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Finalizar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3>Signos Vitales</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                    <label class="col-sm-8">Peso:</label>
                        <p class="col-sm-4">{{ $historiaclinica->peso }} kg.</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Talla:</label>
                        <p class="col-sm-4">{{ $historiaclinica->talla }} cm.</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Temperatura:</label>
                        <p class="col-sm-4">{{ $historiaclinica->temperatura }} °C</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Presion Arterial Sistolica:</label>
                        <p class="col-sm-4">{{ $historiaclinica->pasistolica }} mm Hg</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Presion Arterial Diastolica:</label>
                        <p class="col-sm-4">{{ $historiaclinica->padiastolica }} mm Hg</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Frecuencia Cardiaca:</label>
                        <p class="col-sm-4">{{ $historiaclinica->fcardiaca }} lpm</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-8">Frecuencia Respiratoria:</label>
                        <p class="col-sm-4">{{ $historiaclinica->frespiratoria }} rpm</p>
                    </div>
                </div>
            </div>
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