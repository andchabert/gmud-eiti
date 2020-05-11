<?php require_once 'cabecalho.php';

verificaUsuario();
?>

<?php

  $categoria = new Categoria();

  $categoria->setNome($_POST["nome"]);

$CategoriaDao = new CategoriaDao($conexao);

  if ($CategoriaDao->insereCategoria($categoria)) {
    $_SESSION["success"] = "E-mail adicionado com sucesso";
    header ("Location: categoria-formulario.php");
    } else {
  //$msg = mysqli_error ($conexao);
  $_SESSION["danger"] = "E-mail não foi adicionado";
  header ("Location: categoria-formulario.php");
    }
  ?>

  <?php include 'rodape.php'; ?>
