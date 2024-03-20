@extends('adminlte::page')
 

<!--
@section('content')


@livewire('recetar',['consulta' => $consulta])

@stop -->


@section('title', 'Generar nueva receta')

@section('content_header')

@stop

@livewire('get_client')

@endsection