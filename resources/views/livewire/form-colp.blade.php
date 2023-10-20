<div>
    <form wire:submit="add_colp">


        <div>
            <h4>COLPOSCOPIA:</h4>
            <h5>Responsable del Examen Colposcópico</h5>
            <label for="">Nombre</label> <input type="text" wire:model='responsable_n'>
            <label for="">Apellido</label> <input type="text" wire:model='responsable_a'>
            <label for="">Nombre del Establecimiento</label> <input type="text" wire:model='establecimiento'>
            <label for="">Localidad del Establecimiento</label> <input type="text" wire:model='localidad'>

        </div>
        <div>
            <h4>Informacion Complementaria:</h4>
            <h5>Test VPH:</h5>
            <label for="">SI</label> <input type="checkbox" wire:model='vph'>

            <h3>Resultado Citología</h3>
            <label for="">ASC-US</label> <input type="checkbox" wire:model='ascus'>
            <label for="">L SIL</label> <input type="checkbox" wire:model='lsil'>
            <label for="">ASC-H</label> <input type="checkbox" wire:model='asch'>
            <label for="">HSIL</label> <input type="checkbox" wire:model='hsil'>
            <label for="">CA</label> <input type="checkbox" wire:model='ca'>
            <label for="">OTROS</label> <input type="checkbox" wire:model='otros'>
        </div>
        <div>

            <label for="">Observaciones</label> <input type="text" wire:model='observaciones'>

        </div>
        <div>
            <h4>Evaluacion General</h4>
            <label for="">Adecuada</label><input type="checkbox" wire:model='evaluacion_adec'>
            <label for="">Inadecuada</label> <input type="checkbox" wire:model='evaluacion_inadec'>
            <br>

            <h4>Zona de Transformacion</h4>
            <select class="form-select" aria-label="Default select example" wire:model='zona_trans'>
                @foreach ($zonas as $z)
                    <option value="{{ $z->id }}">{{ $z->descripcion }}</option>
                @endforeach
            </select>
        </div>


        <div>

            <h3> Hallazgos Colposcópicos IFCPC 2011</h3>

            <label for="">Hallazgos Normales</label> <input type="checkbox" wire:model='hall_normales'>
            <label for="">Anormales Grado I (menor)</label> <input type="checkbox" wire:model='anormales1'>
            <label for=""> Grado II(mayor)</label> <input type="checkbox" wire:model='anormales2'>
            <label for=""> No Especifico</label> <input type="checkbox" wire:model='no_especifico'>
            <label for="">Sospecha de Invasión</label> <input type="checkbox" wire:model='sospecha_inv'>
            <label for="">Hallazgos Varios</label> <input type="checkbox" wire:model='hall_varios'>

        </div>

        <label for="">Biopsia</label> <input type="checkbox" wire:model='biopsia'>
        <label for="">ECC (Evaluacion Conducto Cervical)</label> <input type="checkbox" wire:model='evaluacion'>
        {{-- <label for="">Test de Schiller</label> <input type="checkbox"> --}}

        <div>
            <h3>Resultados de la Biopsia</h3>
            <label for="">Negativo</label> <input type="checkbox" wire:model='negat'>
            <label for="">CIN I</label> <input type="checkbox" wire:model='cin1'>
            <label for="">CIN II</label> <input type="checkbox" wire:model='cin2'>
            <label for="">CIN III</label> <input type="checkbox" wire:model='cin3'>
            <label for="">CIS</label> <input type="checkbox" wire:model='cis'>
            <label for="">Ca Invasor</label> <input type="checkbox" wire:model='ca_inv'>
            <label for="">Adenocis</label> <input type="checkbox" wire:model='adenocis'>
            <label for="">Adeno Ca Invasor</label> <input type="checkbox" wire:model='adeno_ca_inv'>
            <label for="">Otros</label><input type="checkbox" wire:model='bio_otros'>
        </div>

        <div>
            <h3>Tratamiento</h3>
            <h4>Escisión:</h4>
            <select class="form-select" aria-label="Default select example" wire:model='tratam'>
                @foreach ($tratamientos as $t)
                    <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <h3>Seguimiento:</h3> <input type="text" wire:model='seguimiento'>
        </div>
         <button type="submit"> Guardar</button>
    </form>
</div>
