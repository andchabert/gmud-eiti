<?php
require_once 'conecta.php';


function listaCategoria ($conexao) {
  $categorias=array();
  $query="select * from categoria";
  $resultado=mysqli_query ($conexao, $query);
  while($categoria_array=mysqli_fetch_assoc($resultado)) {

    $categoria = new Categoria();
    $categoria->setId($categoria_array['id']);
    $categoria->setNome($categoria_array['nome']);

    array_push($categorias, $categoria);
  }
  return $categorias;
}

function insereCategoria ($conexao, Categoria $categoria) {
  $query = "insert into categoria (nome) values ('{$categoria->getNome()}')";
  return mysqli_query ($conexao, $query);
}

function removeCategoria ($conexao, Categoria $categoria) {
  $query = "delete from categoria where id = {$categoria->getId()}";
  return  mysqli_query ($conexao, $query);
}
