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

            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($consulta->imagenes as $imagen )

                <tr>
                    <td> {{$imagen}} </td>
                    <td> </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="col-4">

        </div>
    </div>
</div>