@extends('adminlte::page')

@section('title', 'Lista de Paps')

@section('content_header')

@stop

@section('content')


<table id="myTable">
    <thead>
        <th>Fecha de Estudio</th>
        <th>Paciente</th>
        <th>DNI</th>
        <th>FUM</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($paps as $c)
        <tr>
            <td>{{ $c->updated_at }}</td>
            <td>{{ $c->perfiles->personas->apellido . ' ' . $c->perfiles->personas->nombre }}</td>
            <td>{{ $c->perfiles->personas->dni }}</td>
            <td>{{ $c->fum }}</td>
            <td> <button type="button" class="btn btn-block btn-info btn-sm ml-2" style="width:80px">Ver</button></td>


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