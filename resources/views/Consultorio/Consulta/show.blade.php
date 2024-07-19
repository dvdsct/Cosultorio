@extends('adminlte::page')

@section('title', 'Consulta')


@section('content')

@if($consulta->estado == '3')
<h3><span class="badge bg-success"> Realizada el dia  {{ \Carbon\Carbon::parse($consulta->updated_at)->locale('es_AR')->timezone('America/Argentina/Buenos_Aires')->isoFormat('D [de] MMMM [de] YYYY') }} </td> </h3>
@endif
@livewire('datos-per-paciente',['consulta' => $consulta])
@livewire('consulta-main',['consulta' => $consulta])
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        console.log('s')
    });
</script>


@stop
