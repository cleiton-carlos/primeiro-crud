<?php

  include("../database/conexao.php");

  if (isset($_GET['id'])) {
    $id = $_GET['id'];//id do usuario
    $query = "SELECT * FROM mensagens WHERE id = $id";
    $resultado_edicao = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultado_edicao) == 1) {
      $row = mysqli_fetch_array($resultado_edicao);
      $titulo = $row['titulo'];
      $descricao = $row['descricao'];
    }
  }
  
  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $query = "UPDATE mensagens set titulo = '$titulo' , descricao = '$descricao' WHERE id = $id";
    mysqli_query($conexao, $query);
    $_SESSION["mensagem"] = "editado com sucesso";
    header("Location: ../index.php");
  }

?>

<?php include("header.php"); ?>

<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <input type="text" name="titulo" value="<?php echo $titulo; ?> "><br>
  <textarea name="descricao" cols="30" rows="10"> <?php echo $descricao ?> </textarea><br>
  <button name="update">salvar</button>
</form>

<?php include("footer.php"); ?>