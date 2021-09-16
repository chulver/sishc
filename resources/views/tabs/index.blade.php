@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')

@stop

@section('content')

<div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Nombre:</label>
                        <p class="col-sm-3 col-form-label"></p>
                        <label class="col-sm-2 col-form-label">Apellido paterno:</label>
                        <p class="col-sm-2 col-form-label"></p>
                        <label class="col-sm-2 col-form-label">Apellido materno:</label>
                        <p class="col-sm-2 col-form-label"></p>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label">Sexo:</label>
                        <p class="col-sm-3 col-form-label"></p>
                        <label class="col-sm-2 col-form-label">Fecha de Nacimiento:</label>
                        <p class="col-sm-2 col-form-label"></p>
                        <label class="col-sm-2 col-form-label">Edad:</label>
                        <p class="col-sm-2 col-form-label"></p>
                    </div>
                </div>
            </div>
            <div class="card card-secondary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Recetas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@stop

@section('css')

@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function(){

            frm();

            $("#custom-tabs-one-home-tab").click(function(e){
                frm();
            });

            $("#custom-tabs-one-profile-tab").click(function(e){
                $.get('tabs/tabla', function (data) {
                    //$('#tabla').empty();
                    $('#custom-tabs-one-tabContent').html(data);
                    console.log( data );
                });
            });

            $("#custom-tabs-one-messages-tab").click(function(e){
                $('#custom-tabs-one-tabContent').html("Recetas");
            });
        });

        function frm(){
            $.get('tabs/frm', function (data) {
                //$('#tabla').empty();
                $('#custom-tabs-one-tabContent').html(data);
            });
        }
    </script>

@stop
