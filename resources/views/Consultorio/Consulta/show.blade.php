@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')

@if($consulta->estado == '3')
<h3><span class="badge bg-primary"> Realizada el dia  {{ \Carbon\Carbon::parse($consulta->updated_at)->locale('es_AR')->timezone('America/Argentina/Buenos_Aires')->isoFormat('D [de] MMMM [de] YYYY') }} </td> </h3>
@endif
@livewire('datos-per-paciente',['consulta' => $consulta])
@livewire('parametros',['consulta' => $consulta])
@livewire('enfermedad-actual',['consulta' => $consulta])
@livewire('consultas',['consulta' => $consulta])



@stop

@section('css')

@stop

@section('js')


@stop
