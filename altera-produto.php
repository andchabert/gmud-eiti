<?php require_once("cabecalho.php");

$produto = new Produto();
$categoria = new Categoria();
$categoria = $_POST['categoria_id'];

$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);

if(array_key_exists('usado', $_POST)) {
    $produto->setUsado("true");
} else {
    $produto->setUsado("false");
}
$produto->setId($_POST['id']);

$ProdutoDao = new ProdutoDao ($conexao);

if($ProdutoDao->alteraProduto($produto)) {
  $_SESSION["success"] = "Produto alterado com sucesso";
  header ("Location: produto-lista.php");
 } else {
    $msg = mysqli_error($conexao);
    $_SESSION["success"] = "Produto $produto->getNome() não foi alterado com sucesso $msg";
    header ("Location: produto-lista.php");
}
?>

<?php include("rodape.php"); ?>
