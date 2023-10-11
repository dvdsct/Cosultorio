@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')



@livewire('datos-per-paciente',['consulta' => $consulta])
@livewire('parametros',['consulta' => $consulta])



@stop

@section('css')

@stop

@section('js')


@stop
