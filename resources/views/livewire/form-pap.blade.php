<div class="card card-purple">
    <div class="card-header">
        <h3 class="card-title"><strong> FICHA DE SOLICITUD DE LA CITOLOGÍA EXFOLIATIVA (PAP) </strong></h3>
    </div>

    <form wire:submit="add_pap">
        <div class="card-body">
            <h5> Antecedentes </h5>
            <div class="row">
                <div class="col-md-6">
                    <label class="mr-5"> FUM </label>
                    <input type="date" wire:model='fum' {{ $v_fum }} class="form-control col-md-6">
                    <!-- FUM -->
                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchMeno" wire:model='menop' wire:click='fum_meno'>
                        <label class="custom-control-label" for="customSwitchMeno">Menopausia </label>
                    </div>

                    <label class="mt-3">Método Anticonceptivo</label> <br>
                    <select class="custom-select rounded-0 col-md-6" aria-label="Default select example" wire:model='metodo_anti' wire:change='setStatus'>
                        @foreach ($metodos_antis as $ma)
                        <option value="{{ $ma->id }}">{{ $ma->descripcion }}</option>
                        @endforeach
                    </select>
                    <input type="text" wire:model='anti_otros' class="form-control col-md-6 mt-3 {{ $in_otros }}" placeholder="Agregar otros metodos..">

                </div>

                <div class="col-md-6">
                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchCP" wire:model='check_cp' wire:click='cir_previas'>
                        <label class="custom-control-label" for="customSwitchCP">Cirugías Previas</label>
                    </div>
                    <br>
                    <select class="custom-select rounded-0 col-md-6" aria-label="Default select example" wire:model='ciru_prev' {{ $v_cp }}>
                        @foreach ($cirus_prevs as $cp)
                        <option value="{{ $cp->id }}">{{ $cp->descripcion }}</option>
                        @endforeach
                    </select> <br>

                    <label class="mt-3">Causa o Lesión </label>
                    <input type="text" wire:model='causales' class="form-control col-md-6" {{ $v_cp }}>

                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchTHR" wire:model='thr'>
                        <label class="custom-control-label" for="customSwitchTHR">Terapia Hormonal de Reemplazo(THR)
                        </label>
                    </div>

                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchEA" wire:model.live='embarazo'>
                        <label class="custom-control-label" for="customSwitchEA">Embarazo Actual </label>
                    </div>

                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchTR" wire:model='trat_rad'>
                        <label class="custom-control-label" for="customSwitchTR">Tratamiento Radiante </label>
                    </div>

                    <div class="custom-control custom-switch mt-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitchQuimio" wire:model='quimio'>
                        <label class="custom-control-label" for="customSwitchQuimio">Quimioterapia </label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <label>Tipo de Muestra:</label>
                    <select class="custom-select rounded-0" aria-label="Default select example" wire:model='tipo_muestra'>
                        @foreach ($tipos_muestras as $tp)
                        <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Método Toma Muestra:</label>
                    <select class="custom-select rounded-0" aria-label="Default select example" wire:model='toma_muestra'>
                        @foreach ($tomas_muestras as $tm)
                        <option value="{{ $tm->id }}">{{ $tm->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>


            <h5>Tamizaje Anterior</h5>

            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="custom-control custom-switch ml-2">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" wire:click='test_vph' wire:model='check_vph'>
                            <label class="custom-control-label" for="customSwitch1">Test de VPH </label>
                        </div>

                        <div class="row pl-5" id="valor">
                            <label for="customSwitch3" class="pr-2"> - </label>
                            <div class="custom-control custom-switch {{ $switch }}">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" {{ $check_tvph }} wire:model='resultado_vph'>
                                <label class="custom-control-label" for="customSwitch3">+</label>
                            </div>
                        </div>
                    </div>

                    <input type="date" class="form-control mt-2" {{ $v_test }} wire:model='fec_tam' class="form-control">
                </div>

                <!-- -------------------------------------------------------------- -->
                <div class="col-md-4">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" wire:click='pap_previo' wire:model='check_pap'>
                        <label class="custom-control-label" for="customSwitch2">PAP Previo </label>
                    </div>
                    <input type="date" class="form-control mt-3" {{ $v_pp }} wire:model='fec_pap_previo'>
                </div>
                <!--  AGREGAR EL MODELO DEL RESULTADO DEL PAP PREVIO  -->
                <div class="col-md-4">
                    <label> Resultado PAP previo </label>
                    <select class="custom-select rounded-0  mt-2" aria-label="Default select example" wire:model='pap_prev'>
                        @foreach ($pap_prevs as $pp)
                        <option value="{{ $pp->id }}">{{ $pp->descripcion }}</option>
                        @endforeach
                    </select>


                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                Siguiente <i class="fas fa-arrow-right"></i>
            </button>
        </div>

    </form>
</div>