<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
  $servicosAssoc = selectAllAssociacoes();
 ?>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-window-maximize"></i> Serviços feitos</div>
    <div class="card-body">
      <?php if ($servicosAssoc): ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Animal</th>
              <th>Serviço</th>
              <th>Preço</th>
              <th>Ação</th>
            </tr>
          </thead>
          
          <tbody>
              <?php foreach ($servicosAssoc as $key => $associacao): ?>
                <tr>
                  <td><?php echo $associacao['animal']['animal_nome'] ?></td>
                  <td><?php echo $associacao['servico']['srv_descricao'] ?></td>
                  <td> <span>R$</span> <?php echo $associacao['servico']['srv_preco'] ?></td>
                  <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a class="btn btn-info editar" href="/petshop-rangel/telas/editar/editar_a_servico.php?srv_codigo=<?php echo $associacao['servico']['srv_codigo']; ?>&animal_codigo=<?php echo $associacao['animal']['animal_codigo']; ?>"> <i class="fa fa-edit text-white"></i> </a>
                      <a class="btn btn-danger excluir" href="/petshop-rangel/telas/remover/remover_a_servico.php?srv_codigo=<?php echo $associacao['servico']['srv_codigo']; ?>&animal_codigo=<?php echo $associacao['animal']['animal_codigo']; ?>"> <i class="fa fa-times text-white"></i> </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
      <h2>Não há serviços Associados</h2>
      <?php endif; ?>
      </div>
    </div>
  </div>
