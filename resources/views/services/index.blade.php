@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <button class="btn btn-warning float-right" onclick="Crear()"><strong>Crear Servicio</strong></button>
            <h3>Listado de Servicios</h3>
        </div>
        <div id="tabla"></div>
    </div>

    @include('services.modalcreate')
    @include('services.modalshow')
    @include('services.modaledit')
    @include('services.modaldelete')

@stop

@section('css')

@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function (){

            Servicios();

            $('#storebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();

                $.ajax({
                    type: "POST",
                    url: "{{ route('services.store') }}",
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
                        Servicios();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#messageservicio').html(data.responseJSON.errors.servicio);
                        $('#messageprecio').html(data.responseJSON.errors.precio);
                    }
                });
            });

            $('#updatebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();
                var id = $('#id').val();

                $.ajax({
                    type: "PUT",
                    url: "services/"+id,
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
                        Servicios();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#messageservicioe').html(data.responseJSON.errors.servicio);
                        $('#messageprecioe').html(data.responseJSON.errors.precio);
                    }
                });
            });

            $('#deletebtn').click(function (e) {
                e.preventDefault();
                jQuery.noConflict();
                var id = $('#iddelete').val();

                $.ajax({
                    type: "DELETE",
                    url: "services/"+id,
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
                        Servicios();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });

        function Servicios(){
            $.get('services/tabla', function (data) {
                $('#tabla').empty();
                $('#tabla').html(data);
            });
        }

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
                url: "services/"+id+"/edit",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data['id']);
                    $('#servicio').val(data['serviciomedico']);
                    $('#precio').val(data['precio']);

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
                url: "services/"+id+"/show",
                dataType: "json",
                success: function(data) {
                    $('#servicio_show').html(data['serviciomedico']);
                    $('#precio_show').html(data['precio']);

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
