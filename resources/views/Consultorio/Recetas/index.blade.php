@extends('adminlte::page')

@section('title', 'Listado de Consultas')

@section('content_header')

@stop

@section('content')


@livewire('recetar',['consulta' => $consulta])




@stop
