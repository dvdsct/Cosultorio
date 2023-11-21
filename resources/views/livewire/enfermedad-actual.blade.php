<div class="pt-3">
    <div class="row">
        <div class="card card-info col mx-2 px-0">
            <div class="card-header">
                <h3 class="card-title"> <strong>ENFERMEDAD ACTUAL </strong></h3>
            </div>

            <!-- Contenedor de Enfermedad Actual -->
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group" style="height: 40%;">
                                <label>Diagnóstico</label>
                                <textarea class="form-control" style="height: 80%;" placeholder="" wire:model='ea'></textarea>
                            </div>

                            <div class="form-group mb-0" style="height: 40%;">
                                <label>Observaciones</label>
                                <textarea class="form-control" style="height: 80%;" placeholder="" wire:model='obs' wire:keydown.enter='setEa'></textarea>
                            </div>
                        </div>
                        <div class="col-5 ">
                            <div class="card" style="min-height: 31vh;">
                                <div class="card-header bg-info">
                                    <h3 class="card-title"> <strong>PEDIDOS </strong></h3>
                                </div>

                                <div class=" table pt-3">
                                    <div class="d-flex justify-content-around">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info col-3" data-toggle="modal" data-target="#modal-receta">
                                            <strong> Receta </strong> </button>
                                        <button type="button" class="btn btn-warning col-3" data-toggle="modal" data-target="#modal-laboratorio">
                                            Laboratorio </button>
                                        <button type="button" class="btn btn-danger col-3" data-toggle="modal" data-target="#modal-imagen">
                                            <strong> Imagen </strong> </button>
                                    </div>
                                </div>


                                <div class="card-body pt-0">
                                    <table class="table">
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
                                            <tr class="table-border-bottom">
                                                <td> Labaoratorio </td>
                                                <td>

                                                </td>
                                                <td class="p-2">
                                                    <div class="btn-group btn-group-sm">
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