<div>
<!-- TABLA PARA GENERAR NUEVA RECETA -->
    <div class="card">
        <div class="card-header mt-4 bg-info">
            <h3 class="card-title"><strong></strong></h3>
            <div class="card-tools">
                <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i>
                </span>
            </div>
            <input type="number" class="form-control"  wire:model='query' wire:keyup='search' placeholder="Ingresar DNI">
        </div>
            </div>
        </div>

        <!-- TABLA DE RESULTADOS -->

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">DNI</th>
                        <th>Paciente</th>
                        <th>Edad</th>
                        <th>Telefono</th>
                        <th>Obra social</th>
                        <th>N° de OS</th>
                        <th style="width: 40px"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $p)
                    <tr>
                        <td>{{ $p->dni }}</td>
                        <td>{{ $p->apellido . ' ' . $p->nombre }}</td>
                        <td>-</td>
                        <td>{{ $telefono->numero ?? '' }}</td>
                        <td>{{ $p->descripcion }} </td>
                        <td></td>
                        <td>
                            <a type="button" href="{{ route('receta.show',$p->id) }}" class="btn btn-primary btn-sm">Recetar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>