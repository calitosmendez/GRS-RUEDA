<div class="container row">
  <div class="col s12">
    <fieldset>
      <legend>Encabezado</legend>
      <div class="input-field col s6 ">
        <select class="browser-default" id="slcCliete" name="">
          <option value="">Seleccione un cliente</option>
          <?php foreach ($lista as $key => $value): ?>
            <option value="<?= $value->CardCode ?>"><?= $value->CardName ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col s6">
        <div class="input-field col s12">
            <input type="text" class="datepicker" id="txtFecha">
            <label for="">Fecha</label>
        </div>
      </div>
      <div class="col s6">
        <div class="col s12 input-field">
          <input placeholder="" id="txtCodigo" type="text" class="validate" readonly>
          <label for="txtCodigo">Codigo</label>
        </div>
        <div class="col s12 input-field">
          <input placeholder="" id="txtCodigo" type="text" class="validate" readonly>
          <label for="txtCodigo">Limite de Credito</label>
        </div>
        <div class="col s12 input-field">
          <input placeholder="" id="txtCodigo" type="text" class="validate" readonly>
          <label for="txtCodigo">Saldo de Credito</label>
        </div>
      </div>
      <div class="col s6">
        <div class="col s12 input-field">
          <button type="button" id="btnGuardarEncabezado" name="button" class="blue btn col s12">Guardar</button>
        </div>
      </div>
    </fieldset>
  </div>
  <div class="col s12">
    <br>
    <div class="col s12" id="divDet" style="border: 1px solid black; overflow: scroll;">

    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').datepicker();
  });

  $('#slcCliete').change(function(event) {
    $('#txtCodigo').val($('#slcCliete').val());
  });

  $('#btnGuardarEncabezado').click(function(event) {
    arreglo = {
      clienteTxt: $('#slcCliete option:selected').text(),
      clienteCod: $('#slcCliete').val(),
      fecha:      $('#txtFecha').val()
    }
    if(arreglo.clienteCod!= '' && arreglo.fecha!=''){
      $('#slcCliete').attr('disabled', 'true');
      $('#txtFecha').attr('disabled', 'true');
      $('#btnGuardarEncabezado').attr('disabled', 'true');
      $.post('<?=URL?>home/setEncabezado', arreglo, function(data, textStatus, xhr) {
        $('#divDet').html(data);
      });
    }else {
      M.toast({html: 'favor de revisar sus datos'})
    }
  });


</script>
