@extends('adminlte::page')

@section('title', 'Receta')



@section('content')

    @livewire('datos-per-paciente',['consulta' => $consulta])

    @livewire('recetar',['consulta' => $consulta])

    <a class="btn btn-info" href="{{route('pdf.show', $consulta->id) }}" target="_blank">Enviar</a>

@stop

@section('css')


@stop

@section('js')


@stop
