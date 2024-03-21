<div>

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" wire:model='query' wire:keyup='search' class="form-control float-right"
                        placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>






        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $p)
                        <tr>
                            <td>{{ $p->dni }}</td>
                            <td>{{ $p->nombre . ' ' . $p->apellido }}</td>
                            <td>
                                {{ $p->descripcion }}
                            </td>
                            <td>
                                <a type="button" href="{{ route('receta.show',$p->id) }}" class="btn btn-info btn-sm">Recetar</a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>
