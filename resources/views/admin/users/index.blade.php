@extends('adminlte::page')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop