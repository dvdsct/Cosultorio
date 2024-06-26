<div class="pt-3">
    <div class="row">
        <div class="card card-info col mx-2 px-0">
            <div class="card-header">
                <h3 class="card-title"> <strong>ENFERMEDAD ACTUAL </strong></h3>
            </div>

            <!-- Contenedor de Enfermedad Actual -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7 col-xs-12" id="diagnostico">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Diagnóstico</strong></h3>
                            </div>
                            <div class="card-body p-2">
                                <textarea class="form-control" style="height: 100px;" placeholder="" wire:model='ea'></textarea>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Observaciones</strong></h3>
                            </div>
                            <div class="card-body p-2">
                                <textarea class="form-control" style="height: 100px;" placeholder="" wire:model='obs' wire:keydown.enter='setEa'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-5 col-xs-12" id="pedidos">
                        <div class="card-header">
                            <h3 class="card-title"> <strong> Pedidos </strong> </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <tbody>
                                    {{-- Recetas --}}
                                    <tr>
                                        @if ($consulta->estado == '3')
                                            {{-- Receta Consulta Pasada --}}
                                            <td>
                                                <!--                                             <div class="btn-group" style="width: 100%;">
                                                <button type="button" class="btn btn-danger btn-block rounded-left border-right mr-1" style="width: 100%;" wire:click='dispatch("modalOn")'>
                                                    <strong> Receta </strong>
                                                </button>
                                            </div> -->
                                            </td>
                                        @else
                                            {{-- Receta Consulta Actual --}}
                                            <td>
                                                <h5> <strong> <span
                                                            style="display: flex; align-items: center;">{{ count($consulta->recetas ?? 0) }}
                                                            Medicametos</span>
                                                    </strong> </h5>

                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn bg-purple btn-flat rounded-left mr-1"
                                                        wire:click='dispatch("modalOn")'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn bg-purple btn-flat rounded-right mr-5"
                                                        wire:click='delRecetas'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>


                                    {{-- Laboratorios --}}

                                    <tr>
                                        @if ($this->consulta->estado == '3')
                                            <td class="px-0">
                                                <button type="button"
                                                    class="btn btn-warning btn-block rounded-left mr-1"
                                                    style="width: 70%;" data-toggle="modal" wire:click="modalEditLab">
                                                    <strong> LABORATORIO </strong>
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                <h5> <strong> <span>{{ $total_lab }}
                                                            Laboratorio</span> </strong> </h5>
                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn btn-warning btn-flat rounded-left mr-1"
                                                        wire:click='dispatch("modalOnLab")'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>



                                                    <button type="button"
                                                        class="btn btn-warning btn-flat rounded-right mr-5"
                                                        wire:click='resetLab'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>


                                    <!-- -------------------- BOTON DE IMAGEN ----------------------------- -->

                                    <tr>
                                        @if ($consulta->estado == '3')
                                            <td class="px-0">
                                                <div class="btn-group" style="width: 70%;">
                                                    <button type="button"
                                                        class="btn btn-primary btn-block rounded-left  mr-1"
                                                        wire:click='dispatch("modalImgOn",{ tipo:"carga" })'>
                                                        <strong> IMAGENES </strong>
                                                    </button>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                <h5> <strong><span>
                                                            {{ count($consulta->imagenes) }} Imagen </span> </strong>
                                                </h5>
                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn btn-primary btn-flat rounded-left  mr-1"
                                                        wire:click='dispatch("modalImgOn",{ tipo:"pedido" })'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>



                                                    <button type="button"
                                                        class="btn btn-primary btn-flat rounded-right mr-5"
                                                        wire:click='resetImgs'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            <!-- SI LA CONSULTA ESTA EN PROGRESO SE MUESTRA EL BOTON DE FINALIZAR Y DESCARGAR -->
                            @if ($consulta->estado != '3')
                                <div class="row">
                                    <div class="col-8">
                                        <button type="button" class="btn btn-block btn-success mt-2"
                                            style="height: 90px;" wire:click='finConsulta()'>
                                            <i class="fa fa-check-circle fa-2x"></i> <br>
                                            <strong> FINALIZAR CONSULTA </strong></button>
                                    </div>

                                    <div class="col-4 pl-0">
                                        <a type="button" class="btn btn-block btn-secondary mt-2 pt-3"
                                            style="height: 90%;" href="{{ route('pdf.show', $consulta->id) }}"
                                            target="_blank">
                                            <i class="fa fa-file-download fa-2x"></i>
                                            <span> <strong> DESCARGAR </strong></span>
                                        </a>
                                    </div>
                                </div>
                                <!-- SI ES UNA CONSULTA FINALIZADA SOLO MUESTRA EL BOTON DE DESCARGAR -->
                            @else
                                <div class="col-12 px-0">
                                    <a type="button" class="btn btn-block btn-secondary mt-2 pt-3"
                                        style="height: 90%;" href="{{ route('pdf.show', $consulta->id) }}"
                                        target="_blank">
                                        <i class="fa fa-file-download fa-2x"></i> <br>
                                        <span> <strong> DESCARGAR </strong></span>
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    @if ($modal)
        <div class="modal fade show" id="modal-receta" aria-labelledby="modal-default"
            style="background-color: rgba(0, 0, 0, 0.5); display:block" aria-hidden="true" wire:ignore.self>

            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title"> <strong> NUEVA RECETA </strong></h4>
                        <button type="button" class="close" wire:click='closeModal'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('recetar', ['consulta' => $consulta])

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='closeModal'>Cancelar</button>
                        <button type="button" class="btn btn-secondary" wire:click="guardarReceta">Aceptar</button>
                    </div>
                </div>

            </div>
        </div>
    @endif

    @livewire('add-imagen', ['consulta' => $consulta])
    @livewire('carga-estudios', ['consulta' => $consulta])


    {{-- Modal Laboratorio --}}
    @if ($modalLabs)

        <div>
            <div class="modal fade show" id="modal-laboratorio" aria-labelledby="modal-default"
                style="background-color: rgba(0, 0, 0, 0.5); display:block" aria-hidden="true" wire:ignore.self>

                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h4 class="modal-title"> <strong> PEDIDOS DE LABORATORIO </strong></h4>
                            <button type="button" class="close" wire:click='dispatch("modalOnLab")'>
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                            @if ($this->consulta->estado == '3')
                            @else
                                <div class="col-md-12">
                                    <!-- CIE 10  -->
                                    <label for=""> <strong> Seleccione un diagnostico CIE 10: </strong>
                                    </label>
                                    <select class="form-control" wire:model='cie10'>
                                        @foreach ($cie10s as $c)
                                            <option value="{{ $c->id }}">
                                                {{ $c->descripcion . ' - ' . $c->codigo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-red" style="font-weight: bold;">
                                        @error('cie10')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ml-2">
                                    <div class="form-check my-3">
                                        <input type="checkbox" id="for" wire:model='todas'
                                            wire:click='selectAll' style="transform: scale(1.5);">
                                        <label class="form-check-label pl-2" for="todas" style="cursor: pointer;">
                                            <strong> TODAS </strong> </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input type="checkbox" id="general" wire:model='e_gral'
                                                    wire:click="checkCat('general')" style="transform: scale(1.5);">
                                                <label class="pl-2" for="general" style="cursor: pointer;">
                                                    <strong>Evaluacion General y Hematológica
                                                    </strong></label>
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
                                                    style="cursor: pointer;">Hemoglobina
                                                    glicosilada</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox" id="factor_rh" wire:model='factor_rh'
                                                    wire:click='checkItem("general","factor_rh")'>
                                                <label class="form-check-label" for="factor_rh"
                                                    style="cursor: pointer;">Grupo
                                                    sanguíneo y factor RH</label>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input type="checkbox" id="renal" wire:model='e_renal'
                                                    wire:click='checkCat("renal")' style="transform: scale(1.5);">
                                                <label class="pl-2" for="renal"
                                                    style="cursor: pointer;"><strong>
                                                        Evaluacion de la funcion renal y Urinaria
                                                    </strong></label>
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
                                            <label class="pl-2" for="gine" style="cursor: pointer;"><strong>
                                                    Evaluacion
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
                                            <label class="form-check-label" for="flujo_vag"
                                                style="cursor: pointer;">Exudado
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
                                            <label class="form-check-label" for="fsh"
                                                style="cursor: pointer;">FSH
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" id="lh" wire:model='lh'
                                                wire:click='checkItem("gine","lh")'>
                                            <label class="form-check-label" for="lh"
                                                style="cursor: pointer;">LH
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" id="dhea" wire:model='dhea'
                                                wire:click='checkItem("gine","dhea")'>
                                            <label class="form-check-label" for="dhea"
                                                style="cursor: pointer;">DHEA
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
                                            <label class="form-check-label" for="h_anti"
                                                style="cursor: pointer;">H.
                                                Antimulleriana</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" id="ag_chla" wire:model='ag_chlamidia'
                                                wire:click='checkItem("gine","ag_chlamidia")'>
                                            <label class="form-check-label" for="ag_chla"
                                                style="cursor: pointer;">Ag
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
                                                <label class="pl-2"><strong> Evaluacion de la salud
                                                        general y serología
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
                                                <label class="form-check-label" for="anti_ttg"
                                                    style="cursor: pointer;">Anti
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
                                                    style="cursor: pointer;">Lysteria monocitogenes
                                                    Ag</label>
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
                                                <label class="pl-2"><strong> Evaluacion de embarazo
                                                    </strong></label>
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
                                                <label class="form-check-label" for="cmv_igg"
                                                    style="cursor: pointer;">CMV
                                                    IgG</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox" id="cmv_igm" wire:model='cmv_lgm'
                                                    wire:click='checkItem("embarazo","cmv_lgm")'>
                                                <label class="form-check-label" for="cmv_igm"
                                                    style="cursor: pointer;">CMV
                                                    IgM</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default"
                                wire:click='dispatch("modalOnLab")'>Cancelar</button>
                            <button type="button" class="btn btn-secondary" wire:click='addLabs'>Aceptar</button>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    @endif

</div>
