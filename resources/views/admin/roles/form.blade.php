@extends('layouts.dashboard')
@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Roles y permisos</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Listado</a></li>
                            <li class="breadcrumb-item active">{{isset($role)? 'Editar': 'Crear'}}</li>
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
                <div class="card-header">
                    <h4 class="card-title">{{isset($role)? 'Editar rol: '.$role->name : 'Crear nuevo rol'}}</h4>
                </div>
                <div class="card-body">
                    @if (isset($role))
                        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT', 'class' => 'form form-horizontal']) !!}    
                    @else
                        {!! Form::open(['route' => 'admin.roles.store', 'class' => 'form form-horizontal']) !!}
                    @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        {!! Form::label('name', 'Nombre: ') !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Nombre / Descripción']) !!}
                                        @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        {!! Form::label('permissions','Permisos') !!}
                                    </div>
                                    <div class="col-sm-9">
                                        {!! Form::select('permissions[]', $permissions, null, ['class' => 'select2 '.($errors->has('permissions') ? 'is-invalid' : ''), 'multiple' => 'multiple', 'style' => 'width: 100%', 'data-placeholder' => 'Asigar permisos']) !!}
                                        @error('permissions')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                                {!! Form::submit(isset($role)? 'Actualizar rol' : 'Crear Rol', ['class' => 'btn btn-primary mr-1 waves-effect waves-float waves-light']) !!}
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary waves-effect">Cancelar</a>
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
    <script> $('.select2').select2(); </script>
@stop