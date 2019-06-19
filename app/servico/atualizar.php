<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$dados['srv_codigo'] = $_POST['srv_codigo'];
$dados['srv_descricao'] = $_POST['descricao'];
$dados['srv_preco'] = $_POST['preco'];
$response = updateServico($dados);?>

<!DOCTYPE html>
<html>
  <head>
    <?php require_once(BASE_PATH.'/head.php'); ?>
  </head>
  <body>
    <div class="content-wrapper">
      <br>
      <?php if($response): ?>
        <div class="container text-center">
          <div class="page-header">
            <h1>Sucesso</h1>
            <h3>Sucesso ao atualizar!</h3>
            <a href="/petshop-rangel/telas/pesquisar/pesquisar_servico.php" class="btn btn-primary">Voltar</a>
          </div>
          <hr>
        </div>
      <?php else: ?>
        <div class="container text-center">
          <div class="page-header">
            <h1>Falha</h1>
            <br>
            <h3>Erro ao atualizar.</h3>
            <br>
            <a href="/petshop-rangel/telas/pesquisar/pesquisar_servico.php" class="btn btn-primary">Voltar</a>
          </div>
          <hr>
        </div>
      <?php endif; ?>
    </div>
    <?php require_once(BASE_PATH.'/fscripts.php'); ?>
  </body>
</html>
