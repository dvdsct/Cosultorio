<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">FICHA PARA EL REGISTRO DE COLPOSCOPIA </h3>
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
                    <!--  <label for="">POSITIVO</label> <input type="checkbox" class="form-check-input" wire:model='vph'> -->

                    <div class="row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="Checkbox_VPH_Neg" wire:model=''>
                            <label class="form-check-label" for="Checkbox_VPH_Neg">
                                Negativo
                            </label>
                        </div>

                        <div class="form-check pl-5">
                            <input class="form-check-input" type="checkbox" id="Checkbox_VPH_Pos" wire:model=''>
                            <label class="form-check-label" for="Checkbox_VPH_Pos">
                                Positivo
                            </label>
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Checkbox_ade" wire:model='evaluacion_adec'>
                        <label class="form-check-label" for="Checkbox_ade">
                            Adecuada
                        </label>
                    </div>

                    <div class="form-check pl-5">
                        <input class="form-check-input" type="checkbox" id="Checkbox_ina" wire:model='evaluacion_inadec'>
                        <label class="form-check-label" for="Checkbox_ina">
                            Inadecuada
                        </label>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <label>Zona de Transformacion</label>
                <select class="custom-select rounded-0" aria-label="Default select example" wire:model='zona_trans'>
                    @foreach ($zonas as $z)
                    <option value="{{ $z->id }}">{{ $z->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-6">
                <label> Hallazgos Colposcópicos IFCPC 2011</label>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_hnormal" wire:model='hall_normales'>
                    <label class="form-check-label" for="Checkbox_hnormal">
                        Hallazgos Normales
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_a1" wire:model='anormales1'>
                    <label class="form-check-label" for="Checkbox_a1">
                        Anormales Grado I (menor)
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_a2" wire:model='anormales2'>
                    <label class="form-check-label" for="Checkbox_a2">
                        Grado II(mayor)
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_noEspe" wire:model='no_especifico'>
                    <label class="form-check-label" for="Checkbox_noEspe">
                        No Especifico
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_sospe" wire:model='sospecha_inv'>
                    <label class="form-check-label" for="Checkbox_sospe">
                        Sospecha de Invasión
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Checkbox_sospe" wire:model='hall_varios'>
                    <label class="form-check-label" for="Checkbox_sospe">
                        Hallazgos Varios
                    </label>
                </div>
            </div>

            <div class="col-md-6">
                <label for="">Biopsia</label> <input type="checkbox" wire:model='biopsia'>
                <label for="">ECC (Evaluacion Conducto Cervical)</label> <input type="checkbox" wire:model='evaluacion'>
                {{-- <label for="">Test de Schiller</label> <input type="checkbox"> --}}
            </div>
        </div>


        <div>
            <label>Resultados de la Biopsia</label>
            <div class="row pl-2">
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

            <label for="">Ca Invasor</label> <input type="checkbox" wire:model='ca_inv'>
            <label for="">Adenocis</label> <input type="checkbox" wire:model='adenocis'>
            <label for="">Adeno Ca Invasor</label> <input type="checkbox" wire:model='adeno_ca_inv'>
            <label for="">Otros</label><input type="checkbox" wire:model='bio_otros'>
        </div>

        <div>
            <label>Tratamiento</label>
            <h4>Escisión:</h4>
            <select class="form-select" aria-label="Default select example" wire:model='tratam'>
                @foreach ($tratamientos as $t)
                <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Seguimiento</label>
            <textarea class="form-control" wire:model='seguimiento' rows="4"></textarea>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>