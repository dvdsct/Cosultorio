<div>
    @if ($modal)


        <div class="modal fade show" id="modal-receta" aria-labelledby="modal-default" style="display:block"
            aria-hidden="true">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title"> <strong> Nueva Receta </strong></h4>
                        <button type="button" class="close" wire:click='closeModal'>
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col">
                                <table id="myTable">
                                    <thead>
                                        <th>Presentacion</th>
                                        <th>droga</th>
                                        <th>Porcentaje Iosep</th>
                                    </thead>
                                    <tbody>



                                        @foreach ($vademecum as $v)
                                            <tr>
                                                <td>{{ $v->presentacion }}</td>
                                                <td>{{ $v->droga }}</td>
                                                <td>{{ $v->porcentaje_dto }}</td>
                                                <td><button wire:click='recetar({{ $v->id }})'><i
                                                            class="bi bi-journal-check"></i></button></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
<tfoot>
    {{ $vademecum->links() }}
</tfoot>


                                </table>
                            </div>
                            <div class="col">
                                <button wire:click='receta'> > </button>
                            </div>
                            <div class="col">
                                <div>
                                    @foreach ($recetados as $r)
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="">{{ $r['droga'] }}</label>
                                            </div>
                                            <div class="col-4">
                                                <label for="">Cantidad</label>
                                                <input type="text" class="form-control" placeholder=".col-4">
                                            </div>
                                            <div class="col-5">
                                                <label for="">Horas</label>
                                                <input type="text" class="form-control" placeholder=".col-5">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" wire:click='closeModal'>Cancelar</button>
                        <button type="button" class="btn btn-secondary">Aceptar</button>
                    </div>
                </div>

            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            new DataTable('#myTable');
        </script>
    @endif

</div>
