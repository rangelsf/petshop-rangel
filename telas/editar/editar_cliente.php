<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');

$codigo = $_GET['codigo'];

$cliente = selectCliente($codigo);

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
         <h1>Atualizar Cliente</h1>
       </div>
       <hr>
       <div class="container-fluid mt-3">
         <form action="/petshop-rangel/app/cliente/atualizar.php" method="post">

           <?php require_once(BASE_PATH.'/telas/forms/form_cliente.php'); ?>

           <button type="submit" class="btn btn-warning pull-right text-white">Atualizar</button>
           <button type="reset" class="btn btn-danger pull-right mx-2">Limpar</button>
         </form>
       </div>
     </div>

     <script type="text/javascript">
     $(document).ready(function() {
       $('#nome').val('<?php echo $cliente['cli_nome'] ?>');
       $('#codigo').val('<?php echo $cliente['cli_codigo'] ?>');
       $('#codigo').attr('readonly','readonly');
     });
     </script>

     <?php require_once(BASE_PATH.'/fscripts.php'); ?>

   </body>
 </html>
