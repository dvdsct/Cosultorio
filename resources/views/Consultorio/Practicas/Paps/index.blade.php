@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')


    <table id="myTable">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($paps as $c)
                <tr>
                    <td>{{ $c->updated_at }}</td>
                    <td>{{ $c->perfiles->personas->nombre }}</td>
                    <td>{{ $c->perfiles->personas->apellido }}</td>
                    <td>{{ $c->perfiles->personas->dni }}</td>
                    <td>{{ $c->fum }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>




@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
@stop

@section('js')
    <script>
        let table = new DataTable('#myTable');
    </script>
@stop
