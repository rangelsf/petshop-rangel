<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$animals = selectAllAnimals();
$servicos = selectAllServicos();
 ?>
<div class="row">
  <div class="col-md-6">
    <fieldset class="form-group">
      <label for="animals">Animal <i class="text-danger">*</i> </label>
      <select id="animals" class="form-control" name="animal" required>
        <option value="">Selecionar animal</option>
        <?php foreach ($animals as $key => $animal): ?>
          <option value=<?php echo $animal['animal_codigo'] ?>><?php echo $animal['animal_nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>
  </div>
  <div class="col-md-6">
    <fieldset class="form-group">
      <label for="animals">Serviço <i class="text-danger">*</i></label>
      <select id="servicos" class="form-control" name="servico" required>
        <option value="">Selecione um serviço</option>
        <?php foreach ($servicos as $key => $servico): ?>
          <option value="<?php echo $servico['srv_codigo'] ?>"><?php echo $servico['srv_descricao'] ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>
  </div>
</div>
