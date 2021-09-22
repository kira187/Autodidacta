@extends('layouts.dashboard')
@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Asignación de permisos</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Listado</a></li>
                            <li class="breadcrumb-item active">Asignación</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user, ['route' => [ 'admin.users.update', $user],  'method' => 'PUT']) !!}                            
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        {!! Form::label('name', 'Nombre: ') !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        {!! Form::label('roles','Roles') !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::select('roles[]', $roles, null, ['class' => 'select2bs4', 'multiple' => 'multiple', 'style' => 'width: 100%', 'data-placeholder' => 'Asigar roles']) !!}
                                        @error('roles')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                {!! Form::submit('Aceptar', ['class' => 'btn btn-primary mr-1 waves-effect waves-float waves-light']) !!}
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary waves-effect">Cancelar</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>

    <script>
        $(function () {
            $('.select2bs4').select2();
        })
    </script>
@stop

