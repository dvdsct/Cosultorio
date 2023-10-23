@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')



@livewire('datos-per-paciente',['consulta' => $consulta])
@livewire('parametros',['consulta' => $consulta])
@livewire('enfermedad-actual',['consulta' => $consulta])
@livewire('consultas',['consulta' => $consulta])



@stop

@section('css')

@stop

@section('js')


@stop
