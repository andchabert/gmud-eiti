<?php require_once 'cabecalho.php';

verificaUsuario();

mostraAlerta("success");
mostraAlerta("danger");

$id = $_GET['id'];

$ProdutoDao = new ProdutoDao($conexao);
$CategoriaDao = new CategoriaDao($conexao);

$produto = $ProdutoDao->buscaProduto($id);
$categorias = $CategoriaDao->listaCategoria();

$selecao_usado = $produto->getUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);

?>
    <h1>Alterando produto</h1>
    <form action="altera-produto.php" method="post">
      <input type="hidden" name="id" value="<?=$produto->getId()?>" />

        <? include 'produto-formulario-base.php';?>

            <tr>
                <td>
                  <button class="btn btn-primary" type="submit">Aprova</button>
                </td>
                <td>
                  <button class="btn btn-danger" type="submit">Reprova</button>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </form>
<?php include("rodape.php"); ?>
