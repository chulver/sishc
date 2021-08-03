@extends('adminlte::page')

@section('title', 'Ver Inyectable')

@section('content_header')
    
@stop

@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3>Inyectable</h3>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Nombre:</label>
                        <p class="col-sm-3 col-form-label">{{ $inyectable->nombre }}</p>
                        <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                        <p class="col-sm-2 col-form-label">{{ $inyectable->apaterno }}</p>
                        <label class="col-sm-2 col-form-label">Apellido materno:</label>
                        <p class="col-sm-2 col-form-label">{{ $inyectable->amaterno }}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Sexo:</label>
                        <p class="col-sm-3 col-form-label">{{ $inyectable->sexo }}</p>
                        <label class="col-sm-2 col-form-label">Edad:</label>
                        <p class="col-sm-2 col-form-label">{{ $inyectable->anios }} años, {{ $inyectable->meses }} meses, {{ $inyectable->dias }} dias</p>
                        <label class="col-sm-2 col-form-label">Fecha y Hora:</label>
                        <p class="col-sm-2 col-form-label">{{ $inyectable->created_at }}</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="via" class="col-sm-1 col-form-label">Via:</label>
                        <p class="col-sm-3 col-form-label">{{ $inyectable->via }}</p>
                        <label for="diagnostico" class="col-sm-2 col-form-label">Diagnostico:</label>
                        <p class="col-sm-4 col-form-label">{{ $inyectable->diagnostico }}</p>
                        <label for="precio" class="col-sm-1 col-form-label">Precio:</label>
                        <p class="col-sm-1 col-form-label">{{ $inyectable->precio }}</p>
                    </div>
                
                    <div class="row">
                        <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                            <thead class="bg-secondary text-white">
                                <th>Medicamento</th>
                                <th>Observaciones</th>
                            </thead>
                            <tbody>
                            @foreach ($inyectable_medicamentos as $medicamento)
                                <tr>
                                    <td class="font-weight-bold">{{ $medicamento->medicamento }}</td>
                                    <td class="font-weight-bold">{{ $medicamento->observaciones }}</td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop