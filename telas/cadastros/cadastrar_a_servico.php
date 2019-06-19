<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once(BASE_PATH.'/head.php'); ?>
  </head>
  <body>
    <?php require_once(BASE_PATH.'/nav.php'); ?>
    <div class="content-wrapper">
      <div class="page-header m-3">
        <h1>Associar Serviço</h1>
      </div>
      <hr>
      <div class="container-fluid mt-3">
        <form action="/petshop-rangel/app/associacao/cadastro.php" method="post">
          <?php require_once(BASE_PATH.'/telas/forms/form_a_servicos.php'); ?>
          <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
          <button type="reset" class="btn btn-danger pull-right mx-2">Limpar</button>
        </form>
      </div>
    </div>
    <?php require_once(BASE_PATH.'/fscripts.php'); ?>
  </body>
</html>
