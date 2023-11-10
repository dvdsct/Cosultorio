<div>
    <div class="modal fade" id="modal-receta" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"> <strong> Nueva Receta </strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table id="myTable" class="table table-striped">
                        <thead>
                            <th>Presentacion</th>
                            <th>droga</th>
                            <th>Porcentaje Iosep</th>
                        </thead>


                        @foreach ($vademecum as $v)
                            <tr>
                                <td>{{ $v->presentacion }}</td>
                                <td>{{ $v->droga }}</td>
                                <td>{{ $v->porcentaje_dto }}</td>

                            </tr>
                        @endforeach

                    </table>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-secondary">Aceptar</button>
                </div>
            </div>

        </div>

    </div>

    @push('js')
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
    @endpush
</div>
