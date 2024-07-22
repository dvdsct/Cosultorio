<div>
<!--     <button wire:click="setStep(1)"> patrá</button>
    <button wire:click="setStep(2)"> palante</button> -->

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Consulta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Pedidos</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <!-- TA - Temperatura - FUM - IMC -->
                            @livewire('parametros',['consulta' => $consulta])
                            <!-- Observaciones y Diagnostico -->
                            @livewire('enfermedad-actual',['consulta' => $consulta])
                            <!-- Historial de consultas -->
                            @livewire('consultas',['consulta' => $consulta])
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            @livewire('pedidos',['consulta' => $consulta])
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>