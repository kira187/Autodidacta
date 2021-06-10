@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary btn-sm float-right">Nueva categoría</a>
    <h1>Lista de categorías</h1>
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
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category)}}">Editar</a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route' => ['admin.categories.destroy', $category], 'method' => 'DELETE']) !!}
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
            {{--  {{ $categories->links('vendor.pagination.bootstrap-4') }}  --}}
        </div>
    </div>
@stop