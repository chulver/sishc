@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Crear Servicio</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'servicios.store']) !!}
                <div class="form-group row">
                    {!! Form::label('servicio', 'Servicio', ['class' => 'col-sm-1 col-form-label']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('servicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Servicio']) !!}
                    </div>
                    @error('servicio')
                        <small class="text-danger">
                        {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group row">
                    {!! Form::label('precio', 'Precio', ['class' => 'col-sm-1 col-form-label']) !!}
                    <div class="col-sm-2">
                        {!! Form::number('precio', '0.00', ['class' => 'form-control']) !!}
                    </div>
                    @error('precio')
                        <small class="text-danger">
                        {{ $message }}
                        </small>
                    @enderror
                </div>


                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
