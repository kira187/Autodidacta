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
                    {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!}
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    <br>

                    <strong>Permisos</strong>
                    <br>
                    @error('permissions')
                        <small class="text-danger">
                            <strong>{{$message}}</strong>
                        </small>
                    @enderror
                    <br>

                    @foreach ($permissions as $permission )
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                {{$permission->name}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
