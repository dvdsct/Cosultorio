<div>
    {{-- {{ $consulta }} --}}
    <div class="row">
        <!-- {{-- Tension arterial --}} -->
        <div class="col-lg-3 col-6 flex-fill">
            <div class="small-box bg-info d-flex flex-column h-100">
                <div class="inner">
                    <h3>TA</h3>
                    <div>
                        <!-- Contenido del elemento -->
                        <h4 class="{{ $l_ta }}">{{ $tension }}</h4>
                    </div>
                    <input type="text" class="form-control {{ $in_ta }} bg-info" wire:model='tension' wire:keydown.enter='setTension'>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setTaClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')" onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>
        {{-- FUM --}}
        <div class="col-lg-3 col-6 flex-fill">
            <div class="small-box bg-{{ $c_fum }} d-flex flex-column h-100 ">
                <div class="inner">
                    <h3>{{ $fumEmb }}</h3>
                    <p class="{{ $l_fum }}">{{ $fum }}</p>

                    <div class="pl-4">
                        <input type="checkbox" class=" form-check-input {{ $in_fum }}" id="embarazo" wire:model='in_emb'>
                        <label class="form-check-label {{ $in_fum }}" for="embarazo">Embarazo</label>
                    </div>

                    <input type="date" class="form-control bg-success {{ $in_fum }}" wire:model='fum' wire:keydown.enter=setFum>

                    <div class="{{ $emb }} ">
                        <div class="row pl-2">
                            <h6> <strong> Transcurso: </strong> </h6>
                            <h6 class="{{ $emb }} mb-0"> Semana {{ $eg }}</h6>
                        </div>


                        <h6 class="mb-0"> <strong> Fecha posible de parto: </strong> </h6>
                        <h6 class="{{ $emb }} mb-0">{{ $fpp }}</h6>
                    </div>
                </div>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setFumClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')" onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>


        <!------------------------------  Temperatura  ----------------------------------->
        <div class="col-lg-3 col-6 flex-fill">
    <div class="small-box bg-warning d-flex flex-column h-100 {{ $v_temp }}">
        <div class="inner">
            <h3>Temperatura</h3>
            @if($temperatura)
                <h4 class="{{ $l_temp }}">{{ $temperatura }}°</h4>
            @else
                <h4 class="{{ $l_temp }}"></h4>
            @endif

            <input type="text" class="{{ $in_temp }} form-control bg-warning" wire:model='temperatura' wire:keydown.enter='setTemp'>
        </div>
        <div class="small-box-footer d-flex justify-content-end mt-auto">
            <a wire:click="setTempClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')" onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
        </div>
    </div>
</div>



       <!-- Indice de Masa Corporal  -->
        <div class="col-lg-3 col-6 flex-fill">

            <div class="small-box bg-danger d-flex flex-column h-100 {{ $v_imc }}">
                <div class="inner">
                    <h3>IMC</h3>
                    <h4 class="{{ $l_imc }}"> {{ $imc }}</h4>

                    <form wire:submit='setImc'>
                        @csrf
                        <input type="text" class="{{ $in_imc }} form-control bg-danger mb-2" wire:model='peso' placeholder="Peso">
                        <input type="text" class="{{ $in_imc }} form-control bg-danger" wire:model='altura' placeholder="Altura">
                    </form>
                </div>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setImcClass" class="pr-3" onmouseover="changeCursor(this, 'pointer')" onmouseout="changeCursor(this, 'auto')"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeCursor(element, cursorType) {
        element.style.cursor = cursorType;
    }
</script>
