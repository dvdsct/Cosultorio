@extends('adminlte::page')

@section('title', 'Receta')



@section('content')

    @livewire('datos-per-paciente',['consulta' => $consulta])

    @livewire('recetar',['consulta' => $consulta])

@stop

@section('css')


@stop

@section('js')


@stop
