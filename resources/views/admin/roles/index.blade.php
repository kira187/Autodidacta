@extends('adminlte::page')

@section('content_header')
    <h1>Listado de roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alerta</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">

        <div class="card-header">
        <a href="{{route('admin.roles.create')}}">Crear Role</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td width="10px">
                                {{ Form::open(['url' => route('admin.roles.destroy', $role), 'method' => 'delete']) }}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}    
                                {{ Form::close() }}                                
                            </td>
                        </tr>   
                    @empty
                        <tr>
                            <td colspan="4">Sin datos por listar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop