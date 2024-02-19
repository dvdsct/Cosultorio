@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')

@livewire('datos-per-paciente',['consulta' => $consulta])

    @livewire('form-colp',['consulta' => $consulta])

@stop

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')


@stop
