@extends('adminlte::page')

@section('title', 'Registrar Inyectable')

@section('content_header')
    
@stop

@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3>Registrar Inyectable</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('inyectables.store') }}" method="POST">
        @csrf
            <div class="card">
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
                        <label class="col-sm-2 col-form-label">Fecha y Hora:</label>
                        <p class="col-sm-2 col-form-label">{{ \Carbon\Carbon::now()->toDateTimeString() }}</p>
                    </div>
                </div>
            </div>

            <input type="hidden" name="paciente" value="{{ $paciente->id }}">
            <input type="hidden" name="anios" id="anios" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%y') }}">
            <input type="hidden" name="meses" id="meses" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%m') }}">
            <input type="hidden" name="dias" id="dias" value="{{ \Carbon\Carbon::createFromDate($paciente->fechanacimiento)->diff(\Carbon\Carbon::now())->format('%d') }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="via" class="col-sm-1 col-form-label">Via:</label>
                        <div class="input-group col-sm-3">
                            <select name="via" class="form-control" data-live-search="true">
                                <option></option>
                                <option value="INYECCION INTRAMUSCULAR">INYECCION INTRAMUSCULAR</option>
                                <option value="INYECCION INTRAVENOSA">INYECCION INTRAVENOSA</option>
                                <option value="INYECCION SUBCUTÁNEA">INYECCION SUBCUTÁNEA</option>
                                <option value="INYECCION INTRADÉRMICA">INYECCION INTRADÉRMICA</option>
                            </select>
                        </div>
                        <label for="diagnostico" class="col-sm-2 col-form-label">Diagnostico:</label>
                        <div class="input-group col-sm-4">
                            <input type="text" class="form-control" name="diagnostico">
                        </div>
                        <label for="precio" class="col-sm-1 col-form-label">Precio:</label>
                        <div class="input-group col-sm-1">
                            <input type="number" class="form-control" name="precio" step="any" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="medicamento" class="col-sm-2 col-form-label">Medicamento</label>
                        <div class="col-sm-5">
                            <select id="medicamento" class="selectpicker form-control" data-live-search="true">
                                <option></option>
                                @foreach($medicamentos as $medicamento)
                                <option value="{{$medicamento->id}}">{{$medicamento->medicamento}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group col-sm-5">
                            <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                    <div class="row">
                        <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                            <thead class="bg-secondary text-white">
                                <th>Medicamento</th>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#btn_add").click(function(){
                agregar();
            });
        });

        var cont=0;

        function agregar()
        {
            idmedicamento = $("#medicamento").val();
            medicamento = $("#medicamento option:selected").text();

            if ( idmedicamento != '' && medicamento != '' ) 
            {
                fila="<tr class='selected' id='fila"+cont+"'>";
                fila=fila + "<td>"+"<input type='hidden' name='medicamento[]' value='"+idmedicamento+"'/>"+medicamento+"</td>";
                fila=fila + "<td>"+"<input type='text' name='observaciones[]' class='form-control'/>"+"</td>";
                fila=fila + "<td><button type='button' class='btn btn-warning' onclick='eliminar("+cont+");'>X</button></td>";
                fila=fila + "</tr>";
                $("#detalle").append(fila);
                cont++;
            }
            else
            {
                alert("Error al ingresar el detalle de la venta, revise los datos")
            }
        }

        function eliminar(index)
        {
            $("#fila" + index).remove();
        }
    </script>
@stop