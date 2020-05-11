<?php

  class ProdutoDao  {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaProdutos () {
      $produtos = array();
      $resultado = mysqli_query  ($this->conexao, "select p.*, c.nome categoria_nome from produtos p, categoria c where p.categoria_id = c.id");
    while ($produto_array = mysqli_fetch_assoc($resultado)) {

        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);

        $produto = new Produto();
        $produto->setId($produto_array['id']);
        $produto->setNome($produto_array['nome']);
        $produto->setData($produto_array['data']);
        $produto->setHinicio($produto_array['hinicio']);
        $produto->setHfim($produto_array['hfim']);
        $produto->setJustificativa($produto_array['justificativa']);
        $produto->setDescricao($produto_array['descricao']);
        $produto->setRiscos($produto_array['riscos']);
        $produto->setUsado($produto_array['usado']);
        $produto->setCliente($produto_array['cliente']);
        $produto->setTicket($produto_array['ticket']);
        $produto->setNrticket($produto_array['nrticket']);
        $produto->setEmail($categoria);
        $produto->setNivel($produto_array['nivel']);

        array_push ($produtos, $produto);
      }
        return $produtos;
    }

    function insereProduto (Produto $produto) {
      $query = "insert into produtos (nome, data, hinicio, hfim, justificativa, descricao, riscos, usado, cliente, ticket, nrticket, categoria_id, nivel)
            values ('{$produto->getNome()}', '{$produto->getData()}', '{$produto->getHinicio()}', '{$produto->getHfim()}', '{$produto->getJustificativa()}', '{$produto->getDescricao()}', '{$produto->getRiscos()}', '{$produto->getUsado()}', '{$produto->getCliente()}', '{$produto->getTicket()}', '{$produto->getNrticket()}', '{$produto->getEmail()}', '{$produto->getNivel()}')";
      // para ver o resultado da query
      //  var_dump ($query);
      //  die;
      return  mysqli_query ($this->conexao, $query);
    }

   // function alteraProduto(Produto $produto) {
   //     $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',
   //         categoria_id = {$produto->getCategoria()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
   //         var_dump ($query);
   //         die();
   //     return mysqli_query($this->conexao, $query);
   // }

    function buscaProduto($id) {

        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categoria_id']);

        $produto = new Produto();
        $produto->setId($produto_buscado['id']);
        $produto->setNome($produto_buscado['nome']);
        $produto->setData($produto_buscado['data']);
        $produto->setHinicio($produto_buscado['hinicio']);
        $produto->setHfim($produto_buscado['hfim']);
        $produto->setJustificativa($produto_buscado['justificativa']);
        $produto->setDescricao($produto_buscado['descricao']);
        $produto->setRiscos($produto_buscado['riscos']);
        $produto->setUsado($produto_buscado['usado']);
        $produto->setCliente($produto_buscado['cliente']);
        $produto->setTicket($produto_buscado['ticket']);
        $produto->setNrticket($produto_buscado['nrticket']);
        $produto->setEmail($categoria);
        $produto->setNivel($produto_buscado['nivel']);

        return $produto;
    }

    function removeProduto (Produto $produto) {
      $query = "delete from produtos where id = {$produto->getId()}";
      return  mysqli_query ($this->conexao, $query);
    }

  }
 ?>
