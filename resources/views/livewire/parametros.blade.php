<div>
    {{-- {{ $consulta }} --}}
    <div class="row border m-0 p-1">
        {{-- Tension arterial --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>TA</h3>
                    <div>
                        {{ $tension }}
                        <!-- Contenido del elemento -->
                        <p class="{{ $l_ta }}">{{ $tension }}</p>
                    </div>
                    <input type="text" class="{{ $in_ta }}" wire:model='tension' wire:keydown.enter='setTension'>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer d-flex justify-content-end">
                    <a wire:click="setTaClass" class="pr-3"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>

        {{-- FUM --}}
        <div class="col-lg-3 col-6">

            <div class="small-box bg-{{ $c_fum }}">
                <div class="inner">
                    <h3>FUM</h3>
                    <p class="{{ $l_fum }}">{{ $fum }}</p>
                    <input type="date" class="{{ $in_fum }}" wire:model='fum' wire:keydown.enter='setFum'>
                    <label class="{{ $in_fum }}" for="embarazo">Embarazo</label>
                    <input type="checkbox" class="{{ $in_fum }}" id="embarazo" wire:model.live='in_emb'>
                    {{ $in_emb }}

                </div>
                <div class="{{ $emb }}">
                    <p class="{{ $emb }}">semana {{ $eg }}</p>
                    <p class="{{ $emb }}">{{ $fpp }}</p>

                    <i class="ion ion-pie-graph"></i>
                </div>
                <div class="small-box-footer d-flex justify-content-end">
                    <a wire:click="setFumClass" class="pr-3"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>



        {{-- Temperatura --}}
        <div class="col-lg-3 col-6">

            <div class="small-box bg-{{ $v_temp }}">
                <div class="inner">
                    <h3>Temperatura</h3>
                    <p class="{{ $l_temp }}">{{ $temperatura }}</p>
                </div>
                <input type="text" class="{{ $in_temp }}" wire:model='temperatura' wire:keydown.enter='setTemp'>

                <div class="small-box-footer d-flex justify-content-end">
                    <a wire:click="setTempClass" class="pr-3"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>


        {{-- IMC --}}
        <div class="col-lg-3 col-6">

            <div class="small-box bg-{{ $v_imc }}">
                <div class="inner">
                    <h3>IMC</h3>
                    <p class="{{ $l_imc }}">{{ $imc }}</p>

                    <form wire:submit='setImc'>
                        @csrf

                        <input type="text" class="{{ $in_imc }}" wire:model='peso' placeholder="Peso">
                        <input type="text" class="{{ $in_imc }}" wire:model='altura' placeholder="Altura">
                        <button type="submit" class="{{ $in_imc }}">></button>
                    </form>
                </div>

                <div class="small-box-footer d-flex justify-content-end">
                    <a wire:click="setImcClass" class="pr-3"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>



</div>
