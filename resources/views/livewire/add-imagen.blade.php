<div>
    <table>

        @if ($modal == true)
        <div class="modal fade show" id="modal-imagen" aria-labelledby="modal-default" style="background-color: rgba(0, 0, 0, 0.5); display:block" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title"> <strong> PEDIDOS DE IMAGENES </strong></h4>
                        <button type="button" class="close" wire:click='dispatch("modalImgOff")'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($pedidoForm)
                        <div class="col-md-12">
                            <label for=""> <strong> Seleccione un diagnostico CIE 10: </strong> </label>
                            <select class="form-control" wire:model='cie10'>
                                @foreach ($cie10s as $c)
                                <option value="{{ $c->id }}">{{ $c->descripcion . ' - ' . $c->codigo }}
                                </option>
                                @endforeach
                            </select>
                            <div class="text-red" style="font-weight: bold;">
                                @error('cie10')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row pt-4 pl-2 pb-1">
                            <div class="form-check">
                                <input type="checkbox" id="todas" wire:model='todas' style="transform: scale(1.5);" wire:click='selectAll'>
                                <label class="form-check-label pl-2" for="todas" style="cursor: pointer;">
                                    <strong>TODAS</strong></label>
                            </div>
                        </div>

                        <div class="row p-2 pl-2">
                            <div class="form-check col-md-4">
                                <input type="checkbox" id="eco" wire:model.live='eco' style="transform: scale(1.5);" wire:click='selectCat("eco")'>
                                <label class="form-check-label pl-2" for="eco" style="cursor: pointer;">
                                    <strong>Ecografías </strong></label>
                            </div>
                            <div class="form-check col-md-5">
                                <input type="checkbox" id="tac" wire:model='tac' style="transform: scale(1.5);" wire:click='selectCat("tac")'>
                                <label class="form-check-label pl-2" for="tac" style="cursor: pointer;">
                                    <strong>Tomografías Abdominales y Pélvicas</strong></label>
                            </div>
                            <div class="form-check col-md-3">
                                <input type="checkbox" id="rnm" wire:model='rnm' style="transform: scale(1.5);" wire:click='selectCat("rnm")'>
                                <label class="form-check-label pl-2" for="rnm" style="cursor: pointer;">
                                    <strong>Resonancia Magnética Pélvica</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Ecografias --}}
                            <div class="col-md-4">

                                <div class="form-check">
                                    <input type="checkbox" id="eco_gin" wire:model='eco_gin' style="transform: scale(1.5);" wire:click='checkItem("eco","eco_gin")'>
                                    <label class="form-check-label pl-2" for="eco_gin" style="cursor: pointer;">Ecografía Ginecologica <!-- {{ $eco_gin }} -->
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_obs" wire:model='eco_obs' style="transform: scale(1.5);" wire:click='checkItem("eco","eco_obs")'>
                                    <label class="form-check-label pl-2" for="eco_obs" style="cursor: pointer;">Ecografía Obstetrica</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_abd" wire:model='eco_abd' style="transform: scale(1.5);" wire:click='checkItem("eco","eco_abd")'>
                                    <label class="form-check-label pl-2" for="eco_abd" style="cursor: pointer;">Ecografía Abdominal</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="eco_tiro" wire:model='eco_tiro' style="transform: scale(1.5);" wire:click='checkItem("eco","eco_tiro")'>
                                    <label class="form-check-label pl-2" for="eco_tiro" style="cursor: pointer;">Ecografía Tiroidea</label>
                                </div>
                            </div>



                            {{-- TAC --}}

                            <div class="col-md-5">
                                <div class="form-check pl-3">
                                    <input type="checkbox" id="tac_abdo" wire:model='tac_abd' style="transform: scale(1.5);" wire:click='checkItem("tac","tac_abd")'>
                                    <label class="form-check-label pl-2" for="tac_abdo" style="cursor: pointer;">TAC
                                        Abdominal</label>
                                </div>

                                <div class="form-check pl-3">
                                    <input type="checkbox" id="tac_pel" wire:model='tac_pel' style="transform: scale(1.5);" wire:click='checkItem("tac","tac_pel")'>
                                    <label class="form-check-label pl-2" for="tac_pel" style="cursor: pointer;">TAC
                                        Pelviana</label>
                                </div>

                                <div class="form-check pl-3">
                                    <input type="checkbox" id="tac_abd_cc" wire:model='tac_abd_cc' style="transform: scale(1.5);" wire:click='checkItem("tac","tac_abd_cc")'>
                                    <label class="form-check-label pl-2" for="tac_abd_cc" style="cursor: pointer;">TAC
                                        Abdominal (Con contraste)</label>
                                </div>

                                <div class="form-check pl-3">
                                    <input type="checkbox" id="tac_pel_cc" wire:model='tac_pel_cc' style="transform: scale(1.5);" wire:click='checkItem("tac","tac_pel_cc")'>
                                    <label class="form-check-label pl-2" for="tac_pel_cc" style="cursor: pointer;">TAC
                                        Pelviana (Con contraste)</label>
                                </div>
                            </div>


                            {{-- RMN --}}
                            <div class="col-md-3">
                                <div class="form-check pl-2">
                                    <input type="checkbox" id="RMN" wire:model='rmn_pelv' style="transform: scale(1.5);" wire:click='checkItem("rnm","5")'>
                                    <label class="form-check-label pl-2" for="RMN" style="cursor: pointer;">RMN
                                        Pelviana</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='dispatch("modalImgOff")'>Cancelar</button>
                        <button type="submit" class="btn btn-secondary" wire:click='save_img("pedido")'>Aceptar</button>
                    </div>

                    @endif
                    @if ($cargaForm)

                    <div class="form-group">
                        <label for="obs">Observaciones:</label>
                        <textarea class="form-control" rows="3" placeholder="Descripcion de los resultados.." wire:model='observaciones' id="obs"></textarea>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click='dispatch("modalImgOff")'>Cancelar</button>
                    <button type="submit" class="btn btn-secondary" wire:click='save_img("carga")'>Aceptar</button>
                </div>
                @endif
            </div>
        </div>
</div>
@endif
</div>