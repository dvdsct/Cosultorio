<div>
    <div class="row">
        <div class="col-4 card">

            @livewire('receta-secretaria',['consulta' => $consulta, 'paciente' => $paciente,'consulta'])
        </div>
        <div class="col-4 card">

            <button type="button" class="btn btn-primary btn-flat rounded-left  mr-1" wire:click='dispatch("modalImgOn",{ tipo:"pedido" })'>
                <i class="fas fa-plus-circle"></i>
            </button>
            @livewire('add-imagen', ['consulta' => $consulta])
            @livewire('carga-estudios', ['consulta' => $consulta])
        </div>
        <div class="col-4">

        </div>
    </div>
</div>