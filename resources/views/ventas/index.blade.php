@extends('adminlte::page')

@section('title', 'Ventas')

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
            <button class="btn btn-warning float-right" onclick="Crear()"><strong>Registrar Venta</strong></button>
            <h3>Ventas</h3>
        </div>
        <div id="tabla"></div>
    </div>

    @include('ventas.modalcreate')
    @include('ventas.modalshow')
    @include('ventas.modaledit')
    @include('ventas.modaldelete')

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function (){

            Ventas();

            $('#storebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();

                $.ajax({
                    type: "POST",
                    url: "{{ route('ventas.store') }}",
                    data: $('#createform').serialize(),
                    success: function (data) {
                        $('#modalcreate').modal('hide');
                        $('#createform').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado con exito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        Ventas();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#messagepaciente').html(data.responseJSON.errors.paciente);
                        $('#messageservicio').html(data.responseJSON.errors.serviciomedico);
                        $('#messagemedico').html(data.responseJSON.errors.medico);
                    }
                });
            });

            $('#updatebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();
                var id = $('#id').val();

                $.ajax({
                    type: "PUT",
                    url: "ventas/"+id,
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
                        Ventas();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('#deletebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();
                var id = $('#iddelete').val();

                $.ajax({
                    type: "DELETE",
                    url: "ventas/"+id,
                    data: $('#deleteform').serialize(),
                    success: function (data) {
                        console.log(data);
                        $('#modaldelete').modal('hide');
                        $('#deleteform').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado con exito',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        Ventas();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });

        function Ventas(){
            jQuery.noConflict();
            $.get('ventas/tabla', function (data) {
                $('#tabla').empty();
                $('#tabla').html(data);
            });
        }

        function Crear(){
            jQuery.noConflict();
            $('#createform').trigger("reset");

            // Mostrar Lista de Pacientes
            $.ajax({
                type: "GET",
                url: "{{ route('ventas.pacientes') }}",
                success: function (data) {
                    $('#pacientes').empty();
                    $('#pacientes').append("<option></option>");
                    $.each(data, function(key, value) {
                        $('#pacientes').append("<option value='"+value.id+"'>"+value.paciente+"</option>");
                    });
                    $('#pacientes').select2();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            // Mostrar Lista de Servicios
            $.ajax({
                type: "GET",
                url: "{{ route('ventas.servicios') }}",
                success: function (data) {
                    $('#servicios').empty();
                    $('#servicios').append("<option></option>");
                    $.each(data, function(key, value) {
                        $('#servicios').append("<option value='"+value.id+"'>"+value.serviciomedico+"</option>");
                    });
                    $('#servicios').select2();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            // Mostrar Lista de Medicos
            $.ajax({
                type: "GET",
                url: "{{ route('ventas.medicos') }}",
                success: function (data) {
                    $('#medicos').empty();
                    $('#medicos').append("<option></option>");
                    $.each(data, function(key, value) {
                        $('#medicos').append("<option value='"+value.id+"'>"+value.name+"</option>");
                    });
                    $('#medicos').select2();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            // Mostrar Numero de Turno
            $.ajax({
                type: "GET",
                url: "{{ route('ventas.turno') }}",
                success: function (data) {
                    let numeroturno = data['numeroturno']
                    $('#numeroturno').val(numeroturno);
                    $('#turno').html(numeroturno);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            $('#modalcreate').modal('show');
        }

        function Editar(id){
            var id = id;
            jQuery.noConflict();

            $.ajax({
                type: "GET",
                url: "ventas/"+id+"/edit",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#id').val(data['id']);
                    var paciente = data['paciente'];
                    var servicio = data['serviciomedico'];
                    var medico = data['name'];

                    // Mostrar Lista de Pacientes
                    $.ajax({
                        type: "GET",
                        url: "{{ route('ventas.pacientes') }}",
                        success: function (data) {
                            console.log(data);
                            $('#pacientes_edit').empty();
                            $.each(data, function(key, value) {
                                let paciente_list = value.paciente;
                                if (paciente_list == paciente){
                                    $('#pacientes_edit').append("<option value='"+value.id+"' selected>"+paciente_list+"</option>");
                                } else {
                                    $('#pacientes_edit').append("<option value='"+value.id+"'>"+paciente_list+"</option>");
                                }
                            });
                            $('#pacientes_edit').select2();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                    // Mostrar Lista de Servicios
                    $.ajax({
                        type: "GET",
                        url: "{{ route('ventas.servicios') }}",
                        success: function (data) {
                            console.log(data);
                            $('#servicios_edit').empty();
                            $.each(data, function(key, value) {
                                let servicio_list = value.serviciomedico;
                                if (servicio_list == servicio){
                                    $('#servicios_edit').append("<option value='"+value.id+"' selected>"+servicio_list+"</option>");
                                } else {
                                    $('#servicios_edit').append("<option value='"+value.id+"'>"+servicio_list+"</option>");
                                }
                            });
                            $('#servicios_edit').select2();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

                    // Mostrar Lista de Medicos
                    $.ajax({
                        type: "GET",
                        url: "{{ route('ventas.medicos') }}",
                        success: function (data) {
                            console.log(data);
                            $('#medicos_edit').empty();
                            $.each(data, function(key, value) {
                                $('#medicos').append("<option value='"+value.id+"'>"+value.name+"</option>");
                                let medico_list = value.name;
                                if (medico_list == medico){
                                    $('#medicos_edit').append("<option value='"+value.id+"' selected>"+medico_list+"</option>");
                                } else {
                                    $('#medicos_edit').append("<option value='"+value.id+"'>"+medico_list+"</option>");
                                }
                            });
                            $('#medicos_edit').select2();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });

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
                url: "ventas/"+id+"/show",
                dataType: "json",
                success: function(data) {
                    $('#paciente_show').html(data['paciente']);
                    $('#servicio_show').html(data['serviciomedico']);
                    $('#medico_show').html(data['name']);

                    $('#modalshow').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

        function Eliminar(id){
            jQuery.noConflict();
            var id = id;
            $('#modaldelete').modal('show');
            $('#iddelete').val(id);
        }

    </script>
@stop
