<div>


    @if ($estModal == true)

    <div class="modal fade show" id="modal-lg" style="display: block; padding-right: 17px; overflow-y: auto;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title"> <strong> Estudios de laboratorio </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">

                    @if (count($estudios) > '0')
                    @foreach ($estudios as $laboratorio)
                    @livewire('edit-lab', ['laboratorio' => $laboratorio, key($laboratorio->id)])
                    @endforeach
                    @else
                    <h3> <strong> NO HAY ESTUDIOS PEDIDOS </strong> </h3>
                    @endif



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>



@endif

</div>
