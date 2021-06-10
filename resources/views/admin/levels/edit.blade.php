@extends('adminlte::page')

@section('content_header')
    <h1>Editar Nivel</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'PUT']) !!}
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}

                @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}                
        {!! Form::close() !!}
        </div>
    </div>
@stop