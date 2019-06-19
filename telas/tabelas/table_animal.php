<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/petshop-rangel/inicializador.php');
?>

<?php
  $animals = selectAllAnimals();
 ?>

<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-window-maximize"></i> Animais</div>
        <div class="card-body">
          <?php if ($animals): ?>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Dono</th>
                  <th>Raça</th>
                  <th>Data de Nascimento</th>
                  <th class="text-center">Ação</th>
                </tr>
              </thead>
              
              <tbody>
                  <?php foreach ($animals as $key => $animal): ?>
                    <?php $cliente = selectCliente($animal['cli_codigo']); ?>

                    <tr>
                      <td><?php echo $animal['animal_codigo'] ?></td>
                      <td><?php echo $animal['animal_nome'] ?></td>
                      <td><?php echo $cliente['cli_nome'] ?></td>
                      <td><?php echo $animal['animal_raca'] ?></td>
                      <td><?php echo $animal['animal_data_nascimento'] ?></td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-info editar" href="/petshop-rangel/telas/editar/editar_animal.php?codigo=<?php echo $animal['animal_codigo'] ?>"> <i class="fa fa-edit text-white"></i> </a>
                          <a class="btn btn-danger excluir" href="/petshop-rangel/telas/remover/remover_animal.php?codigo=<?php echo $animal['animal_codigo'] ?>"> <i class="fa fa-times"></i> </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>

          <h2>Não há animais cadastrados</h2>

          <?php endif; ?>
          </div>
        </div>
      </div>
