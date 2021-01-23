@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('admin.levels.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo nivel</a>
    <h1>Lista de niveles de complejidad</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($levels as $level)
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.levels.edit', $level)}}">Editar</a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route' => ['admin.levels.destroy', $level], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
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

        <div class="card-footer">
            {{--  {{ $levels->links('vendor.pagination.bootstrap-4') }}  --}}
        </div>
    </div>
@stop