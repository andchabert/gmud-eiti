<?php
require_once 'cabecalho.php';

verificaUsuario();

mostraAlerta("success");
mostraAlerta("danger");

$categoria = new Categoria();
$categoria->setId(2);

$produto = new Produto();
$produto->setEmail($categoria);

$CategoriaDao = new CategoriaDao($conexao);

$categorias = $CategoriaDao->listaCategoria();
?>

<h1>Cadastro de e-mail para aprovação</h1>
  <form action="adiciona-categoria.php" method="post">
    <table class="table table-condensed">
  <tr>
    <td>e-mail</td>
    <td> <input class="form-control" type="text" name="nome" value="<?=$categoria->getNome()?>"></td>
  </tr>
  <tr>
    <td>
    <input class="btn btn-success" type="submit" value="Cadastrar" />
    </td>
    <td>
    </td>
  </tr>
    </table>
  </form>
<br>

  <h1>Remoção de e-mail</h1>
    <form action="remove-categoria.php" method="post">
      <table class="table table-condensed">
    <tr>
    <td>e-mail</td>
      <td>
        <select name="categoria_id" class="form-control">
        <?php
            foreach($categorias as $categoria) :
                $essaEhACategoria = $produto->getEmail()->getId() == $categoria->getId();
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
          ?>
              <option value="<?=$categoria->getId()?>" <?=$selecao?>>
                    <?=$categoria->getNome()?>
              </option>
        <?php endforeach ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <form action="remove-produto.php" method="post">
          <input type="hidden" name="id" value="<?=$categoria->getId()?>">
          <button  class="btn btn-danger">Remover</button>
        </form>
      </td>
      <td>
      </td>
    </tr>
      </table>
    </form>

  <?php include 'rodape.php'; ?>
