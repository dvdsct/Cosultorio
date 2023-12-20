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
                <div class="col-4 d-flex flex-column px-5 py-2">
                    <h5><strong>DNI: </strong>{{ $consulta->perfiles->personas->dni }}</h5>
                    <h5><strong>Edad: </strong> {{ \Carbon\Carbon::parse($consulta->perfiles->personas->fecha_de_nacimiento)->age }} años</h5>
                </div>
            
                <div class="col-4 d-flex flex-column px-5 py-2">
                    <h5><strong>Obra Social: </strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }}</h5>
                    <h5> <strong>N° de Obra Social: </strong> {{ $consulta->per}}</h5>
                </div>

                <div class="col-4 d-flex flex-column px-5 py-2">
                    <h5><strong>Email: </strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }}</h5>
                    <h5> <strong> Telefono: </strong> {{ $consulta->per}}</h5>
                </div>
            </div>
        </div>



    </div>
</div>