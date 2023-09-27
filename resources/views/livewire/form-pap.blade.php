<div>
    <form wire:click="add_pap">
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
      <select class="form-select" aria-label="Default select example">
        <option value="1">Exocervical(C)</option>
        <option value="2">Endocervical</option>
        <option value="3">Exo y Endo cervical</option>
        <option value="4">Cúpula Vaginal</option>
      </select>


      <h4>Método Toma Muestra:</h4>
<<<<<<< HEAD
      <label for="">Espátula</label> <input type="checkbox" wire:model='met_mues' >
      <label for="">Cepillo</label> <input type="checkbox" wire:model='met_mues'>
      <label for="">Espátula y Cepillo</label> <input type="checkbox" wire:model='met_mues'>
      <label for="">Hisopo Líquido</label> <input type="checkbox" wire:model='met_mues'>
      <label for="">Sin Datos</label> <input type="checkbox" wire:model='met_mues'>
=======
      <select class="form-select" aria-label="Default select example">
        <option value="1">Espátula</option>
        <option value="2">Cepillo</option>
        <option value="3">Espátula y Cepillo</option>
        <option value="4">Hisopo Líquido</option>
        <option value="5">Sin Datos</option>
      </select>
     </div>
>>>>>>> fd4ba212eb1ee710fe1019ddb2294df3ab42dab6


      <div>
      <h3>TAMIZAJE ANTERIOR</h3>
      <label for="">SI</label> <input type="radio">
      <label for="">NO</label> <input type="radio">
      <h4> + o - </h4><input type="date">

<<<<<<< HEAD
      <h4>PAP Previo</h4>
      <label for="">NO</label><input type="checkbox">
      <label for="">SI</label> <input type="checkbox"><input type="date">
      <br>
      <label for="">- de 3 años</label><input type="checkbox">
      <label for="">+ de 3 años</label><input type="checkbox">
=======
    </div>
    <div>
>>>>>>> fd4ba212eb1ee710fe1019ddb2294df3ab42dab6

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

        <h3> FUM </h3><input type="date">

        <h3>Menopausia</h3>
        <label for="">SI</label> <input type="radio">
        <label for="">NO</label> <input type="radio">

        <h3>Método Anticonceptivo</h3>
        <select class="form-select" aria-label="Default select example">
            <option value="1">Hormonal</option>
            <option value="2">Barrera</option>
            <option value="3">DIU</option>
            <option value="4">Otro</option>
        </select>
          <label for="">Otro: </label><input type="text">


        <h3>Cirugías Previas</h3>
        <select class="form-select" aria-label="Default select example">
            <option value="1">Histerectomía</option>
            <option value="2">LEEP</option>
            <option value="3">Cono</option>
        </select>
          <label for="">Causa o Lesión: </label><input type="text">


        <h3>Terapia Hormonal de Reemplazo(THR)</h3>
         <label for="">SI</label> <input type="radio">
         <label for="">NO</label> <input type="radio">

    <h3> Embarazo Actual </h3>
      <label for="">SI</label> <input type="radio">
      <label for="">NO</label> <input type="radio">

    <h3> Tratamiento Radiante </h3>
      <label for="">SI</label> <input type="radio">
      <label for="">NO</label> <input type="radio">

    <h3> Quimioterapia </h3>
      <label for="">SI</label> <input type="radio">
      <label for="">NO</label> <input type="radio">

    </div>
</form>
