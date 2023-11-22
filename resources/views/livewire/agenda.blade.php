<div>
    <div class="row d-flex justify-content-between" style="padding-top: 20px;">
        <div class="col-3 d-flex align-items-center">

            <button wire:click='change_day("yes")' class="btn btn-info btn-sm">
                <i class="fas fa-arrow-left"></i></button>
            <input type="date" wire:model.lazy="fecha" class="form-control">
            <button wire:click='change_day("tmw")' class="btn btn-info btn-sm"><i class="fas fa-arrow-right"></i></button>


        </div>
        <div class="col-3">
            <h1>{{ ucfirst(Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ')) }}</h1>
        </div>
        <div class="col-2 pt-2 mr-2"><button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal-turno">Nuevo Turno</button></div>
    </div>
    <div class="table-responsive">
        <div class="col-12">
            <div class="card">

                @if($turnos->isEmpty())
                <h6 class="font-italic pt-2 pl-3"> Aun no hay turnos asignados para este día!</h6>
                @else
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
                            <td class="pb-0 pt-1"> @if($turno->fecha_turno) {{ Carbon\Carbon::parse($turno->fecha_turno)->format('H:i') }} Hs. @endif </td>
                            <td class="pb-0 pt-1"> {{ $turno->apellido }} {{ $turno->nombre }} </td>
                            <td class="pb-0 pt-1"> {{ $turno->descripcion }} </td>
                            <td class="pb-0 pt-1"> @if($turno->monto)
                                ${{ $turno->monto }}
                                @endif </td>
                            <td class="pb-0 pt-0"> @if($turno->motivo=='PAP') <small class="badge badge-warning "> {{ $turno->motivo  }}</small>
                                @elseif($turno->motivo=='Consulta') <small class="badge badge-primary "> {{ $turno->motivo  }} </small>
                                @else <small class="badge badge-success "> {{ $turno->motivo  }} @endif</td>
                            <td class="pb-0 pt-1">
                                <select class="form-control form-control-sm">
                                    <option value="1"> <i class="far fa-clock"></i> Aún no llega </option>
                                    <option value="2"> <i class="far fa-clock"></i> Llegó </option>
                                    <option value="3"> <i class="far fa-clock"></i> Ausente </option>
                                </select>
                            </td>
                            <td class="pb-0 pt-1">
                                <div>
                                    <a type="button" href="{{ url('consulta') }}/{{ $turno->id }}" class="btn btn-info btn-sm">Atender</a>
                                </div>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" type="button" wire:click="delTurn" wire:confirm="Are you sure you want to delete this post?">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>

    <!-- MODAL  -->

    <div class="modal fade show" id="modal-turno" aria-modal="true" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><strong> Nuevo Turno para el
                            {{ Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ') }} </strong></h4>
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">DNI</label>
                                    <input type="text" class="form-control" id="nombre" wire:model='dni' wire:keydown='upPaciente' placeholder="12345678">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" wire:model='nombre' placeholder="Nombre">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">Apellido</label>
                                    <input type="text" class="form-control" id="nombre" wire:model='apellido' placeholder="Apellido">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input_obra_soc">Obra Social</label>
                                    <select class="form-control" id="obra_soc" wire:model='os'>
                                        @foreach ($oss as $o)
                                        <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input_abono">Abono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" id="abono" wire:model='abono'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Motivo</label>
                                    <select class="form-control" wire:model='motivo'>
                                        <option value="1">PAP</option>
                                        <option value="2">Colpo</option>
                                        <option value="3">Consulta</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>



</div>