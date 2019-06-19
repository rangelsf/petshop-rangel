<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$codigo = $_GET['codigo'];
$animal = selectAnimal($codigo);
$cliente = selectCliente($animal['cli_codigo']);?>

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
         <h1>Editar Animal</h1>
       </div>
       <hr>
       <div class="container-fluid mt-3">
         <form action="/petshop-rangel/app/animal/atualizar.php" method="post">
           <fieldset class="form-group">
             <label for="">Código</label>
             <input id="codigo" class="form-control" type="text" name="animal_codigo" value="<?php echo $animal['animal_codigo'] ?>" readonly>
           </fieldset>
           <?php require_once(BASE_PATH.'/telas/forms/form_animal.php'); ?>
           <button type="submit" class="btn btn-primary pull-right text-white">Atualizar</button>
           <button type="reset" class="btn btn-default pull-right mx-2">Limpar</button>
         </form>
       </div>
     </div>
     <script type="text/javascript">
     $(document).ready(function() {
       $('#codigo').val('<?php echo $animal['animal_codigo'] ?>');
       $('#nome').val('<?php echo $animal['animal_nome'] ?>');
       $('#raca').val('<?php echo $animal['animal_raca'] ?>');
       $('#data_nascimento').val('<?php echo $animal['animal_data_nascimento'] ?>');
       $('#cliente').val('<?php echo $pet['cli_codigo'] ?>');
     });
     </script>
     <?php require_once(BASE_PATH.'/fscripts.php'); ?>
   </body>
 </html>
