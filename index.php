<?php include("database/conexao.php"); ?>
<?php include("includes/header.php"); ?>

  <?php
    if(isset($_SESSION["mensagem"])) {
      echo $_SESSION["mensagem"];
      session_unset();
    }
  ?>

  <form action="includes/salvar.php" method="POST">
    <label>titulo</label>
    <input type="text" name="title" autofocus required><br><br>

    <textarea name="description" cols="40" rows="10" placeholder="digite a descricao" required></textarea><br><br>

    <input name="salvar" type="submit" value="adicionar">
  </form><br>

  <table>
    <thead>
      <tr>
        <th>titulo</th>
        <th>descricao</th>
        <th>editar</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $query = "SELECT * FROM mensagens";//pegando todos os dados das mensagens
        $resultados_tabela = mysqli_query($conexao,$query);

        while ($row = mysqli_fetch_array($resultados_tabela)) {//armazenando dados do banco na variavel $row ?>
            <tr>
              <td> <?php echo $row['titulo'] ?> </td>
              <td> <?php echo $row['descricao'] ?> </td>
              <td>
                 <a href="includes/editar.php?id=<?php echo $row['id']; ?>">editar</a> 
                 <a href="includes/excluir.php?id=<?php echo $row['id']; ?>">excluir</a> 
              </td>
            </tr>
        <?php } ?>

    </tbody>
  </table>

<?php include("includes/footer.php") ?>