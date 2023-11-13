<div class="pt-3">
    <div class="row">
        <div class="card card-info col mx-2 px-0">
            <div class="card-header">
                <h3 class="card-title">Enfermedad Actual</h3>
            </div>

            <div class="card-body ">
                <form>
                    <div class="row">

                        <div class="col-7">

                            <div class="form-group">
                                <label>Enfermedad Actual</label>
                                <textarea class="form-control" placeholder="" wire:model='ea'></textarea>
                            </div>

                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea class="form-control" placeholder="" wire:model='obs' wire:keydown.enter='setEa'></textarea>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title">Pedidos</h3>
                                </div>

                                <div class="pt-3">
                                    <div class="d-flex justify-content-around">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info col-3" data-toggle="modal" data-target="#modal-receta">
                                         <strong>  Receta  </strong> </button>
                                        <button type="button" class="btn btn-warning col-3" data-toggle="modal" data-target="#modal-laboratorio">
                                           <strong> Laboratorio </strong> </button>
                                        <button type="button" class="btn btn-danger col-3" data-toggle="modal" data-target="#modal-imagen">
                                           <strong> Imagen  </strong> </button>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tipo</th>
                                                <th>Descripcion</th>
                                                <th style="width: 40px">

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laboratorios as $lab)
                                            <tr>
                                                <!--  <td>{{ $lab->id }}</td> -->
                                                <td> Labaoratorio </td>
                                                <td>

                                                </td>
                                                <td class="p-0">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
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

                    </div>
                </form>
            </div>

        </div>
    </div>

    @livewire('receta')
    @livewire('add-laboratorio',['consulta' => $consulta])
    @livewire('add-imagen',['consulta'=>$consulta])
</div>