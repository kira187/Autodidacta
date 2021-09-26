@extends('layouts.dashboard')

@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Cursos por aprobar</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Listado</li>
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
        @if (session('info'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Aviso</h4>
                <div class="alert-body">
                    {{session('info')}}
                </div>
            </div>
        @endif
        <div class="card">
            <div class="p-2">
                <table class="dt-responsive table" id="courses">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td class="text-center">{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->category->name}}</td>
                                <td width="10px">
                                    <a class="btn btn-link btn-sm" href="{{route('admin.courses.show', $course)}}">Revisar</a>
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
    </div>
</div>
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script>
        $('#courses').DataTable( {
            responsive: true
        } );
    </script>
@endsection