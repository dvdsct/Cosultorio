@extends('adminlte::page')

@section('title', 'Receta')



@section('content')

    <div class="row">
        <div class="col">

            @livewire('datos-per-paciente', ['consulta' => $consulta])
        </div>
        <div class="col">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $medico->nombre }}</h3>
                        <p>{{ $medico->matricula }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>


    @livewire('recetar', ['consulta' => $consulta])
    <div class="row d-flex justify-content-end">
        <a class="btn btn-info" href="{{ route('pdf.show', $consulta->id) }}" target="_blank">Enviar</a>
    </div>

@stop

@section('css')


@stop

@section('js')


@stop
