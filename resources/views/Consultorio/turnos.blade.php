@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')


    @livewire('agenda')




@stop

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>   $(document).ready(function() {
        $('#myTable').DataTable();
    }); </script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@stop
