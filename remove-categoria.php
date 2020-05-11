<?php require_once 'cabecalho.php';

$categoria = new Categoria();

$categoria->setId($_POST['id']);

$CategoriaDao = new CategoriaDao($conexao);

$CategoriaDao->removeCategoria ($categoria);
$_SESSION["danger"] = "e-mail removido.";
header ("Location: categoria-formulario.php");
die();
?>
