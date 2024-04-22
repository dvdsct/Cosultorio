@extends('adminlte::page')

@section('title', 'Receta')



@section('content')


@livewire('receta-secretaria',['consulta' => $consulta, 'paciente' => $paciente])

@stop

@section('css')


@stop

@section('js')


@stop
