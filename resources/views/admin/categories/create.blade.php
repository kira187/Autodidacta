@extends('adminlte::page')

@section('content_header')
    <h1>Registro de nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'  => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}

                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}                
            {!! Form::close() !!}
        </div>
    </div>
@stop