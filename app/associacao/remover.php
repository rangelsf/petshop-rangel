<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
  $animal = $_GET['animal_codigo'];
  $servico = $_GET['srv_codigo'];
  $response = deleteAssociacao($animal, $servico);
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once(BASE_PATH.'/head.php'); ?>
  </head>
  <body>
    <?php require_once(BASE_PATH.'/nav.php'); ?>
    <div class="content-wrapper">
      <br>
      <?php if($response): ?>
        <div class="container text-center">
          <div class="page-header">
            <h1>Sucesso</h1>
            <h3>Sucesso ao remover!</h3>
            <a href="/petshop-rangel/telas/pesquisar/pesquisar_a_servico.php" class="btn btn-primary">Voltar</a>
          </div>
          <hr>
        </div>
      <?php else: ?>
        <div class="container text-center">
          <div class="page-header">
            <h1>Falha</h1>
            <br>
            <h3>Erro ao remover.</h3>
            <br>
            <a href="/petshop-rangel/telas/pesquisar/pesquisar_a_servico.php" class="btn btn-primary">Voltar</a>
          </div>
          <hr>
        </div>
      <?php endif; ?>
    </div>
    <?php require_once(BASE_PATH.'/fscripts.php'); ?>
  </body>
</html>
