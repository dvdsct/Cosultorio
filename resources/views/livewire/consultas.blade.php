<div class="card">
    <div class="card-header  bg-info">
        <h3 class="card-title">Consultas</h3>
        <div class="d-flex justify-content-end">

        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">

                    <thead>
                        <th>#</th>
                        <th>Diagnostico</th>
                        <th>Observaciones</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                            <tr>
                                <td>{{ $consulta->id }}</td>
                                <td>{{ $consulta->ea }}</td>
                                <td>{{ $consulta->observaciones }}</td>
                                <td>{{ $consulta->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
    </div>
</div>
