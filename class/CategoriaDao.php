<?php

  class CategoriaDao  {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

function listaCategoria () {
  $categorias=array();
  $query="select * from categoria";
  $resultado=mysqli_query ($this->conexao, $query);
  while($categoria_array=mysqli_fetch_assoc($resultado)) {

    $categoria = new Categoria();
    $categoria->setId($categoria_array['id']);
    $categoria->setNome($categoria_array['nome']);

    array_push($categorias, $categoria);
  }
  return $categorias;
}

  function insereCategoria (Categoria $categoria) {
    $query = "insert into categoria (nome) values ('{$categoria->getNome()}')";
    return mysqli_query ($this->conexao, $query);
  }

  function removeCategoria (Categoria $categoria) {
    $query = "delete from categoria where id = {$categoria->getId()}";
    //  var_dump ($query);
    //  die();
    return  mysqli_query ($this->conexao, $query);
  }

}
?>
