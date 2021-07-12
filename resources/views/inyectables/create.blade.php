@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    
@stop

@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3>Registrar Inyectable</h3>
        </div>
        <div class="card-body">
        <form action="" method="POST">
        @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="peso" class="col-sm-2 col-form-label">Paciente:</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" name="paciente" value="{{ $paciente->paciente }}">
                        </div>
                        <label for="talla" class="col-sm-2 col-form-label">Diagnostico:</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" name="talla">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="spo2" class="col-sm-2 col-form-label">Via:</label>
                        <div class="input-group col-sm-4">
                            <select name="paciente" class="selectpicker form-control" data-live-search="true">
                                <option></option>
                                <option value="INYECCION INTRAMUSCULAR">INYECCION INTRAMUSCULAR</option>
                                <option value="INYECCION INTRAVENOSA">INYECCION INTRAVENOSA</option>
                                <option value="INYECCION SUBCUTÁNEA">INYECCION SUBCUTÁNEA</option>
                                <option value="INYECCION INTRADÉRMICA">INYECCION INTRADÉRMICA</option>
                            </select>
                        </div>
                        <label for="fcardiaca" class="col-sm-2 col-form-label">Precio:</label>
                        <div class="input-group col-sm-2">
                            <input type="number" class="form-control" name="fcardiaca">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="peso" class="col-sm-2 col-form-label">Medicamento</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" name="peso" step="any">
                        </div>
                        <div class="input-group col-sm-5">
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </div>
                    <div class="row">
                        <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Medicamento</th>
                                <th>Cantidad</th>
                                <th>Observaciones</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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

@section('css')

@stop

@section('js')

@stop