<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><strong>
                    {{ mb_strtoupper($consulta->pacientes->perfiles->personas->apellido) }}
                    {{ mb_strtoupper($consulta->pacientes->perfiles->personas->nombre) }}
                </strong></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="px-4 py-2 card-body" style="display: block;">
            <div class="row">
                <div class="col-md-2 d-flex flex-column">
                    <h6><strong>DNI: </strong>{{ $consulta->pacientes->perfiles->personas->dni }}</h6>
                    <h6><strong>Edad: </strong> {{ $consulta->pacientes->perfiles->personas->edad }}</h6>
                </div>


                <div class="col-md-3 d-flex flex-column">
                    <h6>
                        <strong>Email: </strong>
                        {{ $email->direccion ?? '' }}
                    </h6>

                    <h6>
                        <strong>Telefono: </strong>
                        {{ $telefono->numero ?? '' }}
                    </h6>
                </div>

                <div class="col-md-4 d-flex flex-column">
                    <h6>
                        <strong>Obra Social: </strong> {{ $oso->obrasocialesx->descripcion ?? '' }}
                    </h6>


                    <h6>
                        <strong>Número de Afiliación: </strong>
                        {{ $oso->nro_afil ?? ''}}
                    </h6>
                </div>
                <div class="col-md-3 d-flex flex-column" style="display: flex; justify-content: flex-end; align-items: flex-end; cursor:pointer;">
                    <a class="nav-link" style="display: flex; justify-content: flex-end;" wire:click='dispatch("modalDPOn")'>
                        <i class="fas fa-edit"></i> Completar datos de paciente
                    </a>
                </div>

            </div>
        </div>
    </div>

    @if ($modalDP)


    <!-- MODAL PARA COMPLETAR DATOS DE PACIENTE  -->
    <div class="modal fade show" id="modal-datos-pac" aria-labelledby="modal-default" style="background-color: rgba(0, 0, 0, 0.5); display:block" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"> <strong> COMPLETAR DATOS DE PACIENTE </strong> </h4>
                    <button type="button" class="close" wire:click='modalDatoPac'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" placeholder="Apellido" wire:model="apellido">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" wire:model='nombre'>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento" wire:model='nacimiento'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" placeholder="DNI" wire:model='dni'>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Emails --}}
                        @if ($emailForm)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" wire:model='emailEdit'>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="d-flex align-items-center">
                                    <select class="form-control mr-2" id="email" wire:model='emailEdit'>
                                        @foreach ($emails as $e)
                                        <option value="{{ $e->id }}">{{ $e->direccion }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-secondary" wire:click='addEmail' id="button-addon2">Actualizar</button>
                                </div>
                            </div>
                        </div>
                        @endif



                        {{-- End Emails --}}


                        {{-- Telefonos --}}
                        @if ($telForm)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Teléfono" wire:model='nTelefono'>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <div class="d-flex align-items-center">
                                    <select class="form-control mr-2" id="telefono" wire:model='nTelefono'>
                                        @foreach ($telefonos as $tel)
                                        <option value="{{ $tel->id }}">{{ $tel->numero }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-secondary" wire:click='addTel' id="button-addon2">Actualizar</button>
                                </div>
                            </div>
                        </div>
                        @endif


                        {{-- End Telefonos --}}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="obra_social">Obra Social</label>
                                <select class="form-control" id="obra_soc" wire:model='os'>
                                    {{-- <option selected value="{{ $os->obra_social_id }}">{{ $os->obrasocialesx->descripcion }}</option> --}}

                                    @foreach($oss as $oscial)
                                    <option value="{{ $oscial->id }}">{{ $oscial->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="plan">Plan</label>
                                <input type="text" class="form-control" id="plan" placeholder="Plan" wire:model='plan'>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num_afiliado">N° de Afiliado</label>
                                <input type="text" class="form-control" id="num_afiliado" placeholder="N° de Afiliado" wire:model='nroAfi'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click='modalDatoPac'>Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="guardarDatos()">Guardar</button>

                </div>
            </div>
        </div>
    </div>
    @endif

</div>