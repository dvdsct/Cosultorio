@extends('adminlte::page')

    @section('title', 'Dashboard')

@section('content_header')

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
                <td>{{ $p->personas->apellido}}</td>
                <td>{{ $p->personas->nombre  }}</td>
                <td>{{ '25' }}</td>
                <td>
<a href="turnos/"></a>                </td>
            </tr>

        @endforeach
    </tbody>
</table>








@stop

@section('css')
@stop

@section('js')
@stop
