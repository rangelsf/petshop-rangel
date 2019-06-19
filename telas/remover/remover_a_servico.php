<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <?php require_once(BASE_PATH.'/head.php'); ?>
  </head>
  <body>
    <?php require_once(BASE_PATH.'/nav.php'); ?>
    <div class="content-wrapper" >
      <br>
      <div class="container ml-5">
        <div class="row text-center">
          <h2>Deseja realmente remover a associação?</h2>
          <div class="col-md-6">
            <a href="/petshop-rangel/telas/pesquisar/pesquisar_a_servico.php" class="btn btn-success">Cancelar</a>
            <a class="btn btn-danger text-white" onclick="remover()">Remover</a>
          </div>
        </div>
      </div>
      <script type="text/javascript">
          function remover(){
            window.location = "/petshop-rangel/app/associacao/remover.php?srv_codigo=<?php echo $_GET['srv_codigo'] ?>&animal_codigo=<?php echo $_GET['animal_codigo'] ?>";
          }
      </script>
    </div>
    <?php require_once(BASE_PATH.'/fscripts.php'); ?>
  </body>
</html>
