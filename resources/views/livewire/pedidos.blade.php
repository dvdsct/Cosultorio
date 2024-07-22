<div>
    <div class="row">
        <!-- CARD DE LA RECETA  -->
        <div class="col-4">
            <div class="card card-purple p-0">
                <div class="card-header">
                    <div class="card-title">
                        <strong>RECETAS</strong>
                    </div>
                </div>
                @livewire('receta-secretaria',['consulta' => $consulta, 'paciente' => $paciente,'consulta'])
            </div>
        </div>

        <!-- CARD DE IMAGENES  -->
        <div class="col-4">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
                        <strong>IMAGENES</strong>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-flat rounded-left mr-1" wire:click='dispatch("modalImgOn", { tipo:"pedido" })'>
                    <i class="fas fa-plus-circle"></i> Nuevo pedido de imagen
                </button>
                @livewire('add-imagen', ['consulta' => $consulta])
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta->imagenes as $imagen)
                        <tr>
                            <td>{{ $imagen->tipoImagenes->tipo_img }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CARD DE LABORATORIO -->
        <div class="col-4">
            <div class="card card-warning p-0">
                <div class="card-header">
                    <div class="card-title">
                        LABORATORIO
                    </div>
                </div>
                Nuevo pedido
            </div>
        </div>
    </div>
</div>