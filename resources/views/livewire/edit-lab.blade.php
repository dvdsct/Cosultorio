<div>
    <div class="row">
        <div class="col-md-6">
            <label><strong>{{ $laboratorio->tiposLaboratorios->descripcion }}: </strong></label>
        </div>

        <div class="col-md-4">
            <input class="form-control" type="text" wire:model="valor" wire:keydown.enter='updateLab' {{ $dis }}>
        </div>

        <div class="col-md-2">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>

</div>