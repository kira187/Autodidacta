@extends('adminlte::page')

@section('content_header')
    <h1>Cursos pendientes de aprobación</h1>
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
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{ route('admin.courses.show', $course)}}">Revisar</a>
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
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop