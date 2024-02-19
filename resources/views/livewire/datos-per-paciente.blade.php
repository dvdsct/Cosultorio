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
                    <h6> <strong>Obra Social: </strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }}</h6>
                    <h6>
                        <strong>Número de Afiliación: </strong>
                        @if($consulta->perfiles && $consulta->perfiles->obrasociales && $consulta->perfiles->obrasociales->first())
                        {{ optional($consulta->perfiles->obrasociales->first()->pivot->nro_afil)->orElse('-') }}
                        @else
                        -
                        @endif
                    </h6>
                </div>

                <div class="col-3 d-flex flex-column">
                    <a href="" class="nav-link mt-auto">Completar datos de paciente</a>
                </div>
            </div>
        </div>



    </div>
</div>