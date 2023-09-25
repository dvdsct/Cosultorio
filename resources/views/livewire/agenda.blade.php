<div>
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
                    @foreach($turnos as $turno)
                    <tr>
                        <td> {{Carbon\Carbon::parse($turno->fecha_consulta)->format('H:i')}} </td>
                        <td> {{$turno->nombre}} </td>
                        <td> {{$turno->descripcion}} </td>
                        <td> {{$turno->apellido}} </td>
                        <td> {{$turno->estado}} </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>


            </div>

        </div>
    </div>
</div>