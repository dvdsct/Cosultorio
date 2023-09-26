<div>
    <div class="row d-flex justify-content-between">
        <div class="col-2">

            <input type="date"  wire:model.lazy="fecha" wire:change='set_date'>


        </div>
        <div class="col-2">
            <h1>{{ Carbon\Carbon::parse($fecha)->locale('es')->isoFormat('dddd DD ') }}</h1>
            {{ $fecha . 'aqui' }}
        </div>
        <div class="col-1"><button type="button" class="btn btn-block btn-success">Nuevo</button></div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th> Hora </th>
                        <th> Paciente </th>
                        <th> Obra social</th>
                        <th> Abono </th>
                        <th> </th>
                    </thead>
                    <tbody>
                        @foreach ($turnos as $turno)
                            <tr>
                                <td> {{ Carbon\Carbon::parse($turno->fecha_consulta)->format('H:i') }} </td>
                                <td> {{ $turno->nombre }} </td>
                                <td> {{ $turno->descripcion }} </td>
                                <td> {{ $turno->apellido }} </td>
                                <td> {{ $turno->estado }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </div>
</div>
