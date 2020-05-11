<?php require_once 'cabecalho.php';

$produto = new Produto();

$produto->setId($_POST['id']);

$ProdutoDao = new ProdutoDao($conexao);

$ProdutoDao->removeProduto ($produto);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();
?>
