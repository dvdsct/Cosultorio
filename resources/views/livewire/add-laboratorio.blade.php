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
                            <div class="col-md-4 border rounded">
                                <div class="form-check">
                                    <input type="checkbox" id="hemo" wire:model='hemo'>
                                    <label class="form-check-label" for="hemo" style="cursor: pointer;">Hemograma</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="hb" wire:model='hb'>
                                    <label class="form-check-label" for="hb" style="cursor: pointer;">Hb</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="hto" wire:model='hto'>
                                    <label class="form-check-label" for="hto" style="cursor: pointer;">Hto</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="glu" wire:model='glucem'>
                                    <label class="form-check-label" for="glu" style="cursor: pointer;">Glucemia</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ptog" wire:model='ptog'>
                                    <label class="form-check-label" for="ptog" style="cursor: pointer;">PTOG</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="hb_glico" wire:model='hb_glico'>
                                    <label class="form-check-label" for="hb_glico" style="cursor: pointer;">Hb Glicosilada</label>
                                </div>

<!--                                 <div class="form-check">
                                    <input type="checkbox" id="grupo" wire:model='grupo'>
                                    <label class="form-check-label" for="grupo" style="cursor: pointer;">Grupo</label>
                                </div> -->

                                <div class="form-check">
                                    <input type="checkbox" id="factor_rh" wire:model='factor_rh'>
                                    <label class="form-check-label" for="factor_rh" style="cursor: pointer;">Grupo Factor RH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="orina" wire:model='orina'>
                                    <label class="form-check-label" for="orina" style="cursor: pointer;">Orina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="urocult" wire:model='urocult'>
                                    <label class="form-check-label" for="urocult" style="cursor: pointer;">Urocultivo</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="fibrino" wire:model='fibrino'>
                                    <label class="form-check-label" for="fibrino" style="cursor: pointer;">Fibrinogeno</label>
                                </div>
                                <!-- Cambiar de nombre de Flujo Vaginal por Exudado Vaginal -->
                                <div class="form-check">
                                    <input type="checkbox" id="flujo_vag" wire:model='flujo_vag'>
                                    <label class="form-check-label" for="flujo_vag" style="cursor: pointer;">Ex. vaginal y cultivo de flujo</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="coag" wire:model='coagulogram'>
                                    <label class="form-check-label" for="coag" style="cursor: pointer;">Coagulograma</label>
                                </div>
                            </div>

                            <div class="col-md-4 border rounded">
                                <div class="form-check">
                                    <input type="checkbox" id="tsh" wire:model='tsh'>
                                    <label class="form-check-label" for="tsh" style="cursor: pointer;">TSH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="fsh" wire:model='fsh'>
                                    <label class="form-check-label" for="fsh" style="cursor: pointer;">FSH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="lh" wire:model='lh'>
                                    <label class="form-check-label" for="lh" style="cursor: pointer;">LH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="dhea" wire:model='dhea'>
                                    <label class="form-check-label" for="dhea" style="cursor: pointer;">DHEA</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="test_l" wire:model='testost_l'>
                                    <label class="form-check-label" for="test_l" style="cursor: pointer;">Testost Libre</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="test_b" wire:model='testost_b'>
                                    <label class="form-check-label" for="test_b" style="cursor: pointer;">Testost Biod</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="h_anti" wire:model='h_antimull'>
                                    <label class="form-check-label" for="h_anti" style="cursor: pointer;">H. Antimulleriana</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ferritina" wire:model='ferritina'>
                                    <label class="form-check-label" for="ferritina" style="cursor: pointer;">Ferritina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="transf" wire:model='transferri'>
                                    <label class="form-check-label" for="transf" style="cursor: pointer;">Transferrina</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="anti_ttg" wire:model='anti_ttg'>
                                    <label class="form-check-label" for="anti_ttg" style="cursor: pointer;">Anti TTG</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="gliadina" wire:model='gliadina'>
                                    <label class="form-check-label" for="gliadina" style="cursor: pointer;">Gliadina</label>
                                </div>
                            </div>

                            <div class="col-md-4 border rounded">
                                <div class="form-check">
                                    <input type="checkbox" id="chagas" wire:model='chagas'>
                                    <label class="form-check-label" for="chagas" style="cursor: pointer;">Chagas</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="toxo" wire:model='toxo'>
                                    <label class="form-check-label" for="toxo" style="cursor: pointer;">Toxoplasm</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="vdrl" wire:model='vdrl_cual'>
                                    <label class="form-check-label" for="vdrl" style="cursor: pointer;">VDRL Cual</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="hbs" wire:model='hbs_ag'>
                                    <label class="form-check-label" for="hbs" style="cursor: pointer;">HBsAg</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="hiv" wire:model='hiv'>
                                    <label class="form-check-label" for="hiv" style="cursor: pointer;">HIV</label>
                                </div>
<!-- AGREGAR EN LA BASE Y CORREGIR MODELO CMV IgG -->
                                <div class="form-check">
                                    <input type="checkbox" id="cmv_igg">
                                    <label class="form-check-label" for="cmv_igg" style="cursor: pointer;">CMV IgG</label>
                                </div>
<!-- AGREGAR EN LA BASE Y CORREGIR MODELO CMV IgM -->
                                <div class="form-check">
                                    <input type="checkbox" id="cmv_igm" >
                                    <label class="form-check-label" for="cmv_igm" style="cursor: pointer;">CMV IgM</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ag_chla">
                                    <label class="form-check-label" for="ag_chla" style="cursor: pointer;">Ag Chlamidia trachomatis</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="microplasma">
                                    <label class="form-check-label" for="microplastma" style="cursor: pointer;">Micoplasma hominis Ag</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ureaplasma" >
                                    <label class="form-check-label" for="ureaplasma" style="cursor: pointer;">Ureaplasma ureliticum Ag</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="lysteria">
                                    <label class="form-check-label" for="lysteria" style="cursor: pointer;">Lysteria monocitogenes Ag</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="gluco" wire:model='glucosuria'>
                                    <label class="form-check-label" for="fluco" style="cursor: pointer;">Glucosuria</label>
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