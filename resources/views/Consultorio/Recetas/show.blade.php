@extends('adminlte::page')

@section('title', 'Receta')



@section('content')


@livewire('receta-secretaria',['consulta' => $consulta, 'paciente' => $paciente,'medico'])

@stop

@section('css')


@stop

@section('js')


@stop
