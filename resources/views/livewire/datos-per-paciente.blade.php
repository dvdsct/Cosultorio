<div >
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><strong> {{ $consulta->perfiles->personas->nombre }} {{ $consulta->perfiles->personas->apellido }} </strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>

        <div class="card-body p-0" style="display: block;">

            <div class="row">
                <div class="col-6 d-flex flex-column px-5 border-right py-2" >
                    <span ><strong>DNI: </strong>{{ $consulta->perfiles->personas->dni }}</span>
                    <span ><strong>Edad: </strong> {{ \Carbon\Carbon::parse($consulta->perfiles->personas->fecha_de_nacimiento)->age }} años</span>
                    <span ><strong>Obra Social: </strong> {{ $consulta->perfiles->obrasociales->first()->descripcion }}
                    </span>
                    <span> <strong>N° de Obra Social: </strong> {{ $consulta->per}}</span>
                </div>
                <hr>
                <div class="col-6">

                </div>
            </div>
        </div>


    
    </div></div>
    