@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Turnos</h1>
@stop

@section('content')


<table>
    <thead>
        <th>Paciente</th>
        <th>OS</th>
        <th>Abono</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($turnos as $turno )

            <tr>
                <td>{{  }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        @endforeach
    </tbody>
</table>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
