@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Listado de pacientes</h1>
@stop

@section('content')
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">CREAR</a>

    <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PACIENTE</th>
                <th scope="col">SEXO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <td>{{$paciente->id}}</td>
                <td>{{$paciente->apaterno}} {{$paciente->amaterno}} {{$paciente->nombre}}</td>
                <td>{{$paciente->sexo}}</td>
                <td>
                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#pacientes').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
} );
</script>

@stop