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
        <div class="col-2"><button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal-default">Nuevo Turno</button></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <th scope="col"> Horario </th>
                        <th scope="col"> Paciente </th>
                        <th scope="col"> Obra social</th>
                        <th scope="col"> Abono </th>
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
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
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

    @livewire('form-turno')


</div>