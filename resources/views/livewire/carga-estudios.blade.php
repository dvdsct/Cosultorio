<div>
    @if ($estModal == true)

        <div class="modal fade show" id="modal-lg"
            style="display: block; position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;"
            aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg"
                style=" background-color: #fff;
            
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 10000;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" wire:click='dispatch("editLab")'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (count($estudios) > '0')
                            @foreach ($estudios as $laboratorio)
                                @livewire('edit-lab', ['laboratorio' => $laboratorio, key($laboratorio->id)])
                            @endforeach
                        @else
                            <h3>NO HAY ESTUDIOS PEDIDOS</h3>
                        @endif



                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='dispatch("editLab")'>Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>

        </div>


    @endif
</div>
