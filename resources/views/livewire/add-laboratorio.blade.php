<div>

    @if ($modalLab)

        <div class="modal fade show" id="modal-imagen" aria-labelledby="modal-default"
            style="background-color: rgba(0, 0, 0, 0.5); display:block" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title"> <strong>Nuevo pedido de laboratorio </strong></h4>
                        <button type="button" class="close" wire:click='dispatch("modalLabOn")' aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12">
                            <!-- CIE 10 PARA REPARAR  -->
                            <select class="form-control" wire:model='cie10'>
                                @foreach ($cie10s as $c)
                                    <option value="{{ $c->id }}">{{ $c->descripcion . ' - ' . $c->codigo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check ">
                            <input type="checkbox" wire:model='todas' wire:click='selectAll'>
                            <label class="form-check-label">Todas</label>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-12">

                                    <div class="form-check">
                                        <input type="checkbox" id="general" wire:model='e_gral'
                                            wire:click="checkCat('general')" style="transform: scale(1.5);">
                                        <label class="pl-2" for="general" style="cursor: pointer;">
                                            <strong>Evaluacion General y Hematológica </strong></label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="hemo" wire:model='hemo'
                                            wire:click='checkItem("general","hemo")'>
                                        <label class="form-check-label" for="hemo"
                                            style="cursor: pointer;">Hemograma</label>
                                    </div>


                                    <div class="form-check">
                                        <input type="checkbox" id="hb" wire:model='hb'
                                            wire:click='checkItem("general","hb")'>
                                        <label class="form-check-label" for="hb"
                                            style="cursor: pointer;">Hemoglobina (Hb)</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="hto" wire:model='hto'
                                            wire:click='checkItem("general","hto")'>
                                        <label class="form-check-label" for="hto"
                                            style="cursor: pointer;">Hematocrito (Hto)</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="glu" wire:model='glucem'
                                            wire:click='checkItem("general","glucem")'>
                                        <label class="form-check-label" for="glu"
                                            style="cursor: pointer;">Glucemia</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="ptog" wire:model='ptog'
                                            wire:click='checkItem("general","ptog")'>
                                        <label class="form-check-label" for="ptog"
                                            style="cursor: pointer;">PTOG</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="hb_glico" wire:model='hb_glico'
                                            wire:click='checkItem("general","hb_glico")'>
                                        <label class="form-check-label" for="hb_glico"
                                            style="cursor: pointer;">Hemoglobina glicosilada</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="factor_rh" wire:model='factor_rh'
                                            wire:click='checkItem("general","factor_rh")'>
                                        <label class="form-check-label" for="factor_rh" style="cursor: pointer;">Grupo
                                            sanguíneo y factor RH</label>
                                    </div>
                                </div>

                                <br>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" id="renal" wire:model='e_renal'
                                            wire:click='checkCat("renal")' style="transform: scale(1.5);">
                                        <label class="pl-2" for="renal" style="cursor: pointer;"><strong>
                                                Evaluacion de la funcion renal y Urinaria </strong></label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="orina" wire:model='orina'
                                            wire:click='checkItem("renal","orina")'>
                                        <label class="form-check-label" for="orina"
                                            style="cursor: pointer;">Orina</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="urocult" wire:model='urocult'
                                            wire:click='checkItem("renal","urocult")'>
                                        <label class="form-check-label" for="urocult"
                                            style="cursor: pointer;">Urocultivo</label>
                                    </div>
                                </div>
                            </div>
                            {{-- Categoria Gine --}}
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" id="gine" wire:model='e_gine'
                                        wire:click='checkCat("gine")' style="transform: scale(1.5);">
                                    <label class="pl-2" for="gine" style="cursor: pointer;"><strong> Evaluacion
                                            Ginecológica</strong></label>
                                </div>
                                {{-- Items Ginecologica --}}
                                <div class="form-check">
                                    <input type="checkbox" id="fibrino" wire:model='fibrino'
                                        wire:click='checkItem("gine","fibrino")'>
                                    <label class="form-check-label" for="fibrino"
                                        style="cursor: pointer;">Fibrinógeno</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="flujo_vag" wire:model='flujo_vag'
                                        wire:click='checkItem("gine","fibrino")'>
                                    <label class="form-check-label" for="flujo_vag" style="cursor: pointer;">Exudado
                                        vaginal y cultivo</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="coag" wire:model='coagulogram'
                                        wire:click='checkItem("gine","coagulogram")'>
                                    <label class="form-check-label" for="coag"
                                        style="cursor: pointer;">Coagulograma</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="tsh" wire:model='tsh'
                                        wire:click='checkItem("gine","tsh")'>
                                    <label class="form-check-label" for="tsh"
                                        style="cursor: pointer;">TSH</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="fsh" wire:model='fsh'
                                        wire:click='checkItem("gine","fsh")'>
                                    <label class="form-check-label" for="fsh" style="cursor: pointer;">FSH
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="lh" wire:model='lh'
                                        wire:click='checkItem("gine","lh")'>
                                    <label class="form-check-label" for="lh" style="cursor: pointer;">LH
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="dhea" wire:model='dhea'
                                        wire:click='checkItem("gine","dhea")'>
                                    <label class="form-check-label" for="dhea" style="cursor: pointer;">DHEA
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="test_l" wire:model='testost_l'
                                        wire:click='checkItem("gine","testost_l")'>
                                    <label class="form-check-label" for="test_l"
                                        style="cursor: pointer;">Testosterona libre</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="test_b" wire:model='testost_b'
                                        wire:click='checkItem("gine","testost_b")'>
                                    <label class="form-check-label" for="test_b"
                                        style="cursor: pointer;">Testosterona biodisponible</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="h_anti" wire:model='h_antimull'
                                        wire:click='checkItem("gine","h_antimull")'>
                                    <label class="form-check-label" for="h_anti" style="cursor: pointer;">H.
                                        Antimulleriana</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ag_chla" wire:model='ag_chlamidia'
                                        wire:click='checkItem("gine","ag_chlamidia")'>
                                    <label class="form-check-label" for="ag_chla" style="cursor: pointer;">Ag
                                        Chlamidia trachomatis</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="microplasma" wire:model='microplasma'
                                        wire:click='checkItem("gine","microplasma")'>
                                    <label class="form-check-label" for="microplastma"
                                        style="cursor: pointer;">Micoplasma hominis Ag</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" id="ureaplasma" wire:model='ureaplasma'
                                        wire:click='checkItem("gine","ureaplasma")'>
                                    <label class="form-check-label" for="ureaplasma"
                                        style="cursor: pointer;">Ureaplasma ureliticum Ag</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" id="sal" wire:model='e_salud'
                                            wire:click='checkCat("salud")' style="transform: scale(1.5);">
                                        <label class="pl-2"><strong> Evaluacion de la salud general y serología
                                            </strong></label>
                                    </div>

                                    {{-- Items Cat Salud --}}
                                    <div class="form-check">
                                        <input type="checkbox" id="ferritina" wire:model='ferritina'
                                            wire:click='checkItem("salud","ferritina")'>
                                        <label class="form-check-label" for="ferritina"
                                            style="cursor: pointer;">Ferritina</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="transf" wire:model='transferri'
                                            wire:click='checkItem("salud","transferri")'>
                                        <label class="form-check-label" for="transf"
                                            style="cursor: pointer;">Transferrina</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="anti_ttg" wire:model='anti_ttg'
                                            wire:click='checkItem("salud","anti_ttg")'>
                                        <label class="form-check-label" for="anti_ttg" style="cursor: pointer;">Anti
                                            TTG</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="gliadina" wire:model='gliadina'
                                            wire:click='checkItem("salud","gliadina")'>
                                        <label class="form-check-label" for="gliadina"
                                            style="cursor: pointer;">Gliadina</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="lysteria" wire:model='lysteria'
                                            wire:click='checkItem("salud","lysteria")'>
                                        <label class="form-check-label" for="lysteria"
                                            style="cursor: pointer;">Lysteria monocitogenes Ag</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="gluco" wire:model='glucosuria'
                                            wire:click='checkItem("salud","glucosuria")'>
                                        <label class="form-check-label" for="fluco"
                                            style="cursor: pointer;">Glucosuria</label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    {{-- Categoria Embarazo --}}
                                    <div class="form-check">
                                        <input type="checkbox" id="general" wire:model='e_embarazo'
                                            wire:click='checkCat("embarazo")' style="transform: scale(1.5);">
                                        <label class="pl-2"><strong> Evaluacion de embarazo </strong></label>
                                    </div>
                                    {{-- Items Embarazo --}}

                                    <div class="form-check">
                                        <input type="checkbox" id="chagas" wire:model='chagas'
                                            wire:click='checkItem("embarazo","chagas")'>
                                        <label class="form-check-label" for="chagas"
                                            style="cursor: pointer;">Chagas</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="toxo" wire:model='toxo'
                                            wire:click='checkItem("embarazo","toxo")'>
                                        <label class="form-check-label" for="toxo"
                                            style="cursor: pointer;">Toxoplasma</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="vdrl" wire:model='vdrl_cual'
                                            wire:click='checkItem("embarazo","vdrl_cual")'>
                                        <label class="form-check-label" for="vdrl"
                                            style="cursor: pointer;">VDRL</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="hbs" wire:model='hbs_ag'
                                            wire:click='checkItem("embarazo","hbs_ag")'>
                                        <label class="form-check-label" for="hbs"
                                            style="cursor: pointer;">HBsAg</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="hiv" wire:model='hiv'
                                            wire:click='checkItem("embarazo","hiv")'>
                                        <label class="form-check-label" for="hiv"
                                            style="cursor: pointer;">HIV</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="cmv_igg" wire:model='cmv_lgg'
                                            wire:click='checkItem("embarazo","cmv_lgg")'>
                                        <label class="form-check-label" for="cmv_igg" style="cursor: pointer;">CMV
                                            IgG</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" id="cmv_igm" wire:model='cmv_lgm'
                                            wire:click='checkItem("embarazo","cmv_lgm")'>
                                        <label class="form-check-label" for="cmv_igm" style="cursor: pointer;">CMV
                                            IgM</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            wire:click='dispatch("modalLabOn")'>Cancelar</button>
                        <button type="button" class="btn btn-secondary" wire:click='add_lab'>Aceptar</button>
                    </div>
                </div>

            </div>

        </div>

    @endif


</div>
