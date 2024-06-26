@extends('adminlte::page')

@section('title', 'Lista de pacientes')

@section('content_header')

@stop

@section('content')
    <div class="row px-3">
        <div class="card-header col-md-6 pt-4 border-0 px-1" style="display:flex;">
            <div class="card-tools" style="width: 80%;">
                <div class="input-group input-group-sm">
                    <input type="text" wire:model.lazy="query" class="form-control float-right"
                        placeholder="Buscar paciente">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="display: flex; justify-content:flex-end; align-items:flex-end">
            <h2 style="margin: 0;"> <strong> PACIENTES </strong></h2>
        </div>
    </div>




    <div class="table-responsive">
        <div class="col-12">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <th>Paciente</th>
                        <th>DNI</th>
                        <th>Edad</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Obra Social</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($pac as $p)
                            <tr>
                                <td>{{ $p->perfiles->personas->apellido . ' ' . $p->perfiles->personas->nombre }}</td>
                                <td>{{ $p->perfiles->personas->dni }}</td>
                                <td>{{ $p->perfiles->personas->edad }}</td>
                                <td>{{ optional($p->perfiles->personas->telefonos)->first()->numero ?? '-' }}</td>
                                <td>{{ $p->perfiles->personas->correos->first()->direccion ?? '-' }}</td>
                                <td></td>

                                <td style="width: 230px; padding-left:1px">
                                    <div class="row pr-2" style="display:flex; justify-content:center">
                                        <a href='{{ route('pacientes.show' , $p->id ) }}'
                                            class="btn btn-block btn-success btn-sm" style="width:80px">Consultas</a>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
