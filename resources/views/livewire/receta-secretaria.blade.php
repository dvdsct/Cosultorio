<div>
    <!-- MODAL GENERAR NUEVA RECETA  -->
    @if ($modalMedico)
    <div class="modal fade show" id="modal-default" wire:ignore.self style="background-color: rgba(0, 0, 0, 0.5); display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><strong> GENERAR NUEVA RECETA </strong></h4>
                    <button type="button" class="close" wire:click='modalMedicoOnOff'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="medico">Medico</label>
                        <select class="form-control" wire:model='medico'>
                            <option selected> Seleccionar..</option>
                            @foreach ($medicos as $m)
                            <option value="{{ $m->id }}">
                                {{ $m->perfiles->personas->apellido }} {{ $m->perfiles->personas->nombre }}
                            </option>
                            @endforeach
                        </select>
                        <div class="text-red" style="font-weight: bold;">
                            @error('medico')
                            {{ $message }}
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-danger" wire:click='modalMedicoOnOff'>Cancelar</button>
                    <button class="btn btn-success" wire:click='selMed'>Continuar</button>
                </div>
            </div>

        </div>

    </div>
    @else
    <div class="row mt-4">
        <div class="col-6">
            <div class="small-box bg-primary">
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Paciente <i class="fas fa-user"></i></a>
                <div class="inner">
                    <h3> {{ $paciente->perfiles->personas->dni }} - {{ $paciente->perfiles->personas->apellido }}
                        {{ $paciente->perfiles->personas->nombre }}
                    </h3>
                    <h4><span style="font-style: italic;"> IOSEP </span> </h4>
                    <!-- TRAER VARIABLE DE OBRA SOCIAL -->
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="small-box bg-secondary">
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Medico <i class="fas fa-user-md"></i></a>
                <div class="inner">
                    <h3>{{ $medico->titulo }} {{ $medico->perfiles->personas->apellido }}
                        {{ $medico->perfiles->personas->nombre }}
                    </h3>
                    <h4> <span style="font-style: italic;"> {{ $medico->especialidad }} MP:
                            {{ $medico->matricula }} </span></h4>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>


    </div>
    <div class=" row pt-0">
        <div class="col-md-6">
            <div style="width: 100%;">
                <label> <strong> Buscar medicamento: </strong> </label>
                <div class="input-group">
                    <input type="text" wire:model="query" wire:keydown.enter='searchV' class="form-control float-right" placeholder="Droga/Marca">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Formulario por R/p --}}
    <div class="row mt-4">

        @foreach ($rps as $rp)
        @livewire('form-rp', ['consulta' => $consulta, 'rp' => $rp])
        @endforeach

    </div>






    <!-- MODAL PARA SELECCIONAR MEDICAMENTOS -->
    @if ($modalRemedios)
    <div class="modal fade show" id="modal-default" wire:ignore.self style="background-color: rgba(0, 0, 0, 0.5); display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><strong>SELECCIONAR MEDICAMENTO </strong></h4>
                    <button type="button" class="close" wire:click='modalRemedioOnOff'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 450px;  overflow-y: auto;">
                    <!-- Lista Vademecum -->
                    <div class="row px-2">
                        <div class="col-12">
                            @if($vademecum->isEmpty())
                            <h5 class="font-italic pt-2 pl-3" style="text-align: center;"><strong> No se encontró ningun medicamento con ese nombre!</strong> </h5>
                            @else
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <th>NOMBRE COMERCIAL</th>
                                    <th>DROGA</th>
                                    <th>PRESENTACION</th>
                                </thead>
                                <tbody>
                                    @foreach ($vademecum as $v)
                                    <tr style="cursor: pointer;">
                                        <td class="p-0" wire:click='addRp({{ $v->id }})'> <span style="font-size: 12px;">
                                                <h5> {{ $v->nombre }} </h5>
                                            </span></td>
                                        <td class="p-0" wire:click='addRp({{ $v->id }})'> <span style="font-size: 12px;">
                                                <h5> {{ $v->droga }} </h5>
                                            </span> </td>
                                        <td class="p-0" wire:click='addRp({{ $v->id }})'> <span style="font-size: 12px;">
                                                <h5> {{ $v->presentacion }} </h5>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot id="footer-table"></tfoot>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif


    <div class="row d-flex justify-content-end">
        <a class="btn btn-warning" href="{{ route('pdf.show', $consulta->id) }}" target="_blank"> <strong>
                Descargar
            </strong></a>
    </div>
    @endif
</div>