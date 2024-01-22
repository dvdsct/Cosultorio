<div>
    <button class="btn btn-primary" wire:click='openModal'></button>
    <div class="row d-flex justify-content-between" style="padding-top: 20px;">
        <div class="col-3 d-flex align-items-center">

            <button wire:click='change_day("yes")' class="btn btn-info btn-sm">
                <i class="fas fa-arrow-left"></i></button>
            <input type="date" wire:model.lazy="fecha" class="form-control">
            <button wire:click='change_day("tmw")' class="btn btn-info btn-sm"><i
                    class="fas fa-arrow-right"></i></button>


        </div>
        <div class="col-3">
            <h1>{{ ucfirst(Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ')) }}</h1>
        </div>
        <div class="col-2 pt-2 mr-2">
            @can('crearturno')
                <button type="button" class="btn btn-block btn-info" data-target="modal-default" wire:click='openModal'>
                    Nuevo Turno</button>
            @endcan
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-12">
            <div class="card">

                @if ($turnos->isEmpty())
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
                                <td class="p-0 pl-2">
                                    @if ($turno->fecha_turno !== null)
                                        {{ Carbon\Carbon::parse($turno->fecha_turno)->format('H:i') }} hs.
                                    @endif
                                </td>

                                <td class="p-0 pl-2"> {{ $turno->perfils->personas->nombre }}
                                    {{ $turno->perfils->personas->apellido }}
                                </td>

                                <td class="p-0 pl-2"> {{ $turno->perfils->obrasociales->first()->descripcion }} </td>

                                <td class="p-0 pl-2">
                                    ${{ $turno->abonos->first()->monto ?? 'Sin abono' }}
                                </td>
                                <td class="p-0 pl-2">
                                    @if ($turno->motivo == '1')
                                        <small class="badge badge-danger"> PAP </small>
                                    @elseif ($turno->motivo == '2')
                                        <small class="badge badge-warning"> Colposcopia </small>
                                    @elseif ($turno->motivo == '3')
                                        <small class="badge badge-success"> Consulta </small>
                                    @endif
                                </td>
                                <td class="p-0 pl-2">

                                </td>
                                <td class="p-1 pl-2">
                                    @can('atender')
                                        <div class="btn-group">
                                            @if ($turno->motivo == '3')
                                                <a type="button" href="{{ url('consulta') }}/{{ $turno->consultas->id }}"
                                                    class="btn btn-info btn-sm">Atender</a>
                                            @endif
                                            @if ($turno->motivo == '1')
                                                <a type="button" href="{{ url('paps') }}/{{ $turno->paps->id }}"
                                                    class="btn btn-info btn-sm">Atender</a>
                                            @endif
                                            @if ($turno->motivo == '2')
                                                <a type="button" href="{{ url('colpos') }}/{{ $turno->id }}"
                                                    class="btn btn-info btn-sm">Atender</a>
                                            @endif
                                        </div>
                                    @endcan
                                    @can('crearturno')
                                        <button type="button" class="btn btn-warning btn-sm"
                                            wire:click="editTurn({{ $turno->id }})">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" type="button"
                                            wire:click="eliminar({{ $turno->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endcan
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





    @if ($modal)


        <div class="modal fade show" id="modal-default" aria-labelledby="modal-default" style="display:block"
            aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title"><strong> Nuevo Turno para el
                                {{ Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ') }} </strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            wire:click='closeModal'>
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
                                        <input type="text" class="form-control" id="nombre" {{ $onOffedit }}
                                            wire:model='dni' wire:keydown='upPaciente' placeholder="12345678">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" {{ $onOff }}
                                            wire:model='nombre' placeholder="Nombre">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_nombre">Apellido</label>
                                        <input type="text" class="form-control" id="nombre"
                                            {{ $onOff }} wire:model='apellido' placeholder="Apellido">
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
                                            <input type="text" class="form-control" id="abono"
                                                wire:model='abono'>
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
                                <button type="button" class="btn btn-default"
                                    wire:click='closeModal'>Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>


    @endif













    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('eliminar?', (t) => {
                console.log('aqui');


                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás revertir esto!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eliminarElemento');
                    }
                });
            });



        });
    </script>


    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    @script
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('3256308c17e4278e362b', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {

            $wire.dispatch('refresh-turn')


            // var soundfile = "sounds/videoplayback2.mp3";
            // var audplay = new Audio(soundfile)
            // audplay.play();

        });
    </script>
    @endscript


</div>
