<div>
    <div class="row d-flex justify-content-between" style="padding-top: 20px;">

        <!-- FECHA  -->
        <div class="col-md-3 d-flex align-items-center">
            <button wire:click='change_day("yes")' class="btn btn-info btn-sm">
                <i class="fas fa-arrow-left"></i></button>
            <input type="date" wire:model.lazy="fecha" class="form-control">
            <button wire:click='change_day("tmw")' class="btn btn-info btn-sm"><i class="fas fa-arrow-right"></i></button>
        </div>

        <!-- TEXTO QUE MUESTRA LA FECHA ACTUAL -->
        <div class="col-md-5">
            <h1 style="text-align: center;">
                <strong> <small class="badge ">{{ ucfirst(Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ')) }} </small> </strong>
            </h1>
        </div>

        <!-- BOTON PARA GENERAR NUEVO TURNO -->
        <div class="col-md-3 col-xs-3 pt-2">
         
            <button type="button" class="btn btn-block btn-info" id="btn_turno" data-target="modal-default" wire:click='openModal'>
                <i class="fas fa-plus-circle"></i> Nuevo Turno </button>
  
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-12">
            <div class="card">
                @if ($turnos->isEmpty())
                <h6 class="font-italic pt-2 pl-3"> Aun no hay turnos asignados para este día!</h6>
                @else
                <table class="table table-hover" id="tabla_turnos">
                    <thead>
                        <th scope="col"> Horario</th>
                        <th scope="col"> Paciente </th>
                        <th scope="col"> <span> Medico </span> </th>
                        <th scope="col"> <span> Abono </span> </th>
                        <th scope="col"> Motivo </th>
                        <th scope="col"> </th>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                        <tr>
                            <td class="p-0 pl-2">
                                @if ($turno->fecha_turno !== null)
                                {{ Carbon\Carbon::parse($turno->fecha_turno)->format('H:i') }} hs.
                                @endif
                            </td>

                            <td class="p-0 pl-2"> {{ $turno->pacientes->perfiles->personas->nombre }}
                                {{ $turno->pacientes->perfiles->personas->apellido }}
                            </td>

                            <td class="p-0 pl-2"><span>
                                    {{ $turno->medicos->perfiles->personas->apellido }}
                                    {{ $turno->medicos->perfiles->personas->nombre}}
                                </span></td>

                            <td class="p-0 pl-2">
                                <span> ${{ $turno->abonos->first()->monto ?? 'Sin abono' }} </span>
                            </td>
                            <td class="p-0 pl-2">
                                @if ($turno->motivo == '1')
                                <small class="badge badge-success"> PAP-Colposcopia </small>
                                @elseif ($turno->motivo == '2')
                                <small class="badge badge-primary"> Consulta </small>
                                @endif
                            </td>


                            <td class="p-1 pl-2">
                                <!-- SI LA CONSULTA NO ESTA FINALIZADA (ESTADO = 3) ENTONCES SE MUESTRA EL BOTON "ATENDER" PARA EL MEDICO-->
                                @if ($turno->estado != '3')
                                @can('atender')
                                <div class="btn-group">
                                    @if ($turno->motivo == '1')
                                    <a type="button" href="{{ url('paps') }}/{{ $turno->paps->id }}" class="btn btn-info btn-sm">Atender</a>
                                    @elseif ($turno->motivo == '2')
                                    <a type="button" href="{{ url('consulta') }}/{{ $turno->consultas->id }}" class="btn btn-info btn-sm">Atender</a>
                                    @endif
                                </div>
                                @endcan
                                <!-- SI EL ESTADO ES 3, SE MUESTRA LA FRASE "ATENDIDO" -->
                                @else
                                <div class="btn-group">
                                    <small class="badge badge-secondary">Atendido</small>
                                </div>
                                @endif

                                <!-- SI LA CONSULTA NO ESTA FINALIZADA (ESTADO = 3) ENTONCES SE MUESTRAN LOS BOTONES DE EDITAR Y ELIMINAR PARA LA SECRETARIA -->
                                @if ($turno->estado != '3')
                                @can('crearturno')
                                <button type="button" class="btn btn-warning btn-sm" wire:click="editTurn({{ $turno->id }})">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" type="button" wire:click="eliminar({{ $turno->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                @endcan
                                @endif
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>

    <!-- MODAL  -->
    @if ($modal)
    <div class="modal fade show" id="modal-default" aria-labelledby="modal-default" style="display:block" aria-hidden="true">
        <div class="modal-dialog" wire:keydown.escape="closeModal">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><strong> NUEVO TURNO PARA EL 
                    {{ strtoupper(Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ')) }} </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeModal'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit='addTurno'>
                    <div class="card-body">
                        <!--                             {{ $paciente }} -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="medico">Medico</label>
                                    <select class="form-control" wire:model='medico'>
                                        <option selected> Seleccionar medico</option>
                                        @foreach ($medicos as $m)
                                        <option value="{{ $m->id }}">
                                            {{ $m->perfiles->personas->apellido }} {{ $m->perfiles->personas->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_horario">Horario</label>
                                    <input type="time" class="form-control" id="horario" wire:model='horario'>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">DNI</label>
                                    <input type="text" class="form-control" id="nombre" {{ $onOffedit }} wire:model='dni' wire:keydown='upPaciente' placeholder="12345678">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" {{ $onOff }} wire:model='nombre' placeholder="Nombre">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_nombre">Apellido</label>
                                    <input type="text" class="form-control" id="nombre" {{ $onOff }} wire:model='apellido' placeholder="Apellido">
                                </div>
                            </div>


                            <div class="col-md-5">
                                <label for="input_obra_soc">Obra Social</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="obra_soc" wire:model='os'>
                                        @foreach ($oss as $o)
                                        <option value="{{ $o->id }}">{{ $o->descripcion }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-3">
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
                                        <option value="1">PAP - Colpo</option>
                                        <option value="2">Consulta</option>
                                    </select>
                                </div>
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger col-md-12">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <ul>{{ $error }}</ul>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" wire:click='closeModal'>Cancelar</button>
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

    <style>
        @media only screen and (max-width: 475px) {
            #tabla_turnos span {
                display: none;
            }
        }
    </style>

</div>
