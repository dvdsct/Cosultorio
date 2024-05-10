<div>
    @if ($modalMedico)
    <div class="modal fade show" id="modal-default" wire:ignore.self style="padding-right: 17px; display: block;">
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
                                {{ $m->perfiles->personas->nombre }}
                            </option>
                            @endforeach
                        </select>
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
    <div class="row">
        <div class="col-6">
            <div class="small-box bg-info">
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Paciente <i class="fas fa-user"></i></a>
                <div class="inner">
                    <h3> {{ $consulta->pacientes->personas->dni }} - {{ $paciente->perfiles->personas->nombre }} {{ $paciente->perfiles->personas->apellido }}</h3>
              
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="small-box bg-info">
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Medico <i class="fas fa-user-md"></i></a>
                <div class="inner">
                    <h3>{{ $medico->nombre }}</h3>
                    <p>{{ $medico->matricula }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    </div>


    @livewire('recetar', ['consulta' => $consulta])
    <div class="row d-flex justify-content-end">
        <a class="btn btn-info" href="{{ route('pdf.show', $consulta->id) }}" target="_blank">Enviar</a>
    </div>
    @endif
</div>