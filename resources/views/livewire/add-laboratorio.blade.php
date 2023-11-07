<div>
    <div class="modal fade" id="modal-laboratorio" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title"> <strong>Nuevo pedido de laboratorio </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit="add_lab">
                        <div class="form-check">
                            <input type="checkbox" wire:model='todas' wire:click='selectAll'>
                            <label class="form-check-label">Todas</label>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" checked='' wire:model='hemo'>
                                    <label class="form-check-label">Hemograma</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='hb'>
                                    <label class="form-check-label">Hb</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='hto'>
                                    <label class="form-check-label">Hto</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='glucem'>
                                    <label class="form-check-label">Glucemia</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='ptog'>
                                    <label class="form-check-label">PTOG</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='hb_glico'>
                                    <label class="form-check-label">Hb Glicosilada</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='grupo'>
                                    <label class="form-check-label">Grupo</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='factor_rh'>
                                    <label class="form-check-label">Factor RH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='orina'>
                                    <label class="form-check-label">Orina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='urocult'>
                                    <label class="form-check-label">Urocultivo</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='fibrino'>
                                    <label class="form-check-label">Fibrinogeno</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='flujo_vag'>
                                    <label class="form-check-label">Flujo Vaginal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='coagulogram'>
                                    <label class="form-check-label">Coagulograma</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" wire:model='tsh'>
                                    <label class="form-check-label">TSH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='fsh'>
                                    <label class="form-check-label">FSH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='lh'>
                                    <label class="form-check-label">LH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='dhea'>
                                    <label class="form-check-label">DHEA</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='testost_l'>
                                    <label class="form-check-label">Testost Libre</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='testost_b'>
                                    <label class="form-check-label">Testost Biod</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='h_antimull'>
                                    <label class="form-check-label">H. Antimulleriana</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='ferritina'>
                                    <label class="form-check-label">Ferritina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='transferri'>
                                    <label class="form-check-label">Transferrina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='anti_ttg'>
                                    <label class="form-check-label">Anti TTG</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='gliadina'>
                                    <label class="form-check-label">Gliadina</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" wire:model='chagas'>
                                    <label class="form-check-label">Chagas</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='toxo'>
                                    <label class="form-check-label">Toxoplasm</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='vdrl_cual'>
                                    <label class="form-check-label">VDRL Cual</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='hbs_ag'>
                                    <label class="form-check-label">HBsAg</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='hiv'>
                                    <label class="form-check-label">HIV</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" wire:model='glucosuria'>
                                    <label class="form-check-label">Glucosuria</label>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-secondary">Aceptar</button>
                </div>
                </form>
            </div>

        </div>

    </div>
</div>