
<?php require_once 'cabecalho.php';

verificaUsuario();

$produto = new Produto();

?>

<?if (isset($_SESSION ["success"])) {?>
  <p class="alert-success"> <?= $_SESSION["success"]?></a>
<?
unset ($_SESSION["success"]);
}?>

<?php

$ProdutoDao = new ProdutoDao($conexao);

  if ($ProdutoDao->listaProdutos ()== NULL) {
?>
  <p class="text-danger"> Nenhum produto cadastrado</p>
<?php
  }

  $produto = new Produto();
  $produto->setId($produto_array['id']);
  $produto->setNome($produto_array['nome']);
  $produto->setData($produto_array['data']);
  $produto->setJustificativa($produto_array['justificativa']);
  $produto->setDescricao($produto_array['descricao']);
  $produto->setRiscos($produto_array['riscos']);
  $produto->setUsado($produto_array['usado']);
  $produto->setCliente($produto_array['cliente']);
  $produto->setTicket($produto_array['ticket']);
  $produto->setNrticket($produto_array['nrticket']);
  $produto->setEmail($categoria);
  $produto->setNivel($produto_array['nivel']);

?>
<br><br>
<table class="table-lista table-striped table-bordered">
  <tr>
    <td>Solicitação</td>
    <td>Data</td>
    <td>Justificativa</td>
    <td>Descricao</td>
    <td>Riscos</td>
    <td>Email aprovador</td>
    <td>Alteração no ambiente</td>
    <td>-</td>
    <td>-</td>
  </tr>
  <?
  $produtos = $ProdutoDao->listaProdutos($conexao);
    foreach ($produtos as $produto) :
  ?>
      <tr>
        <td><?= $produto->getNome(); ?></td>
        <td><?= $produto->getData(); ?></td>
        <td><?= substr ($produto->getJustificativa(), 0, 15) ?></td>
        <td><?= substr ($produto->getDescricao(), 0, 15) ?></td>
        <td><?= substr ($produto->getDescricao(), 0, 15) ?></td>
        <td><?= $produto->getEmail()->getNome(); ?></td>
        <td><?php if ($produto->getUsado() == 1) {?>
          <p>Sim</p>
      <?php
            } else {
      ?>
          <p>Não</p>
      <?php
            }
      ?>
      </td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>"> Alterar </a></td>
        <td>
          <form action="remove-produto.php" method="post">
            <input type="hidden" name="id" value="<?=$produto->getId()?>">
            <button  class="btn btn-danger">Remover</button>
          </form>
        </td>
      </tr>
<?
  endforeach
?>
</table>
  <?php include 'rodape.php'; ?>
