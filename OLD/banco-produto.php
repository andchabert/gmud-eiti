<?php
require_once 'conecta.php';


function listaProdutos ($conexao) {
  $produtos = array();
  $resultado = mysqli_query  ($conexao, "select p.*, c.nome categoria_nome from produtos p, categoria c where p.categoria_id = c.id");
while ($produto_array = mysqli_fetch_assoc($resultado)) {

    $categoria = new Categoria();
    $categoria->setNome($produto_array['categoria_nome']);

    $produto = new Produto();
    $produto->setId($produto_array['id']);
    $produto->setNome($produto_array['nome']);
    $produto->setPreco($produto_array['preco']);
    $produto->setDescricao($produto_array['descricao']);
    $produto->setCategoria($categoria);
    $produto->setUsado($produto_array['usado']);

    array_push ($produtos, $produto);
  }
    return $produtos;
}

function insereProduto ($conexao, Produto $produto) {
  $query = "insert into produtos (nome, preco, descricao, categoria_id, usado)
                    values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()}, '{$produto->getUsado()}')";
  // para ver o resultado da query
  //  var_dump ($query);
  return  mysqli_query ($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {
    $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',
        categoria_id = {$produto->getCategoria()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
  //      var_dump ($query);
  //      die();
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {

    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->setId($produto_buscado['categoria_id']);

    $produto = new Produto();
    $produto->setId($produto_buscado['id']);
    $produto->setNome($produto_buscado['nome']);
    $produto->setDescricao($produto_buscado['descricao']);
    $produto->setCategoria($categoria);
    $produto->setPreco($produto_buscado['preco']);
    $produto->setUsado($produto_buscado['usado']);

    return $produto;
}

function removeProduto ($conexao, Produto $produto) {
  $query = "delete from produtos where id = {$produto->getId()}";
  return  mysqli_query ($conexao, $query);
}

?>
