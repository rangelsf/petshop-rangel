<?php

require_once(BASE_PATH.'/app/conexao.php');

// FUNÇÕES DE CLIENTE

//Resgata todos os clientes cadastrados

function selectAllClientes()
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM cliente";
      $stm = $conn->prepare($sql);
      $stm->execute();

      $response = $stm->fetchAll();

      if($stm->rowCount() > 0){
        return $response;
      } else {
        return null;
      }
    } catch (PDOException $e) {
      echo $e;
      return null;

    }

}

//Resgata apenas 1 cliente

function selectCliente($codigo)
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM cliente WHERE cli_codigo = :codigo";
      $stm = $conn->prepare($sql);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      $response = $stm->fetch();

      return $response;
    } catch (PDOException $e) {
      echo $e;
    }

}


//Insere um cliente do banco de dados


function insertCliente($dados)
{
  $conn = connect();

  try {
    $sql = "INSERT INTO cliente VALUES(:codigo, :nome)";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':codigo', $dados['codigo']);
    $stm->bindValue(':nome', $dados['nome']);

    $stm->execute();

    if ($stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    return false;
  }
}

//Atualiza dados de  um cliente do banco de dados


function updateCliente($dados)
{
  $conn = connect();

  try {
    $sql = "UPDATE cliente SET cli_nome = :nome WHERE cli_codigo = :codigo";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':codigo', $dados['codigo']);
    $stm->bindValue(':nome', $dados['nome']);


    $stm->execute();

    if ($stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

//Verifica se o cliente possui algum animal

function hasAnimal($codigo)
{
  $conn = connect();

  try {
    $sql = "SELECT * FROM animal WHERE cli_codigo = :codigo";
    $stm = $conn->prepare($sql);
    $stm->bindValue(':codigo', $codigo);
    $stm->execute();

    $response = $stm->fetchAll();


    if(count($response) > 0) {
      return $response;
    } else {
      return false;
    }
  } catch (PDOException $e) {
    echo $e;
    return false;
  }

}

//Remover um cliente do banco de dados

function deleteCliente($codigo)
{

  if(!hasAnimal($codigo)){
    $conn = connect();

    try {
      $sql = "DELETE FROM cliente WHERE cli_codigo = :codigo";
      $stm = $conn->prepare($sql);

      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      if ($stm->rowCount() > 0) {
        return true;
      } else {
        return false;
      }

    } catch (PDOException $e) {
      return false;
    }
  } else {
    try {
      $conn = connect();

      $tmp = hasAnimal($codigo);

      $animals = array();

      foreach($tmp as $key => $animal) {
        $animals[] = (int) $animal['animal_codigo'];
      }

      if(!deleteAssociacoes($animals)){
        return false;
      }

      if(!deleteAllAnimals($animals)){
        return false;
      }

      $sql = "DELETE FROM cliente WHERE cli_codigo = :codigo";
      $stm = $conn->prepare($sql);

      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      return true;

    } catch (PDOException $e) {
      echo $e;
      return false;
    }
  }
}






//FUNÇÕES PARA ANIMAIS









function insertAnimal($dados)
{
  $conn = connect();

  try {
    $sql = "INSERT INTO animal VALUES(NULL, :animal_raca, :animal_data_nascimento, :animal_nome, :animal_codigo)";
    $stm =  $conn->prepare($sql);

    $stm->bindValue(':animal_raca', $dados['raca']);
    $stm->bindValue(':animal_data_nascimento', $dados['data_nascimento']);
    $stm->bindValue(':animal_nome', $dados['nome']);
    $stm->bindValue(':animal_codigo', $dados['cliente']);

    $stm->execute();

    return true;

  } catch (PDOException $e) {
    echo "<scrip>console.log(".$e.")</script>";
    return false;
  }
}

function selectAllAnimals()
{
    try {
      $conn = connect();

      $sql = "SELECT * FROM animal";
      $stm = $conn->prepare($sql);
      $stm->execute();

      $response = $stm->fetchAll();

      if($stm->rowCount() > 0 ){
        return $response;
      } else {
        return null;
      }
    } catch (PDOException $e) {
      echo $e;
      return null;
    }
}

function selectAnimal($codigo)
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM animal WHERE animal_codigo = :codigo";
      $stm =  $conn->prepare($sql);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      $response = $stm->fetch();

      return $response;
    } catch (PDOException $e) {
      echo $e;
    }

}

