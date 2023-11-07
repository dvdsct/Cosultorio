<div>
    {{-- {{ $consulta }} --}}
    <div class="row border m-0 p-1 equal-height-cols">
        <!-- {{-- Tension arterial --}} -->
        <div class="col-lg-3 col-6 flex-fill">
            <div class="small-box bg-info d-flex flex-column h-100">
                <div class="inner">
                    <h3>TA</h3>
                    <div>
                        {{ $tension }}
                        <!-- Contenido del elemento -->
                        <h4 class="{{ $l_ta }}">{{ $tension }}</h4>
                    </div>
                    <input type="text" class="{{ $in_ta }}" wire:model='tension' wire:keydown.enter='setTension'>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setTaClass" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>

        {{-- FUM --}}
        <div class="col-lg-3 col-6 flex-fill">

            <div class="small-box bg-success d-flex flex-column h-100 {{ $c_fum }}">
                <div class="inner">
                    <h3>FUM</h3>
                    <p class="{{ $l_fum }}">{{ $fum }}</p>
                    <input type="date" class="{{ $in_fum }}" wire:model='fum' wire:keydown.enter=setFum>
                    <label class="{{ $in_fum }}" for="embarazo">Embarazo</label>
                    <input type="checkbox" class="{{ $in_fum }}" id="embarazo" wire:model='in_emb'>

                    <div class="{{ $emb }} ">
                        <div class="row pl-2">
                            <h5> <strong> Transcurso: </strong> </h5>
                            <h5 class="{{ $emb }} mb-0"> Semana {{ $eg }}</h5>
                        </div>


                        <h5 class="mb-0"> <strong> Fecha posible de parto: </strong> </h5>
                        <h5 class="{{ $emb }} mb-0">{{ $fpp }}</h5>

                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setFumClass" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>



        {{-- Temperatura --}}
        <div class="col-lg-3 col-6 flex-fill">

            <div class="small-box bg-warning d-flex flex-column h-100 {{ $v_temp }}">
                <div class="inner">
                    <h3>Temperatura</h3>
                    <h4 class="{{ $l_temp }} "> {{ $temperatura }} </h4>
                </div>
                <input type="text" class="{{ $in_temp }}" wire:model='temperatura' wire:keydown.enter='setTemp'>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setTempClass" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>


        {{-- IMC --}}
        <div class="col-lg-3 col-6 flex-fill">

            <div class="small-box bg-danger d-flex flex-column h-100 {{ $v_imc }}">
                <div class="inner">
                    <h3>IMC</h3>
                    <h4 class="{{ $l_imc }}">{{ $imc }}</h4>

                    <form wire:submit='setImc'>
                        @csrf

                        <input type="text" class="{{ $in_imc }}" wire:model='peso' placeholder="Peso">
                        <input type="text" class="{{ $in_imc }}" wire:model='altura' placeholder="Altura">
                        <button type="submit" class="{{ $in_imc }}">></button>
                    </form>
                </div>

                <div class="small-box-footer d-flex justify-content-end mt-auto">
                    <a wire:click="setImcClass" class="pr-3"><i class="fas fa-edit text-white"></i></a>
                </div>
            </div>
        </div>
    </div>



</div>