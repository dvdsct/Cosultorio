<div>
    @if ($modal)


        <div class="modal fade show" id="modal-receta" aria-labelledby="modal-default" style="display:block"
            aria-hidden="true">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title"> <strong> Nueva Receta </strong></h4>
                        <button type="button" class="close" wire:click='closeModal'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Buscador -->
                        <div class="row">
                            <div class="card-header">
                                <h3 class="card-title">Vademecum</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" wire:model.live="query" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Lista Vademecum -->
                            <div class="col">
                                <table id="myTable">
                                    <thead>
                                        <th>Presentacion</th>
                                        <th>droga</th>
                                        <th>Porcentaje Iosep</th>
                                    </thead>
                                    <tbody>



                                        @foreach ($vademecum as $v)
                                            <tr>
                                                <td>{{ $v->presentacion }}</td>
                                                <td>{{ $v->droga }}</td>
                                                <td>{{ $v->porcentaje_dto }}</td>
                                                <td><button class="btn btn-primary" wire:click='indicacionar({{ $v->id }})'><i
                                                            class="bi bi-journal-check"></i></button></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot id="footer-table">
                                        {{ $vademecum->links(data: ['scrollTo' => false]) }}


                                    </tfoot>


                                </table>
                            </div>

                            <!-- Lista Indicaciones -->
                            <div class="col">
                                <div>
                                    <div>
                                        <select wire:model='cie10' id="">
                                            @foreach ($cie10 as $c )

                                            <option value="{{ $c->id }}">{{ $c->descripcion .' - '. $c->codigo }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @foreach ($recetados as $r)
                                        <div class="row">
                                            <div class="col-3">
                                                <h3>{{ $r->first()->vademecums->droga}}</h3>
                                            </div>

                                            <div class="col-4">

                                                <h3>{{ $r->cantidad }}</h3>
                                            </div>
                                            <div class="col-5">
                                                <h3>{{ $r->indicacion }}</h3>
                                            </div>
                                            <div><button wire:click='borrarRecetado({{ $r->id }})'>-</button></div>



                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    @if ($remedio != null)
                                        <div class="col-3">
                                            <label for="">{{ $remedio['droga'] }}</label>
                                        </div>

                                        <div class="col-4">
                                            <label for="">Cantidad</label>
                                            <input type="text" class="form-control" wire:model='cantidad'>
                                        </div>
                                        <div class="col-5">
                                            <label for="">Horas</label>
                                            <input type="text" class="form-control" wire:model='horas'>
                                        </div>
                                        <div>
                                            <button class="btn" wire:click='recetar'>+</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='closeModal'>Cancelar</button>
                        <button type="button" class="btn btn-secondary" wire:click="guardarReceta">Aceptar</button>
                    </div>
                </div>

            </div>

        </div>

    @endif

</div>
