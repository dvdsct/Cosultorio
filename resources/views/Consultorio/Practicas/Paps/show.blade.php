@extends('adminlte::page')

@section('title', 'Pap')

@section('content_header')

@stop

@section('content')

@livewire('datos-per-paciente',['consulta' => $consulta])

@livewire('form-pap',['consulta' => $consulta])





@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
