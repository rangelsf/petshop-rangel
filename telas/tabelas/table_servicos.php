<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
$servicos = selectAllServicos();
?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-window-maximize"></i> Serviços</div>
        <div class="card-body">
          <?php if ($servicos): ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descrição</th>
                  <th>Preço</th>
                  <th class="text-center">Ação</th>
                </tr>
              </thead>
              
              <tbody>
                  <?php foreach ($servicos as $key => $servico): ?>
                    <tr>
                      <td><?php echo $servico['srv_codigo'] ?></td>
                      <td><?php echo $servico['srv_descricao'] ?></td>
                      <td><?php echo $servico['srv_preco'] ?></td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-info editar" href="/petshop-rangel/telas/editar/editar_servico.php?codigo=<?php echo $servico['srv_codigo'] ?>"> <i class="fa fa-edit text-white"></i> </a>
                          <a class="btn btn-danger excluir" href="/petshop-rangel/telas/remover/remover_servico.php?codigo=<?php echo $servico['srv_codigo'] ?>"> <i class="fa fa-times"></i> </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
          <h2>Não há serviços cadastrados</h2>
          <?php endif; ?>
          </div>
        </div>
      </div>
