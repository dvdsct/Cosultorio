<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Datos Personales</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <div class="card-body p-0" style="display: block;">

            <div class="row">
                <div class="col-4 d-flex flex-column px-5">
                    <span ><strong>Nombre:</strong>{{ $consulta->perfiles->personas->nombre }} {{ $consulta->perfiles->personas->apellido }}
                    </span>
                    <span ><strong>DNI</strong>{{ $consulta->perfiles->personas->dni }}</span>
                    <span ><strong>Edad</strong> {{ \Carbon\Carbon::parse($consulta->perfiles->personas->fecha_de_nacimiento)->age }} años</span>
                    <span ><strong>Obra Social:</strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }}
                    </span>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
            </div>
        </div>



    </div></div>
