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

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">FICHA DE SOLICITUD DE LA CITOLOGÍA EXFOLIATIVA (PAP)</h3>
      </div>

      <form>
        <div class="card-body">
          <h5> Antecedentes </h5>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
              <label> FUM </label> <input type="date" wire:model='fum'>
              </div>
              

              <h5>Menopausia</h5>
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
            </div>

            <div class="col-md-6">
              <h3>Terapia Hormonal de Reemplazo(THR)</h3>
              <label for="">SI</label> <input type="checkbox" wire:model='thr'>


              <h3> Embarazo Actual </h3>
              <label for="">SI</label> <input type="checkbox" wire:model.live='embarazo'>
              {{$embarazo}}

              <h3> Tratamiento Radiante </h3>
              <label for="">SI</label> <input type="checkbox" wire:model='trat_rad'>


              <h3> Quimioterapia </h3>
              <label for="">SI</label> <input type="checkbox" wire:model='quimio'>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
              <label>Tipo de Muestra:</label>
              <select class="custom-select rounded-0" aria-label="Default select example" wire:model='tipo_muestra'>
                @foreach ($tipos_muestras as $tp)
                <option value="{{$tp->id}}">{{$tp->descripcion}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label>Método Toma Muestra:</label>
              <select class="custom-select rounded-0" aria-label="Default select example" wire:model='toma_muestra'>
                @foreach ($tomas_muestras as $tm)
                <option value="{{$tm->id}}">{{$tm->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <hr>


          <h4>TAMIZAJE ANTERIOR</h4>
          <div class="row">
            <div class="col-md-4">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Test de VPH </label>
              </div>
              <h4> + o - </h4>
              <input type="date" wire:model='fec_tam' class="form-control">
            </div>


            <div class="col-md-4">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch2" wire:click='pap_previo' wire:model='check_pap'>
                <label class="custom-control-label" for="customSwitch2">PAP Previo </label>
              </div>
              <input type="date" class="form-control mt-3" {{$v_pp}} wire:model='fec_pap_previo' >
            </div>

            <div class="col-md-4">
              <h4> Resultado PAP previo </h4>
              <select class="custom-select">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>








    <div>


      {{--
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

  </form>