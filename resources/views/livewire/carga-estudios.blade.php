<div>
@if ($estModal == true)

    <div class="modal fade show" id="modal-lg" style="display: block; padding-right: 17px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    @foreach ($estudios as $estudio )

                    <div class="form-group">
                        <label for="{{ $estudio->tiposLaboratorios->descripcion }}">{{ $estudio->tiposLaboratorios->descripcion }}</label>
                        <input type="text" class="form-control" id="{{ $estudio->tiposLaboratorios->descripcion }}" wire:keydown.enter='setLab({{ $estudio->id }})'>
                    </div>
                    @endforeach



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>

    </div>


@endif
</div>
