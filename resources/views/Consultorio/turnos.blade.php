@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-2"><h1>TURNOS</h1></div>
    <div class="col-1"><button type="button" class="btn btn-block btn-success">Nuevo</button></div>
</div>
@stop

@section('content')


@livewire('agenda')




@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
@stop

@section('js')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"> </script>
    <script> let table = new DataTable('#myTable'); </script>
@stop
