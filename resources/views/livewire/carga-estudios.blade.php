<div>


    @if ($estModal == true)

    <div class="modal fade show" id="modal-lg" style="display: block; padding-right: 17px; overflow-y: auto;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title"> <strong> RESULTADOS DE LABORATORIO </strong></h4>
                    <button type="button" class="close" wire:click='closeModal'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">

                    @if (empty($estudios))
                    <h5> <span style="font-style:italic;"> NO HAY ESTUDIOS PEDIDOS </span> </h5>
                    @else
                    @foreach ($estudios as $laboratorio)
                    @livewire('edit-lab', ['laboratorio' => $laboratorio, key($laboratorio->id)])
                    @endforeach
                    @endif

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" wire:click='closeModal'>Cancelar</button>
                    <button type="button" class="btn btn-primary"  wire:click='dispatch("editLab")'>Guardar</button>
                </div>
            </div>
        </div>
    </div>



@endif

</div>
