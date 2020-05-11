<?php
require_once 'class/produto.php';

$produto = new Produto();
$produto->setPreco(59.9);

$outroproduto = new Produto();
$outroproduto->setPreco(59.9);

if ($produto === $outroproduto) {
  echo "sao iguais";
} else {
  echo "sao diferentes";
}

  ?>
