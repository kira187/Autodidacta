@extends('adminlte::page')

@section('content_header')
    <h1>Asignacion de rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <label>Nombre</label>
            <p class="form-control">{{ $user->name }}</p>
            
            {!! Form::model($user, ['route' => [ 'admin.users.update', $user],  'method' => 'PUT']) !!}                            

                <div class="form-group">
                    <label>Roles</label>
                    {!! Form::label('roles', 'Roles', ['class' => 'sr-only']) !!}
                    {!! Form::select('roles[]', $roles, null, ['class' => 'select2bs4', 'multiple' => 'multiple', 'style' => 'width: 100%', 'data-placeholder' => 'Asigar roles']) !!}
                </div>

                
                {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                
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