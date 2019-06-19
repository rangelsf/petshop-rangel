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
        <h1>Pesquisar animal</h1>
      </div>
      <hr>
        <div class="container">
          <div class="container-fluid mt-3">
            <?php require_once(BASE_PATH.'/telas/tabelas/table_animal.php'); ?>
            <a href="/petshop-rangel/telas/cadastros/cadastrar_animal.php" class="btn btn-primary">Cadastrar animal</a>
          </div>
        </div>
    </div>

    <?php require_once(BASE_PATH.'/fscripts.php'); ?>

  </body>
</html>
