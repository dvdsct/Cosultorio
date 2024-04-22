<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><strong>
                    {{ mb_strtoupper($consulta->pacientes->personas->nombre) }}
                    {{ mb_strtoupper($consulta->pacientes->personas->apellido) }}
                </strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <div class="card-body py-2 px-4" style="display: block;">
            <div class="row">
                <div class="col-md-2 d-flex flex-column">
                    <h6><strong>DNI: </strong>{{ $consulta->pacientes->personas->dni }}</h6>
                    <h6><strong>Edad: </strong> {{ $consulta->pacientes->personas->edad }}</h6>
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
                        <strong>Obra Social: </strong> {{ $oso->descripcion }}
                    </h6>

                    <h6>
                        <strong>Número de Afiliación: </strong>
                        {{ $oso->nro_afil }}
                    </h6>
                </div>
                @can('admin')
                    <div class="col-md-3 d-flex flex-column"
                        style="display: flex; justify-content: flex-end; align-items: flex-end;">
                        <a class="nav-link" style="display: flex; justify-content: flex-end;" wire:click='modalDatoPac'>
                            <i class="fas fa-edit"></i> Completar datos de paciente
                        </a>
                    </div>
                @endcan


            </div>
        </div>
    </div>
    @can('admin')

        @if ($modalDP)


            <!-- MODAL PARA COMPLETAR DATOS DE PACIENTE  -->
            <div class="modal fade show" id="modal-datos-pac" aria-labelledby="modal-default" style="display:block"
                aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Completar datos de paciente</h4>
                            <button type="button" class="close" wire:click='modalDatoPac'>
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" placeholder="Apellido"
                                            wire:model="apellido">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre"
                                            wire:model='nombre'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento"
                                            placeholder="Fecha de nacimiento" wire:model='nacimiento'>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control" id="dni" placeholder="DNI"
                                            wire:model='dni'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Emails --}}
                                @if ($emailForm)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email"
                                                wire:model='emailEdit'>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <select class="form-control" id="email" wire:model='emailEdit'>

                                                @foreach ($emails as $e)
                                                    <option value="{{ $e->id }}">{{ $e->direccion }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" wire:click='addEmail'
                                                id="button-addon2">Button</button>

                                        </div>

                                    </div>
                                @endif



                                {{-- End Emails --}}


                                {{-- Telefonos --}}
                                @if ($telForm)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" placeholder="Teléfono"
                                                wire:model='nTelefono'>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <select class="form-control" id="telefono" wire:model='nTelefono'>

                                                @foreach ($telefonos as $tel)
                                                    <option value="{{ $tel->id }}">{{ $tel->numero }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" wire:click='addTel'
                                                id="button-addon2">Button</button>

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
                                            <option selected value="{{ $oso->id }}">{{ $oso->descripcion }}</option>

                                            @foreach ($oss as $o)
                                                <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="plan">Plan</label>
                                        <input type="text" class="form-control" id="plan" placeholder="Plan"
                                            wire:model='plan'>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="num_afiliado">N° de Afiliado</label>
                                        <input type="text" class="form-control" id="num_afiliado"
                                            placeholder="N° de Afiliado" wire:model='nroAfil'>
                                    </div>
                                </div>
                                {{ $oso }}
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" wire:click='modalDatoPac'>Cerrar</button>
                            <button type="button" class="btn btn-primary"
                                wire:click="guardarDatos({{ $oso->os_id }})">Guardar</button>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endcan

</div>
