<div>
    @if ($modal == true)

    <div class="modal fade show" id="modal-imagen" aria-labelledby="modal-default" style="display:block"
    aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title"> <strong> Nuevo pedido de Imagen </strong></h4>
                        <button type="button" class="close" wire:click='dispatch("modalImgOff")'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="add_imag">
                            <div class="row">
                                <div class="form-check">
                                    <input type="checkbox" id="todas" wire:model='todas'
                                        style="transform: scale(2.0);" wire:click='selectAll'>
                                    <label class="form-check-label pl-2" for="todas" style="cursor: pointer;">
                                        <strong>Todas</strong></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="eco" wire:model.live='eco'
                                        style="transform: scale(2.0);" wire:click='selectCat("eco")'>
                                    <label class="form-check-label pl-2" for="eco" style="cursor: pointer;">
                                        <strong>Ecografías</strong></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="eco" wire:model='tac'
                                        style="transform: scale(2.0);" wire:click='selectCat("tac")'>>
                                    <label class="form-check-label pl-2" for="eco" style="cursor: pointer;">
                                        <strong>tac</strong></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="rnm" wire:model='rnm'
                                        style="transform: scale(2.0);" wire:click='selectCat("rnm")'>>
                                    <label class="form-check-label pl-2" for="rnm" style="cursor: pointer;">
                                        <strong>rnm</strong></label>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Ecografias --}}
                                <div class="col-md-4">

                                    <div class="form-check">
                                        <input type="checkbox" id="eco_gin" wire:model='eco_gin'
                                            style="transform: scale(1.5);" wire:click='checkItem("eco","eco_gin")'>
                                        <label class="form-check-label pl-2" for="eco_gin"
                                            style="cursor: pointer;">Ecografía Ginecologica {{ $eco_gin }} </label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="eco_obs" wire:model='eco_obs'
                                            style="transform: scale(1.5);" wire:click='checkItem("eco","2")'>
                                        <label class="form-check-label pl-2" for="eco_obs"
                                            style="cursor: pointer;">Ecografía Obstetrica</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="eco_abd" wire:model='eco_abd'
                                            style="transform: scale(1.5);" wire:click='checkItem("eco","3")'>
                                        <label class="form-check-label pl-2" for="eco_abd"
                                            style="cursor: pointer;">Ecografía Abdominal</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="eco_tiro" wire:model='eco_tiro'
                                            style="transform: scale(1.5);" wire:click='checkItem("eco","4")'>
                                        <label class="form-check-label pl-2" for="eco_tiro"
                                            style="cursor: pointer;">Ecografía Tiroidea</label>
                                    </div>
                                </div>



                                {{-- TAC --}}

                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input type="checkbox" id="tac_abdo" wire:model='tac_abd'
                                            style="transform: scale(1.5);" wire:click='checkItem("tac","tac_abd")'>
                                        <label class="form-check-label pl-2" for="tac_abdo" style="cursor: pointer;">TAC
                                            Abdominal</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="tac_pel" wire:model='tac_pel'
                                            style="transform: scale(1.5);" wire:click='checkItem("tac","tac_pel")'>
                                        <label class="form-check-label pl-2" for="tac_pel" style="cursor: pointer;">TAC
                                            Pelviana</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="tac_abd_cc" wire:model='tac_abd_cc'
                                            style="transform: scale(1.5);" wire:click='checkItem("tac","tac_abd_cc")'>
                                        <label class="form-check-label pl-2" for="tac_abd_cc"
                                            style="cursor: pointer;">TAC
                                            Abdominal (Con contraste)</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="tac_pel_cc" wire:model='tac_pel_cc'
                                            style="transform: scale(1.5);" wire:click='checkItem("tac","tac_pel_cc")'>
                                        <label class="form-check-label pl-2" for="tac_pel_cc"
                                            style="cursor: pointer;">TAC
                                            Pelviana (Con contraste)</label>
                                    </div>
                                </div>


                                {{-- RMN --}}
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" id="RMN" wire:model='rmn_pelv'
                                            style="transform: scale(1.5);" wire:click='checkItem("rnm","5")'>
                                        <label class="form-check-label pl-2" for="RMN" style="cursor: pointer;">RMN
                                            Pelviana</label>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='dispatch("modalImgOff")'>Cancelar</button>
                        <button type="submit" class="btn btn-secondary">Aceptar</button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    @endif
</div>
