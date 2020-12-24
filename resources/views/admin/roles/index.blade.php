@extends('adminlte::page')

@section('content_header')
    <h1>Listado de roles</h1>
@stop

@section('content')
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
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST @method('delete')">
                                <button btn btn-danger>Eliminar</button>
                                </form>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop