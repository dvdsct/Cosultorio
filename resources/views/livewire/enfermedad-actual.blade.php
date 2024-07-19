<div class="pt-3">
    <div class="row">
        <div class="card card-info col mx-2 px-0">
            <div class="card-header">
                <h3 class="card-title"> <strong>ENFERMEDAD ACTUAL </strong></h3>
            </div>

            <!-- Contenedor de Enfermedad Actual -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7 col-xs-12" id="diagnostico">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Diagnóstico</strong></h3>
                            </div>
                            <div class="card-body p-2">
                                <textarea class="form-control" style="height: 100px;" placeholder="" wire:model='ea'></textarea>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Observaciones</strong></h3>
                            </div>
                            <div class="card-body p-2">
                                <textarea class="form-control" style="height: 100px;" placeholder="" wire:model='obs' wire:keydown.enter='setEa'></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-5 col-xs-12" id="pedidos">
                        <div class="card-header">
                            <h3 class="card-title"> <strong> Pedidos </strong> </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table">
                                <tbody>
                                    {{-- Recetas --}}
                                    <tr>
                                        @if ($consulta->estado == '3')
                                            {{-- Receta Consulta Pasada --}}
                                            <td>
                                                <!--                                             <div class="btn-group" style="width: 100%;">
                                                <button type="button" class="btn btn-danger btn-block rounded-left border-right mr-1" style="width: 100%;" wire:click='dispatch("modalOn")'>
                                                    <strong> Receta </strong>
                                                </button>
                                            </div> -->
                                            </td>
                                        @else
                                            {{-- Receta Consulta Actual --}}
                                            <td>
                                                <h5> <strong> <span
                                                            style="display: flex; align-items: center;">{{ count($consulta->recetas ?? 0) }}
                                                            Medicametos</span>
                                                    </strong> </h5>

                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn bg-purple btn-flat rounded-left mr-1"
                                                        wire:click='dispatch("modalOn")'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn bg-purple btn-flat rounded-right mr-5"
                                                        wire:click='delRecetas'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>


                                    {{-- Laboratorios --}}

                                    <tr>
                                        @if ($this->consulta->estado == '3')
                                            <td class="px-0">
                                                <button type="button"
                                                    class="btn btn-warning btn-block rounded-left mr-1"
                                                    style="width: 70%;" data-toggle="modal" wire:click="modalEditLab">
                                                    <strong> LABORATORIO </strong>
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                <h5> <strong> <span>{{ $total_lab }}
                                                            Laboratorio</span> </strong> </h5>
                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn btn-warning btn-flat rounded-left mr-1"
                                                        wire:click='dispatch("modalOnLab")'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>



                                                    <button type="button"
                                                        class="btn btn-warning btn-flat rounded-right mr-5"
                                                        wire:click='resetLab'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>


                                    <!-- -------------------- BOTON DE IMAGEN ----------------------------- -->

                                    <tr>
                                        @if ($consulta->estado == '3')
                                            <td class="px-0">
                                                <div class="btn-group" style="width: 70%;">
                                                    <button type="button"
                                                        class="btn btn-primary btn-block rounded-left  mr-1"
                                                        wire:click='dispatch("modalImgOn",{ tipo:"carga" })'>
                                                        <strong> IMAGENES </strong>
                                                    </button>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                <h5> <strong><span>
                                                            {{ count($consulta->imagenes) }} Imagen </span> </strong>
                                                </h5>
                                            </td>
                                            <td style="display:flex; justify-content: flex-end;">
                                                <div class="btn-group" style="width: 60%;">
                                                    <button type="button"
                                                        class="btn btn-primary btn-flat rounded-left  mr-1"
                                                        wire:click='dispatch("modalImgOn",{ tipo:"pedido" })'>
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>



                                                    <button type="button"
                                                        class="btn btn-primary btn-flat rounded-right mr-5"
                                                        wire:click='resetImgs'>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            <!-- SI LA CONSULTA ESTA EN PROGRESO SE MUESTRA EL BOTON DE FINALIZAR Y DESCARGAR -->
                            @if ($consulta->estado != '3')
                                <div class="row">
                                    <div class="col-8">
                                        <button type="button" class="btn btn-block btn-success mt-2"
                                            style="height: 90px;" wire:click='finConsulta()'>
                                            <i class="fa fa-check-circle fa-2x"></i> <br>
                                            <strong> FINALIZAR CONSULTA </strong></button>
                                    </div>

                                    <div class="col-4 pl-0">
                                        <a type="button" class="btn btn-block btn-secondary mt-2 pt-3"
                                            style="height: 90%;" href="{{ route('pdf.show', $consulta->id) }}"
                                            target="_blank">
                                            <i class="fa fa-file-download fa-2x"></i>
                                            <span> <strong> DESCARGAR </strong></span>
                                        </a>
                                    </div>
                                </div>
                                <!-- SI ES UNA CONSULTA FINALIZADA SOLO MUESTRA EL BOTON DE DESCARGAR -->
                            @else
                                <div class="col-12 px-0">
                                    <a type="button" class="btn btn-block btn-secondary mt-2 pt-3"
                                        style="height: 90%;" href="{{ route('pdf.show', $consulta->id) }}"
                                        target="_blank">
                                        <i class="fa fa-file-download fa-2x"></i> <br>
                                        <span> <strong> DESCARGAR </strong></span>
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>




    @livewire('add-imagen', ['consulta' => $consulta])
    @livewire('carga-estudios', ['consulta' => $consulta])



</div>
