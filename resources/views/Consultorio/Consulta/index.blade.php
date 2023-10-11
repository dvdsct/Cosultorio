@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recently Added Products</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <div class="card-body p-0" style="display: block;">

            <div class="row">
                <div class="col-4 d-flex flex-column px-5">
                    <span for="">Nombre</span>
                    <span for="">DNI</span>
                    <span for="">Edad</span>
                    <span for=""> <strong>Obra Social:</strong> Iosep  </span>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
            </div>
        </div>



    </div>



@stop

@section('css')

@stop

@section('js')


@stop
