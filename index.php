
<?php require_once('inicializador.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <?php require_once('head.php'); ?>
  </head>

  <body>
      

    <?php require_once('nav.php'); ?>

    <div class="container">

      <div class="row">

          <div class="col-md-12">
            <?php require_once('telas/tabelas/table_clientes.php'); ?>
          </div>
          <div class="col-md-12">
            <?php require_once('telas/tabelas/table_animal.php'); ?>
          </div>
          <div class="col-md-12">
            <?php require_once('telas/tabelas/table_servicos.php'); ?>
          </div>
          <div class="col-md-12">
            <?php require_once('telas/tabelas/table_a_servicos.php'); ?>
          </div>
          

      </div><!-- /.row -->

    </div><!-- /.container -->





  </body>
</html>
