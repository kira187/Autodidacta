@extends('adminlte::page')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre: ') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba un nombre']) !!}

                    <strong>Permisos</strong>

                    @foreach ($permisions as $permision )
                        
                    @endforeach
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
