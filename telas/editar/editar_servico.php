<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$codigo = $_GET['codigo'];
$servico = selectServico($codigo);?>
 <!DOCTYPE html>
 <html>
   <head>
     <?php require_once(BASE_PATH.'/head.php'); ?>
   </head>
   <body>
     <?php require_once(BASE_PATH.'/nav.php'); ?>
     <div class="content-wrapper">
       <div class="page-header m-3">
         <h1>Atualizar serviço</h1>
       </div>
       <hr>
       <div class="container-fluid mt-3">
         <form action="/petshop-rangel/app/servico/atualizar.php" method="post">
           <fieldset class="form-group">
             <label for="">Código</label>
             <input id="codigo" class="form-control" type="text" name="srv_codigo" value="<?php echo $servico['srv_codigo'] ?>" readonly>
           </fieldset>
           <?php require_once(BASE_PATH.'/telas/forms/form_servico.php'); ?>
           <button type="submit" class="btn btn-primary pull-right text-white">Atualizar</button>
           <button type="reset" class="btn btn-default pull-right mx-2">Limpar</button>
         </form>
       </div>
     </div>
     <script type="text/javascript">
     $(document).ready(function() {
       $('#codigo').val('<?php echo $servico['srv_codigo'] ?>');
       $('#preco').val('<?php echo $servico['srv_preco'] ?>');
       $('#descricao').val('<?php echo $servico['srv_descricao'] ?>');
     });
     </script>
     <?php require_once(BASE_PATH.'/fscripts.php'); ?>
   </body>
 </html>
