@extends('adminlte::page')

@section('title', 'HCs')

@section('css')

    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('content_header')

@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Historia Clinica</h3>
        </div>
        <div class="card-body">
            <table id="completadas" class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>CODIGO</th>
                    <th>PACIENTE</th>
                    <th>SEXO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>

@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

    <script>
            $('#completadas').DataTable({
                "ajax": "{{ route('datatable.historias') }}",
                "columns": [
                    { data: 'id' },
                    { data: 'paciente' },
                    { data: 'sexo' },
                    { data: 'btn' }
                ],
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
    </script>

@stop
