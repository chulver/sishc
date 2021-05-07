@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
    <h1>Pendientes</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="consultas" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>PACIENTE</th>
                    <th>SERVICO</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->id}}</td>
                    <td>{{$consulta->fecha}}</td>
                    <td>{{$consulta->paciente}}</td>
                    <td>{{$consulta->serviciomedico}}</td>
                    <td>
                        <a href="{{ route('historiaclinica.create', $consulta->id) }}" class="btn btn-primary">Atender paciente</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

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
        $('#consultas').DataTable({
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
    });
</script>

@stop