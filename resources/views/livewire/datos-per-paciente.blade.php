<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><strong>
                    {{ mb_strtoupper($consulta->perfiles->personas->nombre) }} {{ mb_strtoupper($consulta->perfiles->personas->apellido) }}
                </strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <div class="card-body p-0" style="display: block;">
            <div class="row">
                <div class="col-2 d-flex flex-column pl-4 py-2">
                    <h6><strong>DNI: </strong>{{ $consulta->perfiles->personas->dni }}</h6>
                    <h6><strong>Edad: </strong> {{ $consulta->perfiles->personas->edad }}</h6>
                </div>


                <div class="col-3 d-flex flex-column px-1 py-2">

                    <h6>
                        <strong>Email: </strong>
                        {{ $consulta->perfiles->personas->correos->first()->direccion ?? '-' }}
                    </h6>

                    <h6>
                        <strong>Telefono: </strong>
                        {{ optional($consulta->perfiles->personas->telefonos)->first()->numero ?? '-' }}
                    </h6>


                </div>

                <div class="col-4 d-flex flex-column px-1 py-2">
                    <h6> <!-- <strong>Obra Social: </strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }} --></h6>
                    <h6>
                    <strong>Obra Social: </strong> {{ $oso->descripcion }}

                        <strong>Número de Afiliación: </strong>
<!--                         @if($consulta->perfiles && $consulta->perfiles->obrasociales && $consulta->perfiles->obrasociales->first())
                        {{ optional($consulta->perfiles->obrasociales->first()->pivot->nro_afil)->orElse('-') }}
                        @else
                        -
                        @endif -->
                        {{ $oso->nro_afil }}
                    </h6>
                </div>
                <div class="col-3 d-flex flex-column" style="display: flex; justify-content: flex-end; align-items: flex-end;">
                    <a href="" class="nav-link" style="display: flex; justify-content: flex-end;" data-toggle="modal" data-target="#modal-datos-pac">
                        <i class="fas fa-edit"></i> Completar datos de paciente
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL PARA COMPLETAR DATOS DE PACIENTE  -->
    <div class="modal fade" id="modal-datos-pac" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Completar datos de paciente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $consulta->perfiles->personas->correos->first()->direccion ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Teléfono" value="{{ optional($consulta->perfiles->personas->telefonos)->first()->numero ?? '' }}">
                            </div>
                        </div>
                    </div>
{{$oso}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="obra_social">Obra Social</label>
                                <select class="form-control" id="obra_soc" wire:model='os'>
                                    <option value="{{ $oso->id }}">{{ $oso->descripcion }}</option>

                                    @foreach ($oss as $o)
                                    <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
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
                                <input type="text" class="form-control" id="num_afiliado" placeholder="N° de Afiliado" wire:model='nroAfil'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="guardarDatos({{$oso->os_id}})">Guardar</button>

                </div>
            </div>
        </div>
    </div>
</div>