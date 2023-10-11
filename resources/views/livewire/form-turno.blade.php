<div>
    <!-- MODAL  -->
    {{$fecha}}

    <div class="modal fade show" id="modal-default" aria-modal="true" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-weight: bold;">Nuevo turno para el {{$fecha}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit='addTurno'>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_horario">Horario</label>
                                    <input type="time" class="form-control" id="horario" wire:model='horario'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_dni">DNI</label>
                                    <input type="text" class="form-control" id="dni" wire:model='dni' wire:keydown='upPaciente' placeholder="12345678">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="input_nombre">Paciente</label>
                                    <input type="text" class="form-control" id="nombre" wire:model='nombre' placeholder="Nombre paciente">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="input_obra_soc">Obra Social</label>
                                    <select class="form-control" id="obra_soc" wire:model='os'>
                                        @foreach ($oss as $o)
                                        <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_abono">Abono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="abono" wire:model='abono' value="$">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_motivo">Motivo</label>
                                    <select class="form-control" id="motivo" wire:model='motivo'>
                                        <option value="consulta">Consulta</option>
                                        <option value="PAP">PAP</option>
                                        <option value="Colposcopia">Colposcopia</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                </form>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>