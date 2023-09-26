@extends('adminlte::page')

@section('title', 'Dashboard')



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
