@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pacientes</h1>
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
        @foreach ($pacientes as $p )

            <tr>
                <td>{{ $p->nombre . $p->apellido}}</td>
                <td>{{ $p->dni }}</td>
                <td>{{ '25' }}</td>
                <td>
<a href="turnos/"></a>                </td>
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
