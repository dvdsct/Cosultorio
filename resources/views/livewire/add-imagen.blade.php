<div>
    <div class="modal fade" id="modal-imagen" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"> <strong> Nuevo pedido de Imagen </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit="add_imag">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" wire:model='eco_gin'>
                                    <label class="form-check-label">Eco Ginecologica</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='eco_obs'>
                                    <label class="form-check-label">Eco Obstetrica</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='eco_abd'>
                                    <label class="form-check-label">Eco Abdominal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='eco_tiro'>
                                    <label class="form-check-label">Eco Tiroidea</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" wire:model='rmn_pelv'>
                                    <label class="form-check-label">RMN Pelviana</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" wire:model='tac_abd'>
                                    <label class="form-check-label">TAC Abdominal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='tac_pel'>
                                    <label class="form-check-label">TAC Pelviana</label>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-secondary">Aceptar</button>
                </div>
            </div>
            </form>

        </div>

    </div>
</div>