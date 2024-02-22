@extends('adminlte::page')

@section('title', 'Colposcopia')

@section('content_header')

@stop

@section('content')


    <table id="myTable">
        <thead>
            <th>Fecha</th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($colpos as $c)
                <tr>
                    <td>{{ $c->perfiles->personas->nombre }}</td>
                    <td>{{ $c->perfiles->personas->apellido }}</td>
                    <td>{{ $c->perfiles->personas->dni }}</td>
                    <td>{{ $c->updated_at }}</td>

                    
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
