<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$srvCodigo = $_GET['srv_codigo'];
$animalCodigo = $_GET['animal_codigo'];
$associacao = selectAssociacao($animalCodigo, $srvCodigo);

$animals = selectAllAnimals();
$servicos = selectAllServicos();

?>
 <!DOCTYPE html>
 <html>
   <head>
     <?php require_once(BASE_PATH.'/head.php'); ?>
   </head>
   <body>
     <?php require_once(BASE_PATH.'/nav.php'); ?>
     <div class="content-wrapper">
       <div class="page-header m-3">
         <h1>Atualização de Associação</h1>
       </div>
       <hr>
       <div class="container-fluid mt-3">
         <form action="/petshop-rangel/app/associacao/atualizar.php" method="post">
           <div class="row">
             <div class="col-md-12">
               <label for="">Atuais</label>
               <br>
             </div>
             <div class="col-md-6">
               <fieldset class="form-group">
                 <label for="animal">Animal <i class="text-danger">*</i> </label>
                 <select id="animal_codigo" class="form-control" name="animal_codigo" readonly>
                   <option value="">Escolha um animal</option>
                   <?php foreach ($animals as $key => $animal): ?>
                     <option value=<?php echo $animal['animal_codigo'] ?>><?php echo $animal['animal_nome'] ?></option>
                   <?php endforeach; ?>
                 </select>
               </fieldset>
             </div>

             <div class="col-md-6">
                <label for="animals">Serviço <i class="text-danger">*</i></label>
                <select id="srv_codigo" class="form-control" name="srv_codigo" readonly>
                  <option value="">Escolha um serviço</option>
                  <?php foreach ($servicos as $key => $servico): ?>
                    <option value="<?php echo $servico['srv_codigo'] ?>"><?php echo $servico['srv_descricao'] ?></option>
                  <?php endforeach; ?>
                </select>
             </div>
           </div>
           <div class="col-md-12">
             <label for="">Novos</label>
             <br>
           </div>
           <?php require_once(BASE_PATH.'/telas/forms/form_a_servicos.php'); ?>
           <button type="submit" class="btn btn-primary pull-right text-white">Atualizar</button>
           <button type="reset" class="btn btn-danger pull-right mx-2">Limpar</button>
         </form>
       </div>
     </div>
     <script type="text/javascript">
     $(document).ready(function() {
       $('#srv_codigo').val('<?php echo $associacao['srv_codigo'] ?>');
       $('#animal_codigo').val('<?php echo $associacao['animal_codigo'] ?>');
     });
     </script>
     <?php require_once(BASE_PATH.'/fscripts.php'); ?>
   </body>
 </html>
