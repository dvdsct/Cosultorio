@extends('adminlte::page')

@section('title', 'Agenda de turnos')



@section('content')


    @livewire('agenda')




@stop

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@stop

@section('js')




    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@stop

@section('favicon')
    <!-- Utiliza la clase de Font Awesome para el ícono "calendar-check" -->
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath d='M467.5 77.2L435 44.7c-18.7-18.7-49.1-18.7-67.9 0L188.1 252.2 75.7 139.7c-18.7-18.7-49.1-18.7-67.9 0l-32.5 32.5c-18.7 18.7-18.7 49.1 0 67.9l134.5 134.5c3.1 3.1 7.2 4.7 11.3 4.7 4.1 0 8.3-1.6 11.5-4.8L456.8 145c18.7-18.7 18.7-49.1 0-67.8zM456.8 145L252.2 349.6l-75.8-75.8 204.6-204.6c18.7-18.7 49.1-18.7 67.8 0l32.5 32.5c18.7 18.7 18.7 49.1 0 67.8z' fill='currentColor'/%3E%3C/svg%3E" type="image/svg+xml">
@stop