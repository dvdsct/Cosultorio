@extends('adminlte::page')

@section('title', 'Receta')



@section('content')

    @livewire('datos-per-paciente',['consulta' => $consulta])

    @livewire('recetar',['consulta' => $consulta])
<div class="row d-flex justify-content-end">
    <a class="btn btn-info" href="{{route('pdf.show', $consulta->id) }}" target="_blank">Enviar</a>
</div>

@stop

@section('css')


@stop

@section('js')


@stop
