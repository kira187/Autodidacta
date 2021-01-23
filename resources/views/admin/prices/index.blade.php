@extends('adminlte::page')

@section('content_header')
    <a href="{{ route('admin.prices.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo precio</a>
    <h1>Lista de niveles de precios disponibles</h1>
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
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td>{{$price->value}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.prices.edit', $price)}}">Editar</a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route' => ['admin.prices.destroy', $price], 'method' => 'DELETE']) !!}
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
            {{--  {{ $prices->links('vendor.pagination.bootstrap-4') }}  --}}
        </div>
    </div>
@stop