<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><strong> FICHA PARA EL REGISTRO DE COLPOSCOPIA </strong></h3>
    </div>



    <form wire:submit="add_colp" class="p-4">


        <div>
            <h5 class="py-3">Responsable del Examen Colposcópico</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nombre</label> <input type="text" class="form-control" wire:model='responsable_n'>
                </div>
                <div class="col-md-6">
                    <label for="">Apellido</label> <input type="text" class="form-control" wire:model='responsable_a'>
                </div>
            </div>

            <div class="row pt-3">
                <div class="col-md-6">
                    <label for="">Nombre del Establecimiento</label> <input type="text" class="form-control" wire:model='establecimiento'>
                </div>
                <div class="col-md-6">
                    <label for="">Localidad del Establecimiento</label> <input type="text" class="form-control" wire:model='localidad'>
                </div>
            </div>
        </div>


        <div class="pt-4">
            <h5>Informacion Complementaria</h5>
            <div class="row pt-3">
                <div class="col-md-5">
                    <label>Resultado Test VPH</label>
                    <div class="row pl-2">
                        <label for="customSwitch3" class="pr-2"> - </label>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" wire:model.live='vph'>
                            <label class="custom-control-label" for="customSwitch3">+</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <label>Resultado Citología</label>
                    <div class="row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="Checkbox_asc-us" wire:model='ascus'>
                            <label class="form-check-label" for="Checkbox_asc-us">
                                ASC-US
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_lsil" wire:model='lsil'>
                            <label class="form-check-label" for="Checkbox_lsil">
                                L SIL
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_asch" wire:model='asch'>
                            <label class="form-check-label" for="Checkbox_asch">
                                ASCH
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_hsil" wire:model='hsil'>
                            <label class="form-check-label" for="Checkbox_hsil">
                                HSIL
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_ca" wire:model='ca'>
                            <label class="form-check-label" for="Checkbox_ca">
                                CA
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_otros" wire:model='otros'>
                            <label class="form-check-label" for="Checkbox_otros">
                                OTROS
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

            <label class="pt-3">Observaciones</label>
            <textarea class="form-control" wire:model='observaciones' rows="4"></textarea>
        </div>

        <h5 class="row py-3 p-2">Colposcopia</h5>
        <div class="row">
            <div class="col-md-6">
                <label>Evaluacion General</label>

                <div class="row pl-2">
                    <div class="row col-md-6">
                        <label for="Switch_eva" class="pr-2">Inadecuada</label>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="Switch_eva" wire:model.live='e_general'>
                            <label class="custom-control-label" for="Switch_eva"> Adecuada</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label>Zona de Transformacion</label>
                <select class="custom-select rounded-0" aria-label="Default select example" wire:model='zona_trans'>
                    @foreach ($zonas as $z)
                    <option value="{{ $z->descripcion }}">{{ $z->descripcion }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <hr>
        <label> Hallazgos Colposcópicos IFCPC 2011</label>
        <div class="row mb-3 pl-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="Checkbox_hnormal" wire:model='hall_normales'>
                <label class="form-check-label" for="Checkbox_hnormal">
                    Hallazgos Normales
                </label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="Checkbox_a1" wire:model='anormales1'>
                <label class="form-check-label" for="Checkbox_a1">
                    Anormales Grado I (menor)
                </label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="Checkbox_a2" wire:model='anormales2'>
                <label class="form-check-label" for="Checkbox_a2">
                    Grado II(mayor)
                </label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="Checkbox_noEspe" wire:model='no_especifico'>
                <label class="form-check-label" for="Checkbox_noEspe">
                    No Especifico
                </label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="Checkbox_sospe" wire:model='sospecha_inv'>
                <label class="form-check-label cursor-pointer" for="Checkbox_sospe" wire:mouseover="changeCursor">
                    Sospecha de Invasión
                </label>
            </div>

        </div>

        <div class="row pl-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="Checkbox_varios" wire:model='hall_varios'>
                <label class="form-check-label" for="Checkbox_varios">
                    Hallazgos Varios
                </label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="checkbox_bio" wire:model='biopsia'>
                <label class="form-check-label" for="checkbox_bio">Biopsia</label>
            </div>

            <div class="form-check pl-5">
                <input class="form-check-input" type="checkbox" id="checkbox_ecc" wire:model='evaluacion'>
                <label class="form-check-label" for="checkbox_ecc">ECC (Evaluacion Conducto Cervical)</label>
            </div>

            <!-- TEST DE SCHILLER  -->
            <div class="row pl-5">
                <label for="customSwitchSchiller" class="pr-2 font-weight-normal">Test de Schiller: - </label>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="customSwitchSchiller" wire:model='schiller'>
                    <label class="custom-control-label font-weight-normal" for="customSwitchSchiller">+</label>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <label>Resultados de la Biopsia</label>
                <div class="row mb-3 pl-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Checkbox_negat" wire:model='negat'>
                        <label class="form-check-label" for="Checkbox_negat">
                            Negativo
                        </label>
                    </div>

                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" id="Checkbox_cin1" wire:model='cin1'>
                        <label class="form-check-label" for="Checkbox_cin1">
                            CIN I
                        </label>
                    </div>

                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" id="Checkbox_cin2" wire:model='cin2'>
                        <label class="form-check-label" for="Checkbox_cin2">
                            CIN II
                        </label>
                    </div>

                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" id="Checkbox_cin3" wire:model='cin3'>
                        <label class="form-check-label" for="Checkbox_cin3">
                            CIN III
                        </label>
                    </div>

                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" id="Checkbox_cis" wire:model='cis'>
                        <label class="form-check-label" for="Checkbox_cis">
                            CIS
                        </label>
                    </div>
                </div>

                <div class="row pl-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model='ca_inv'>
                        <label class="form-check-label">Ca Invasor</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" wire:model='adenocis'>
                        <label class="form-check-label">Adenocis</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" wire:model='adeno_ca_inv'>
                        <label class="form-check-label">Adeno Ca Invasor</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" wire:model='bio_otros'>
                        <label class="form-check-label">Otros</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label>Tratamiento</label>
                <br>
                <label class="form-check-label">Escisión:</label>
                <select class="custom-select rounded-0" aria-label="Default select example" wire:model='tratam'>
                    @foreach ($tratamientos as $t)
                    <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>


        <div>
            <label>Seguimiento</label>
            <textarea class="form-control" wire:model='seguimiento' rows="4"></textarea>
        </div>


        <div class="card-footer d-flex justify-content-between">
            <button type="button" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> <strong> Volver </strong>
            </button>
            <button type="submit" class="btn btn-primary ml-auto mr-2"><strong> Finalizar </strong></button>
            <a type="button" href="{{route('pdfPap',$colpos->turno_id)}}" 
            class="btn btn-success btn-sm  pt-2" target="_blank" ><strong><i class="fa fa-file-download"></i> Descargar </strong></a>
        </div>
    </form>
</div>