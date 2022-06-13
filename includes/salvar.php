<?php

  include("../database/conexao.php");

  if (isset($_POST['salvar'])) {
    $titulo = $_POST['title'];
    $descricao = $_POST['description'];

    $sql = "INSERT INTO mensagens(titulo,descricao) VALUES ('$titulo','$descricao')";
    $resultado_salvar = mysqli_query($conexao,$sql);

    if (!$sql) {
      echo "falha ao salvar";
    }

    $_SESSION["mensagem"] = "salvo com sucesso";

    header("Location: ../index.php");
  }

?>