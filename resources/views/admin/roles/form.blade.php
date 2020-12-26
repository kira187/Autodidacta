@extends('adminlte::page')

@section('content_header')
    <h1>{{isset($role)? 'Editar rol: '.$role->name : 'Crear nuevo rol'}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            @if (isset($role))
                {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}    
            @else
                {!! Form::open(['route' => 'admin.roles.store']) !!}
            @endif

            <div class="form-group">
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!}
                
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('permissions','Permisos') !!}
                {!! Form::select('permissions[]', $permissions, null, ['class' => 'select2bs4 '.($errors->has('permissions') ? 'is-invalid' : ''), 'multiple' => 'multiple', 'style' => 'width: 100%', 'data-placeholder' => 'Asigar permisos']) !!}

                @error('permissions')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {!! Form::submit(isset($role)? 'Actualizar rol' : 'Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@stop