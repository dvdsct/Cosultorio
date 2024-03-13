@extends('adminlte::page')

@section('title', 'Nueva Receta')

@section('content_header')

@stop

@section('content')
<div class="card-header row">
                        <div class="card-header col-md-6 border-bottom-0" style="height: 40px;">
                            <div class="card-tools" style="width: 100%;">
                                <div class="input-group input-group-sm">
                                    <input type="text" wire:model.live="query" class="form-control float-right" placeholder="Medicamento">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Buscador de CIE10-->
                        <div class="col-md-6" style="height: 40px;">
                            <select wire:model='cie10' class="form-control">
                                @foreach ($cie10 as $c )
                                <option value="{{ $c->id }}">{{ $c->descripcion .' - '. $c->codigo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @stop