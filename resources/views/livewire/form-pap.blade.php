<div>
    <form wire:submit="add_pap">
     <div>
      {{-- <h3>TOMA DE MUESTRA</h3>
      <h4>Test VPH</h4>
      <label for="">SI</label>  <input type= "radio">
      <label for="">NO</label>  <input type="radio">
      <label for="">PAP de Tamizaje </label><input type="radio">
      <label for="">PAP de Seguimiento </label> <input type="radio"> --}}
     </div>

     <div>
     <h4>Tipo de Muestra:</h4>
      <select class="form-select" aria-label="Default select example" wire:model='tipo_muestra'>
        @foreach ($tipos_muestras as $tp )

        <option value="{{$tp->id}}">{{$tp->descripcion}}</option>
        @endforeach
      </select>


      <h4>Método Toma Muestra:</h4>
      <select class="form-select" aria-label="Default select example" wire:model='toma_muestra'>
        @foreach ($tomas_muestras as $tm )

        <option value="{{$tm->id}}">{{$tm->descripcion}}</option>
        @endforeach
      </select>
     </div>



      <div>
      <h3>TAMIZAJE ANTERIOR</h3>
      <label for="">SI</label> <input type="checkbox" wire:model='tamizaje'>
      <h4> + o - </h4><input type="date" wire:model='fec_tam'>


      <h4>PAP Previo</h4>
      <label for="">NO</label><input type="checkbox">
      <label for="">SI</label> <input type="checkbox"><input type="date">
      <br>
      <label for="">- de 3 años</label><input type="checkbox">
      <label for="">+ de 3 años</label><input type="checkbox">

    </div>
    <div>


      {{-- {
      <label for="">Centro de Toma de Muestra:</label> <input type="text">

      <h4>Responsable de la Toma</h4>
      <label for="">Nombre y Apellido </label><input type="text">
      <label for="">N° de Matricula </label><input type="text">
      <label for="">DNI </label><input type="text">


      <h3>LABORATORIO DE CITOLOGÍA</h3>
      <h4>Diagnóstico (SITAM / Bethesda):</h4>
      <label for="">I. Calidad de la muestra:</label> <input type="text">
      <label for="">II. Células escamosas:</label> <input type="text">
      <label for="">III. Células glandulares:</label> <input type="text">
      <label for="">IV. Otros hallazgos:</label> <input type="text">
      <label for="">V. Flora:</label> <input type="text">
      <label for="">VI. Sugerencias:</label> <input type="text">

      <h2>PROTOCOLO N°:</h2> --}}
    </div>

    <div>

        <h3> FUM </h3><input type="date" wire:model='fum'>

        <h3>Menopausia</h3>
        <label for="">SI</label> <input type="checkbox" wire:model='menop'>
        <label for="">NO</label> <input type="radio">

        <h3>Método Anticonceptivo</h3>
        <select class="form-select" aria-label="Default select example" wire:model='metodo_anti'>
            @foreach ($metodos_antis as $ma )

            <option value="{{$ma->id}}">{{$ma->descripcion}}</option>
            @endforeach
        </select>
          <label for="">Otro: </label><input type="text">


        <h3>Cirugías Previas</h3>
        <select class="form-select" aria-label="Default select example" wire:model='ciru_prev'>
           @foreach ($cirus_prevs as $cp )

           <option value="{{$cp->id}}">{{$cp->descripcion}}</option>
           @endforeach

        </select>
          <label for="">Causa o Lesión: </label><input type="text" wire:model='causales'>


        <h3>Terapia Hormonal de Reemplazo(THR)</h3>
         <label for="">SI</label> <input type="checkbox" wire:model='thr'>


    <h3> Embarazo Actual </h3>
      <label for="">SI</label> <input type="checkbox" wire:model='embarazo'>


    <h3> Tratamiento Radiante </h3>
      <label for="">SI</label> <input type="checkbox" wire:model='trat_rad'>


    <h3> Quimioterapia </h3>
      <label for="">SI</label> <input type="checkbox" wire:model='quimio'>


    </div>
    <button> Enviar </button>
</form>
