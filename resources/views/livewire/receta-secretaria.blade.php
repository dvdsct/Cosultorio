<div>
    @if ($modalMedico)
        <div class="modal fade show" id="modal-default" wire:ignore.self style="padding-right: 17px; display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" wire:click='modalMedicoOnOff'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="medico">Medico</label>
                            <select class="form-control" wire:model='medico'>
                                <option selected> Elija un medico</option>
                                @foreach ($medicos as $m)
                                    <option value="{{ $m->id }}">
                                        {{ $m->perfiles->personas->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-default" wire:click='modalMedicoOnOff'>Close</button>
                        <button class="btn btn-primary" wire:click='selMed'>Save changes</button>
                    </div>
                </div>

            </div>

        </div>
    @else
        <div class="row">
            <div class="col">

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $paciente->perfiles->personas->nombre }} {{ $paciente->perfiles->personas->apellido }}</h3>
                            <p>{{ $medico->matricula }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>            </div>
            <div class="col">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $medico->nombre }}</h3>
                            <p>{{ $medico->matricula }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
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
