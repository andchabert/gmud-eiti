<?php require_once 'cabecalho.php';

verificaUsuario();

$produto = new Produto();
$categoria = new Categoria();
$categoria = $_POST["categoria_id"];
?>
<?php
  $produto->setNome($_POST["nome"]);
  $produto->setPreco($_POST["preco"]);
  $produto->setDescricao($_POST["descricao"]);
  $produto->setCategoria($categoria);
if (array_key_exists ('usado', $_POST)) {
  $produto->setUsado(true);
} else {
  $produto->setUsado(false);
}

$ProdutoDao = new ProdutoDao ($conexao);

if ($ProdutoDao->insereProduto($produto)) {
  $_SESSION["success"] = "Produto adicionado com sucesso";
  header ("Location: produto-formulario.php");?>
  <? } else {
//$msg = mysqli_error ($conexao);
  $_SESSION["danger"] = "Produto não foi adicionado";
  header ("Location: produto-formulario.php");
  }
?>

<?php include 'rodape.php'; ?>
