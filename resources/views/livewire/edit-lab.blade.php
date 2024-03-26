<div>
    <tr>
        <td>{{ $laboratorio->tiposLaboratorios->descripcion }}</td>



        <td>
            <input type="text" wire:model="valor" wire:keydown.enter='updateLab' {{ $dis }}>
        </td>

        <td class="text-right py-0 align-middle">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </td>

</div>
