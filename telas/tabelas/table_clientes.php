<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
  $clientes = selectAllClientes();
?>

<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-window-maximize"></i> Clientes</div>
        <div class="card-body">
          <?php if ($clientes): ?>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nome</th>
                  <th>Ação</th>
                </tr>
              </thead>
              
              <tbody>
                  <?php foreach ($clientes as $key => $cliente): ?>
                    <tr>
                      <td><?php echo $cliente['cli_codigo'] ?></td>
                      <td><?php echo $cliente['cli_nome'] ?></td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-info editar" href="/petshop-rangel/telas/editar/editar_cliente.php?codigo=<?php echo $cliente['cli_codigo'] ?>"> <i class="fa fa-edit text-white"></i> </a>
                          <a class="btn btn-danger excluir" href="/petshop-rangel/telas/remover/remover_cliente.php?codigo=<?php echo $cliente['cli_codigo'] ?>"> <i class="fa fa-times"></i> </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>

          <h2>Nenhum Cliente Cadastrado</h2>

          <?php endif; ?>
          </div>
        </div>
      </div>
