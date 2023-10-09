<div>
    <!-- MODAL  -->
    <div class="modal fade show" id="modal-default" aria-modal="true" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Turno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit='addTurno'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input_nombre">DNI</label>
                            <input type="text" class="form-control" id="nombre" wire:model='dni'
                                wire:keydown='upPaciente' placeholder="12345678">
                            {{ $persona }}
                        </div>


                        <div class="form-group">
                            <label for="input_nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" wire:model='nombre'
                                placeholder="Nombre paciente">
                        </div>

                        <div class="form-group">
                            <label for="input_obra_soc">Obra Social</label>
                            <select class="form-control" id="obra_soc" wire:model='os'>
                                @foreach ($oss as $o)
                                    <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="input_obra_soc">Abono</label>
                            <input type="text" class="form-control" id="obra_soc" wire:model='abono'
                                placeholder="Ej: IOSEP">
                        </div>
                    </div>

                </form>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
