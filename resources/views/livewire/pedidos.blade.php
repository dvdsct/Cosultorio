<div>
    <div class="row">
        <!-- CARD DE RECETA -->
        <div class="col-4">
            <div class="card card-purple">
                <div class="card card-header">
                    <div class="card-title">
                        <strong>RECETA</strong>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('receta-secretaria', ['consulta' => $consulta, 'paciente' => $paciente, 'consulta'])
                </div>
            </div>
        </div>
        <!-- CARD DE PEDIDO DE IMAGEN -->
        <div class="col-4">
            <div class="card card-primary">
                <div class="card card-header">
                    <div class="card-title">
                        <strong> IMAGENES </strong>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('add-imagen', ['consulta' => $consulta])
                    <div class="col-10">
                        <button type="button" class="btn btn-success" wire:click='dispatch("modalImgOn", { tipo:"pedido" })'>
                            <i class="fas fa-plus-circle"></i> <strong> Nuevo pedido </strong>
                        </button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consulta->imagenes as $imagen)
                            <tr>
                                <td>{{ $imagen->tipoImagenes->tipo_img }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-end pt-2 mb-2">
                        <div class="col">
                            <a class="btn btn-secondary btn-block" href="{{ route('pdfLab', $consulta->id) }}" target="_blank"> <strong>
                                    <i class="fa fa-file-download fa-2x"></i> <br> Generar PDF
                                </strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD DE PEDIDO DE LABORATORIO -->
        <div class="col-4">
            <div class="card card-warning">
                <div class="card card-header">
                    <div class="card-title">
                        <strong> LABORATORIO </strong>
                    </div>
                </div>
                <div class="card-body">
                    @livewire('add-laboratorio', ['consulta' => $consulta])
                    <div class="col-10">
                        <button type="button" class="btn btn-success " wire:click='dispatch("modalLabOn")'>
                            <i class="fas fa-plus-circle"></i> <strong> Nuevo pedido </strong>
                        </button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consulta->laboratorios as $lab)
                            <tr>
                                <td>{{ $lab->tiposLaboratorios->descripcion}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-end pt-2 mb-2">
                        <div class="col">
                            <a class="btn btn-secondary btn-block" href="{{ route('pdfLab', $consulta->id) }}" target="_blank"> <strong>
                                    <i class="fa fa-file-download fa-2x"></i> <br> Generar PDF
                                </strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>