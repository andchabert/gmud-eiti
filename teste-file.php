<?php require_once 'cabecalho.php';

verificaUsuario();

mostraAlerta("success");
mostraAlerta("danger");

$categoria = new Categoria();


//$produto = array('nome' => '', 'descricao' => '', 'preco'=> '');

$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto();
$produto->setCategoria($categoria);

$usado = "";

$CategoriaDao = new CategoriaDao($conexao);

$categorias = $CategoriaDao->listaCategoria();
 ?>

  <h1>Formulário de cadastro</h1>
    <form action="teste-adiciona.php" method="post">

        <? include 'teste-file-base.php';?>

          <tr>
            <td>
            <input class="btn btn-primary" type="submit" value="Cadastrar" />
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
          </tr>
      </table>

    </form>
<?php include 'rodape.php'; ?>
