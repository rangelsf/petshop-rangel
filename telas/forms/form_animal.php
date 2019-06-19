<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
  $clientes = selectAllClientes();
 ?>
<fieldset class="form-group">
  <label for="clientes">Cliente <i class="text-danger">*</i> </label>
  <select class="form-control" name="clientes" id="cliente" required>
    <option value="">Selecionar cliente</option>
    <?php foreach ($clientes as $key => $cliente): ?>
      <option value="<?php echo $cliente['cli_codigo']; ?>"><?php echo $cliente['cli_nome'] ?></option>
    <?php endforeach; ?>
  </select>
</fieldset>
<fieldset class="form-group">
  <label for="nome">Nome <i class="text-danger">*</i></label>
  <input id="nome" type="text" class="form-control" name="nome" required>
</fieldset>
<div class="row">
  <div class="col-md-6">
    <fieldset class="form-group">
      <label for="raca">Raça <i class="text-danger">*</i></label>
      <input id="raca" type="text" class="form-control"name="raca" required>
    </fieldset>
  </div>
  <div class="col-md-6">
    <fieldset class="form-group">
      <label for="data_nascimento">Data Nascimento <i class="text-danger">*</i></label>
      <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" required>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#data_nascimento').mask('0000-00-00');
        });
      </script>
    </div>
    </fieldset>
</div>
