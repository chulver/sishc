@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
    <h1>Completadas</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-body">
            <table id="completadas" class="table table-striped table-bordered shadow-lg mt-4">
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
                @foreach ($completadas as $completada)
                <tr>
                    <td>{{$completada->id}}</td>
                    <td>{{$completada->fecha}}</td>
                    <td>{{$completada->paciente}}</td>
                    <td>{{$completada->serviciomedico}}</td>
                    <td>
                    @if($completada->estado == '1')
                        <a href="{{ route('historiaclinica.edit', $completada->id) }}" class="btn btn-primary">Finalizar atencion</a>
                    @elseif($completada->estado == '2')
                        <a href="{{ route('generarPDF', $completada->id) }}" class="btn btn-success" target="_blank">Imprimir HC</a>
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
        $('#completadas').DataTable({
            "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
            "aaSorting": [[0,"desc"]],
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