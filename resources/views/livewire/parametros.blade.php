<div>
    {{-- {{ $consulta }} --}}
    <div class="row">
        <!-- {{-- Tension arterial --}} -->
        <div class="col-md-3 col-xs-12 flex-fill">
            <div class="small-box bg-info d-flex flex-column h-100">
                <div class="inner">
                    <h3>TA</h3>
                    <div>
                        <!-- Contenido del elemento -->
                        <h4 class="{{ $l_ta }}">{{ $tension }}</h4>
                    </div>
                    <input type="text" class="form-control {{ $in_ta }} bg-info" wire:model='tension'
                        wire:keydown.enter='setTension'>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setTaClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')"
                        onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>


        {{-- FUM --}}
        <div class="col-md-3 col-xs-12 flex-fill">
            @if ($consulta->embarazo == 'si')
                <div class="small-box bg-pink d-flex flex-column h-100 ">
                    <div class="inner">
                        <h3>EMABARZO</h3>


                        {{-- embarazo --}}
                        <div class="">
                            <div class="row pl-2">
                                <h6> <strong> Transcurso: </strong> </h6>
                                <h6 class="mb-0"> Semana {{ $eg }}</h6>
                            </div>


                            <h6 class="mb-0"> <strong> Fecha posible de parto: </strong> </h6>
                            <h6 class="mb-0">{{ $fpp }}</h6>
                        </div>
                        {{-- ENd Emba --}}
                    </div>
                    <div class="small-box-footer d-flex justify-content-end mt-auto">
                        <a wire:click="finEmbarazo" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                    </div>
                </div>
            @else
                <div class="small-box bg-success d-flex flex-column h-100 ">
                    <div class="inner">

                        <h3>FUM</h3>


                        <p class="">{{Carbon\Carbon::parse($this->consulta->fum)->locale('es') ->isoFormat('D [de] MMMM [del] YYYY');  }}</p>
                        @if ($setFumForm)
                            <div class="pl-4">
                                <input type="checkbox" class=" form-check-input" id="embarazo" wire:model='in_emb'
                                    style="transform: scale(1.5);">
                                <label class="form-check-label" for="embarazo">Embarazo</label>
                            </div>

                            <input type="date" class="form-control bg-info" wire:model='fum' wire:keydown.enter='setFum'>
                        @endif
                    </div>
                    <div class="small-box-footer d-flex justify-content-end mt-auto">
                        <a wire:click="setForm" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                    </div>
                </div>
            @endif
        </div>



        <!------------------------------  Temperatura  ----------------------------------->
        <div class="col-md-3 col-xs-12 flex-fill">
            <div class="small-box bg-warning d-flex flex-column h-100 ">
                <div class="inner">
                    <h3>Temperatura</h3>
                    @if ($temperatura)
                        <h4 class="{{ $l_temp }}">{{ $temperatura }}°</h4>
                    @else
                        <h4 class="{{ $l_temp }}"></h4>
                    @endif

                    <input type="text" class="{{ $in_temp }} form-control bg-warning" wire:model='temperatura'
                        wire:keydown.enter='setTemp'>
                </div>
                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setTempClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')"
                        onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>



        <!-- Indice de Masa Corporal  -->
        <div class="col-md-3 col-xs-12 flex-fill">

            <div class="small-box bg-danger d-flex flex-column h-100 ">
                <div class="inner">
                    <h3>IMC</h3>
                    <h4 class="{{ $l_imc }}"> {{ $imc }}</h4>


                    <input type="text" class="{{ $in_imc }} form-control bg-danger mb-2" wire:model='peso'
                        placeholder="Peso" wire:keydown.enter='setImc'>
                    <input type="text" class="{{ $in_imc }} form-control bg-danger" wire:model='altura'
                        placeholder="Altura" wire:keydown.enter='setImc'>
                </div>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setImcClass" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

