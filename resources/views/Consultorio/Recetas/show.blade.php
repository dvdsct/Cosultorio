@extends('adminlte::page')

@section('title', 'Receta')



@section('content')

@livewire('datos-per-paciente',['consulta' => $consulta])

    @livewire('form-colp',['consulta' => $consulta])

@stop

@section('css')

    
@stop

@section('js')


@stop
