@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <button class="btn btn-warning float-right" onclick="Crear()"><strong>Paciente Nuevo</strong></button>
            <h3>Listado de pacientes</h3>
        </div>
        <div class="card-body">
            <table id="pacientes" class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">PACIENTE</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>

    @include('clientes.modalcreate')
    @include('clientes.modaledit')
    @include('clientes.modalshow')

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function (){
            var tablee = $('#pacientes').DataTable({
                "ajax": "{{ route('clientes.datatable') }}",
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

            $('#storebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();

                $.ajax({
                    type: "POST",
                    url: "{{ route('clientes.store') }}",
                    data: $('#createform').serialize(),
                    success: function (data) {
                        console.log(data);
                        $('#modalcreate').modal('hide');
                        $('#createform').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'Guardado con exito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        tablee.ajax.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#messagenombre').html(data.responseJSON.errors.nombre);
                        $('#messagesexo').html(data.responseJSON.errors.sexo);
                        $('#messagefechanacimiento').html(data.responseJSON.errors.fechanacimiento);
                    }
                });
            });

            $('#updatebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();
                var id = $('#id').val();

                $.ajax({
                    type: "PUT",
                    url: "clientes/"+id,
                    data: $('#editform').serialize(),
                    success: function (data) {
                        console.log(data);
                        $('#modaledit').modal('hide');
                        $('#editform').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'Actualizado con exito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        tablee.ajax.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#messagenombree').html(data.responseJSON.errors.nombre);
                        $('#messagesexoe').html(data.responseJSON.errors.sexo);
                        $('#messagefechanacimientoe').html(data.responseJSON.errors.fechanacimiento);
                    }
                });
            });
        });

        function Crear(){
            jQuery.noConflict();
            $('#createform').trigger("reset");
            $('#modalcreate').modal('show');
        }

        function Editar(id){
            var id = id;
            jQuery.noConflict();

            $.ajax({
                type: "GET",
                url: "clientes/"+id+"/edit",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data['id']);
                    $('#nombre').val(data['nombre']);
                    $('#apaterno').val(data['apaterno']);
                    $('#amaterno').val(data['amaterno']);
                    $('#ci').val(data['ci']);
                    $('#fechanacimiento').val(data['fechanacimiento']);

                    if(data['sexo'] === 'FEMENINO'){
                        $("input[name=sexo][value='FEMENINO']").prop('checked',true);
                    }else{
                        $("input[name=sexo][value='MASCULINO']").prop('checked',true);
                    }

                    $('#domicilio').val(data['domicilio']);
                    $('#telefonocelular').val(data['telefonocelular']);
                    $('#telefonodomicilio').val(data['telefonodomicilio']);
                    $('#email').val(data['email']);

                    $('#modaledit').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

        function Mostrar(id){
            var id = id;
            jQuery.noConflict();

            $.ajax({
                type: "GET",
                url: "clientes/"+id+"/show",
                dataType: "json",
                success: function(data) {
                    $('#nombre_show').html(data['nombre']);
                    $('#apaterno_show').html(data['apaterno']);
                    $('#amaterno_show').html(data['amaterno']);
                    $('#ci_show').html(data['ci']);
                    $('#fechanacimiento_show').html(data['fechanacimiento']);
                    $('#sexo_show').html(data['sexo']);
                    $('#domicilio_show').html(data['domicilio']);
                    $('#telefonocelular_show').html(data['telefonocelular']);
                    $('#telefonodomicilio_show').html(data['telefonodomicilio']);
                    $('#email_show').html(data['email']);

                    $('#modalshow').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

    </script>

@stop
