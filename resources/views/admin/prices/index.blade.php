@extends('layouts.dashboard')

@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Precios ofertados</h2>
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
                <div class="card-header border-bottom p-1">
                    <div class="head-label"><h6 class="mb-0">Listado de precios</h6></div>
                    <div class="dt-action-buttons text-right">
                        <div class="dt-buttons d-inline-flex"> 
                            <a class="dt-button create-new btn btn-primary btn-sm" href="{{ route('admin.prices.create') }}"><i data-feather="plus"></i> Crear precio</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="dt-responsive table table-hover" id="prices">
                        <thead>
                            <tr>
                                <th class="text-center" >ID</th>
                                <th class="text-center" >Nombre</th>
                                <th class="text-center" >Precio</th>
                                <th class="text-center" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($prices as $price)
                                <tr>
                                    <td class="text-center">{{$price->id}}</td>
                                    <td class="text-center">{{$price->name}}</td>
                                    <td class="text-center"> $ {{$price->value}}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.prices.edit', $price)}}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Editar</span>
                                                </a>
                
                                                {!! Form::open(['route' => ['admin.prices.destroy', $price], 'method' => 'delete']) !!}
                                                    <a onclick="this.closest('form').submit();return false;" class="dropdown-item">
                                                        <i data-feather="trash" class="mr-50"></i><span>Eliminar</span>
                                                    </a>
                                                {{ Form::close() }}                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>   
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Sin datos por listar</td>
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
        $('#prices').DataTable();
    </script>
@endsection