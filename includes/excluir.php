<?php

  include("../database/conexao.php");

  if (isset($_GET['id'])) {//verificando se tem um id
    $id = $_GET['id'];
    $query = "DELETE FROM mensagens WHERE id = $id";//deleta o campo que esta na variavel id
    $resultado_exclusao = mysqli_query($conexao,$query);

    if (!$resultado_exclusao) {
      die("falha ao executar");
    }

    $_SESSION["mensagem"] = "excluído com sucesso";
    header("Location: ../index.php");
  }
?>