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
                                    <input type="checkbox" id="eco_gin" wire:model='eco_gin' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="eco_gin" style="cursor: pointer;">Ecografía Ginecologica</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_obs" wire:model='eco_obs' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="eco_obs" style="cursor: pointer;">Ecografía Obstetrica</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_abd" wire:model='eco_abd' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="eco_abd" style="cursor: pointer;">Ecografía Abdominal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_tiro" wire:model='eco_tiro' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="eco_tiro" style="cursor: pointer;">Ecografía Tiroidea</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" id="RMN" wire:model='rmn_pelv' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="RMN" style="cursor: pointer;">RMN Pelviana</label>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-check">
                                    <input type="checkbox" id="tac_abdo" wire:model='tac_abd' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="tac_abdo" style="cursor: pointer;">TAC Abdominal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="tac_pel" wire:model='tac_pel' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" for="tac_pel" style="cursor: pointer;">TAC Pelviana</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='tac_abd' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" style="cursor: pointer;">TAC Abdominal (Con contraste)</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='tac_pel' style="transform: scale(1.5);">
                                    <label class="form-check-label pl-2" style="cursor: pointer;">TAC Pelviana (Con contraste)</label>
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