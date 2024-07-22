<div>
    <div class="row">
        <div class="col-4">
            <div class="card card-purple">
                <div class="card card-header">
                    <div class="card-title">
                        <strong>RECETA</strong>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('receta-secretaria',['consulta' => $consulta, 'paciente' => $paciente,'consulta'])
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-primary">
                <div class="card card-header">
                    <div class="card-title">
                        <strong> IMAGENES </strong>
                    </div>
                </div>
                <div class="card-body">
                @livewire('add-imagen', ['consulta' => $consulta])
                <table class="table table-striped">
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
                    <div class="col-10">
                        <button type="button" class="btn btn-primary btn-flat rounded-left mr-1" wire:click='dispatch("modalImgOn", { tipo:"pedido" })'>
                            <i class="fas fa-plus-circle"></i> Nuevo pedido de imagen
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-warning">
                <div class="card card-header">
                    <div class="card-title">
                        <strong> LABORATORIO </strong>
                    </div>
                </div>
                <div class="card-body">
                    <p>card 3</p>
                </div>

            </div>
        </div>
    </div>
</div>