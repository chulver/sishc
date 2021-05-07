@extends('adminlte::page')

@section('title', 'Fichas')

@section('content_header')
    <h1>Fichas</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="consultas" class="table table-striped table-bordered shadow-lg mt-4">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">PACIENTE</th>
                    <th scope="col">SERVICO</th>
                    <th scope="col">MEDICO</th>
                    <th scope="col">ESTADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->id}}</td>
                    <td>{{$consulta->fecha}}</td>
                    <td>{{$consulta->paciente}}</td>
                    <td>{{$consulta->serviciomedico}}</td>
                    <td>{{$consulta->medico}}</td>
                    <td>
                    @if($consulta->estado == '0')
                        <p>Consulta Anulada</p>
                    @elseif($consulta->estado == '1')
                        <p>Venta Registrada</p>
                    @elseif($consulta->estado == '2')
                        <p>Signos Vitales</p>
                    @elseif($consulta->estado == '3')
                        <p>Consulta Finalizada</p>
                    @endif
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