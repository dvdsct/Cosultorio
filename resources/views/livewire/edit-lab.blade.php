<div>
    <tr>
        <td>{{ $laboratorio->tiposLaboratorios->descripcion }}</td>
    </tr>

    <tr>
        <td class="col-md-9">
            <input class="form-control col-md-9" type="text" wire:model="valor" wire:keydown.enter='updateLab' {{ $dis }}>
        </td>

        <td class="col-md-3">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </td>
    </tr>

</div>