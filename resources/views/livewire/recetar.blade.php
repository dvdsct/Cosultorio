<div>

    @if ($consulta->estado == '2')

        <!-- Buscador de Vademecum-->
        <div class="card-header row">
            <div class="card-header col-md-6 border-bottom-0" style="height: 40px;">
                <div class="card-tools" style="width: 100%;">
                    <div class="input-group input-group-sm">
                        <input type="text" wire:model.live="query" class="form-control float-right"
                            placeholder="Medicamento">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Buscador de CIE10-->
            <div class="col-6 " style="height: 40px;">
                <select wire:model='cie10' class="form-control" {{ $des }}>
                    <option selected> Selecciona un diagnostico</option>
                    @foreach ($cie10s as $c)
                        <option value="{{ $c->id }}">{{ $c->descripcion . ' - ' . $c->codigo }}</option>
                    @endforeach
                </select>
                <div class="text-red">
                    @error('cie10')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>


        <!-- Lista Vademecum -->
        <div class="row px-2">
            <div class="col-md-6 px-4">
                <table id="myTable" class="table table-hover ml-4">
                    <thead>
                        <th>Presentacion</th>
                        <th>Droga</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($vademecum as $v)
                            <tr>
                                <td class="p-0"> <span style="font-size: 12px;">{{ $v->nombre . ' ' . $v->cantidad }}
                                    </span></td>
                                <td class="p-0"> <span style="font-size: 12px;"> {{ $v->droga }} </span> </td>
                                <td class="p-0"> <span style="font-size: 12px;"> {{ $v->cantidad }} </span> </td>
                                <td class="p-0" style="display: flex; justify-content:flex-end;"><button
                                        class="btn btn-info btn-sm" wire:click='indicacionar({{ $v->id }})'><i
                                            class="bi bi-journal-check"></i> Recetar</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="footer-table">
                    </tfoot>
                </table>
                <div class="d-flex justify-content-around">

                    {{ $vademecum->links(data: ['scrollTo' => '#footer-table']) }}
                </div>
            </div>

            <div class="col-md-6 px-4">
                <div class="recetados">
                    <div class="row mb-4">
                        @if ($remedio != null)
                            <div class="col-5">
                                <label
                                    for="">{{ ucfirst($remedio['droga']) . ' ' . ucfirst($remedio['cantidad']) }}</label>
                            </div>

                            <div class="col-3">
                                <!--  <label for="">Cantidad</label> -->
                                <input type="text" class="form-control form-control-sm" wire:model='cantidad'
                                    placeholder="Cantidad">
                            </div>
                            <div class="col-3">
                                <!--  <label for="">Horas</label> -->
                                <input type="text" class="form-control form-control-sm" wire:model='horas'
                                    placeholder="Horas">
                            </div>
                            <div class="col-1">
                                <button class="btn btn-success btn-sm" type="button" wire:click='recetar' ><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

    @endif


    <!-- RECETADOS - LISTA FINAL  -->


    <table class="table table-striped">
        <thead>
            <th></th>
            <th></th>
            <th></th>

        </thead>
        <tbody>
            @foreach ($recetados as $r)
                <tr>
                    <td>
                        <div class="">
                            <h5>{{ ucfirst($r->vademecums->droga . ' ' . $r->vademecums->cantidad) }}</h5>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <h5>{{ $r->cantidad }}</h5>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <h5>{{ $r->indicacion }}</h5>
                        </div>
                    </td>
                    <td>
                        <div class="col-1">
                            <button class="btn btn-danger btn-sm" type="button"
                                wire:click='borrarRecetado({{ $r->id }})'>
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>

</div>
</div>
</div>
