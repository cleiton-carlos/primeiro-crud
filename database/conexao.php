<?php

  session_start();

  $conexao = mysqli_connect(  
    "localhost",
    "root",
    "",
    "primeiro_crud"
  );

  if (!$conexao) {
    die("Erro ao conectar");
  }

?>