function hasAssociacao($animalCodigo)
{
  $conn = connect();

  try {
    $sql = "SELECT * FROM animal_servico WHERE animal_codigo = :codigo";
    $stm =  $conn->prepare($sql);
    $stm->bindValue(':codigo', $animalCodigo);
    $stm->execute();

    $response = $stm->fetch();

    return $response;
  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function updateAnimal($dados)
{
  $conn = connect();

  try {
    $sql = "UPDATE animal SET animal_nome = :animal_nome, animal_raca = :animal_raca, animal_data_nascimento = :animal_data_nascimento WHERE animal_codigo = :animal_codigo";
    $stm =  $conn->prepare($sql);

    $stm->bindValue(':animal_codigo', $dados['animal_codigo']);
    $stm->bindValue(':animal_raca', $dados['animal_raca']);
    $stm->bindValue(':animal_nome', $dados['animal_nome']);
    $stm->bindValue(':animal_data_nascimento', $dados['animal_data_nascimento']);

    $stm->execute();

    if ($stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function deleteAnimal($codigo)
{
  $conn = connect();

  if(!hasAssociacao($codigo)){
    try {
      $query = "DELETE FROM animal WHERE animal_codigo = :codigo";
      $stm =  $conn->prepare($query);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      if($stm->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    } catch (PDOException $e) {
      echo $e;
      return false;
    }
  } else {
    try {
      $query = "DELETE FROM animal_servico WHERE animal_codigo = :codigo";
      $stm =  $conn->prepare($query);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      if($stm->rowCount() > 0){
        try {
          $query = "DELETE FROM animal WHERE animal_codigo = :codigo";
          $stm =  $conn->prepare($query);
          $stm->bindValue(':codigo', $codigo);
          $stm->execute();

          if($stm->rowCount() > 0){
            return true;
          } else {
            return false;
          }

        } catch (PDOException $e) {
          echo $e;
          return false;
        }
      } else {
        return false;
      }

    } catch (PDOException $e) {
      echo $e;
      return false;
    }
  }
}

function deleteAllAnimals($animals)
{
  $conn = connect();

  try {
    $query = "DELETE FROM animal WHERE animal_codigo in (".str_repeat("?,", count($animals) - 1)."?)";
    $stm =  $conn->prepare($query);
    $stm->execute($animals);

    if($stm->rowCount() > 0){
      return true;
      }else {
        return false;
      }
    }catch (PDOException $e) {
          echo $e;
          return false;
    }
}






//FUNÇÕES PARA SERVICOS







function selectAllServicos()
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM servico";
      $stm = $conn->prepare($sql);
      $stm->execute();

      $response = $stm->fetchAll();

      return $response;
    } catch (PDOException $e) {
      echo $e;
    }

}

function selectServico($codigo)
{
    $conn = connect();

    try {
      $sql = "SELECT * FROM servico WHERE srv_codigo = :srv_codigo";
      $stm = $conn->prepare($sql);
      $stm->bindValue(':srv_codigo', $codigo);
      $stm->execute();

      $response = $stm->fetch();

      if($stm->rowCount() > 0){
        return $response;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      echo $e;
    }
}

function hasAssociacaoServico($srvCodigo)
{
  $conn = connect();

  try {
    $sql = "SELECT * FROM animal_servico WHERE srv_codigo = :codigo";
    $stm = $conn->prepare($sql);
    $stm->bindValue(':codigo', $srvCodigo);
    $stm->execute();

    $response = $stm->fetch();

    if($stm->rowCount() > 0){
      return $response;
    } else {
      return false;
    }
  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function insertServico($dados)
{
  $conn = connect();

  try {
    $sql = "INSERT INTO servico VALUES(NULL, :srv_preco, :srv_descricao)";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':srv_preco', $dados['preco']);
    $stm->bindValue(':srv_descricao', $dados['descricao']);

    $stm->execute();

    if($stm->rowCount() > 0){
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo "<scrip>console.log(".$e.")</script>";
    return false;
  }

}

function updateServico($dados)
{
  $conn = connect();

  try {
    $sql = "UPDATE servico SET srv_descricao = :descricao, srv_preco = :preco WHERE srv_codigo = :codigo";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':descricao', $dados['srv_descricao']);
    $stm->bindValue(':preco', $dados['srv_preco']);
    $stm->bindValue(':codigo', $dados['srv_codigo']);

    $stm->execute();

    if ($stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function deleteServico($codigo)
{
  $conn = connect();

  if(!hasAssociacaoServico($codigo)) {
    try {
      $query = "DELETE FROM servico WHERE srv_codigo = :codigo";
      $stm = $conn->prepare($query);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      if($stm->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    } catch (PDOException $e) {
      echo $e;
      return false;
    }
  } else {
    try {
      $query = "DELETE FROM animal_servico WHERE srv_codigo = :codigo";
      $stm = $conn->prepare($query);
      $stm->bindValue(':codigo', $codigo);
      $stm->execute();

      if($stm->rowCount() > 0){
        try {
          $query = "DELETE FROM servico WHERE srv_codigo = :codigo";
          $stm = $conn->prepare($query);
          $stm->bindValue(':codigo', $codigo);
          $stm->execute();

          if($stm->rowCount() > 0){
            return true;
          } else {
            return false;
          }

        } catch (PDOException $e) {
          echo $e;
          return false;
        }
      } else {
        return false;
      }

    } catch (PDOException $e) {
      echo $e;
      return false;
    }
  }
}








//FUNÇÕES PARA ASSOCIACOES







function selectAllAssociacoes()
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM animal_servico";
      $stm = $conn->prepare($sql);
      $stm->execute();

      $associacoes= $stm->fetchAll();

      if(count($associacoes) > 0) {
        $response = array();

        foreach ($associacoes as $key => $associacao) {
          $sql = "SELECT * FROM servico WHERE srv_codigo = :srv_codigo";
          $stm = $conn->prepare($sql);
          $stm->bindValue(':srv_codigo', $associacao['srv_codigo']);
          $stm->execute();

          $response[$key]['servico'] = $stm->fetch();


          $sql = "SELECT * FROM animal WHERE animal_codigo = :animal_codigo";
          $stm = $conn->prepare($sql);
          $stm->bindValue(':animal_codigo', $associacao['animal_codigo']);
          $stm->execute();

          $response[$key]['animal'] = $stm->fetch();

        }
        return $response;
      }
    } catch (PDOException $e) {
      echo $e;
    }
}

function selectAssociacao($animal, $servico)
{
  $conn = connect();

    try {
      $sql = "SELECT * FROM animal_servico WHERE srv_codigo = :servico AND animal_codigo = :animal";
      $stm = $conn->prepare($sql);
      $stm->bindValue(':servico', $servico);
      $stm->bindValue(':animal', $animal);
      $stm->execute();

      $associacao = $stm->fetch();

      if ($stm->rowCount() > 0) {
        return $associacao;
      } else {
        return null;
      }
    } catch (PDOException $e) {
      echo $e;
      return null;

    }
}

function selectAssociacoesByAnimal($animal)
{

  $conn = connect();


    try {
      $sql = "SELECT * FROM animal_servico WHERE animal_codigo = :codigo";
      $stm = $conn->prepare($sql);
      $stm->bindValue(':codigo', $animal);
      $stm->execute();

      $associacoes= $stm->fetchAll();

      if(count($associacoes) > 0) {
        $response = array();

        foreach ($associacoes as $key => $associacao) {
          $sql = "SELECT * FROM servico WHERE srv_codigo = :srv_codigo";
          $stm = $conn->prepare($sql);
          $stm->bindValue(':srv_codigo', $associacao['srv_codigo']);
          $stm->execute();

          $response[$key]['servico'] = $stm->fetch();


          $sql = "SELECT * FROM animal WHERE animal_codigo = :animal_codigo";
          $stm = $conn->prepare($sql);
          $stm->bindValue(':animal_codigo', $associacao['animal_codigo']);
          $stm->execute();

          $response[$key]['animal'] = $stm->fetch();

        }

        return $response;



      }
    } catch (PDOException $e) {
      echo $e;
    }

}

function insertAssociacao($dados)
{

  $conn = connect();

  try {
    $sql = "INSERT INTO animal_servico VALUES(:animal_codigo, :srv_codigo)";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':animal_codigo', $dados['animal_codigo']);
    $stm->bindValue(':srv_codigo', $dados['srv_codigo']);

    $stm->execute();

    return true;

  } catch (PDOException $e) {
    return false;
  }

}

function updateAssociacao($dados)
{

  $conn = connect();

  try {
    $sql = "UPDATE animal_servico SET srv_codigo = :novo_servico, animal_codigo = :novo_animal WHERE srv_codigo = :srv_codigo AND animal_codigo = :animal_codigo";
    $stm = $conn->prepare($sql);

    $stm->bindValue(':novo_servico', $dados['novo_servico']);
    $stm->bindValue(':novo_animal', $dados['novo_animal']);
    $stm->bindValue(':srv_codigo', $dados['srv_codigo']);
    $stm->bindValue(':animal_codigo', $dados['animal_codigo']);

    $stm->execute();

    if ($stm->rowCount() > 0) {
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function deleteAssociacoes($animals)
{

  $conn = connect();

  try {
    foreach($animals as $key => $animal) {
      $query = "DELETE FROM animal_servico WHERE animal_codigo = :codigo";

      $stm = $conn->prepare($query);
      $stm->bindValue(':codigo', $animal);
      $stm->execute();
    }

    return true;

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}

function deleteAssociacao($animalCodigo, $srvCodigo)
{

  $conn = connect();

  try {
    $query = "DELETE FROM animal_servico WHERE animal_codigo = :animal AND srv_codigo = :servico";

    $stm = $conn->prepare($query);
    $stm->bindValue(':animal', $animalCodigo);
    $stm->bindValue(':servico', $srvCodigo);
    $stm->execute();

    if($stm->rowCount() > 0){
      return true;
    } else {
      return false;
    }

  } catch (PDOException $e) {
    echo $e;
    return false;
  }
}
