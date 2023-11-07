<div>
    <div class="row d-flex justify-content-between" style="padding-top: 20px;">
        <div class="col-3 d-flex align-items-center">

            <button wire:click='change_day("yes")' class="btn btn-info btn-sm">
                <</button>
                    <input type="date" wire:model.lazy="fecha" class="form-control">
                    <button wire:click='change_day("tmw")' class="btn btn-info btn-sm">></button>


        </div>
        <div class="col-3">
            <h1>{{ ucfirst(Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ')) }}</h1>
        </div>
        <div class="col-2"><button type="button" class="btn btn-block btn-info" data-toggle="modal"
                data-target="#modal-turno">Nuevo Turno</button></div>
    </div>

    <div class="table-responsive">
        <div class="col-12">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <th scope="col"> Horario</th>
                        <th scope="col"> Paciente </th>
                        <th scope="col"> Obra social</th>
                        <th scope="col"> Abono </th>
                        <th scope="col"> Motivo </th>
                        <th scope="col"> Estado </th>
                        <th scope="col"> </th>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                            <tr>
                                <td> {{ Carbon\Carbon::parse($turno->fecha_consulta)->format('H:i') }} </td>
                                <td> {{ $turno->nombre }} </td>
                                <td> {{ $turno->descripcion }} </td>
                                <td> {{ $turno->apellido }} </td>
                                <td> {{ $turno->estado }}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </div>


    <!-- MODAL  -->

    <div class="modal fade show" id="modal-turno" aria-modal="true" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Turno para {{$fecha}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit='addTurno'>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_horario">Horario</label>
                                    <input type="time" class="form-control" id="horario" wire:model='horario'>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="input_nombre">DNI</label>
                                <input type="text" class="form-control" id="nombre" wire:model='dni'
                                    wire:keydown='upPaciente' placeholder="12345678">


                            </div>


                            <div class="form-group">
                                <label for="input_nombre">Paciente</label>
                                <input type="text" class="form-control" id="nombre" wire:model='nombre'
                                    placeholder="Nombre paciente">
                            </div>

                            <div class="form-group">
                                <label for="input_obra_soc">Obra Social</label>
                                <select class="form-control" id="obra_soc" wire:model='os'>
                                    @foreach ($oss as $o)
                                        <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="input_abono">Abono</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="abono" wire:model='abono'
                                        value="$">
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-info">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>



</div>
