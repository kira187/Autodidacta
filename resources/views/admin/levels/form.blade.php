@extends('layouts.dashboard')
@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Niveles</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Listado</a></li>
                            <li class="breadcrumb-item active">{{isset($level)? 'Editar': 'Crear'}}</li>
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
                    <h4 class="card-title">{{isset($level)? 'Editar nivel: '.$level->name : 'Crear nuevo nivel'}}</h4>
                </div>
                <div class="card-body">
                    @if (isset($level))
                        {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'PUT', 'class' => 'form form-horizontal']) !!}    
                    @else
                        {!! Form::open(['route'  => 'admin.levels.store']) !!}
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                {!! Form::label('name', 'Nombre') !!}
                                </div>
                                <div class="col-sm-9">
                                {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del nivel']) !!}
                                    @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                            {!! Form::submit('Aceptar', ['class' => 'btn btn-primary mr-1 waves-effect waves-float waves-light']) !!}
                            <a href="{{ route('admin.levels.index') }}" class="btn btn-outline-secondary waves-effect">Cancelar</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
