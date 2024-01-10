<div class="card">
    <div class="card-header  bg-info">
        <h3 class="card-title"> <strong> HISTORIAL DE CONSULTAS </strong> </h3>
        <div class="d-flex justify-content-end">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table">

            <thead>
                <th>FECHA</th>
                <th>Diagnostico</th>
                <th>Observaciones</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr class="table-border-bottom">
                    <td style="width: 15%">{{ $consulta->ea}}</td>
                    <td>{{ $consulta->ea }}</td>
                    <td>{{ $consulta->id }}</td>
                    <td style="width: 10%"> <a class="btn btn-info btn-sm" href='{{route("consulta.show" , $consulta->id)}}'>
                            Ver
                        </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</div>
</div>
