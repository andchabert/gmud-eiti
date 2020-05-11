<?php require_once 'cabecalho.php';

verificaUsuario();

mostraAlerta("success");
mostraAlerta("danger");

$categoria = new Categoria();


//$produto = array('nome' => '', 'descricao' => '', 'preco'=> '');

$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto();
$produto->setEmail($categoria);

$usado = "";

$CategoriaDao = new CategoriaDao($conexao);

$categorias = $CategoriaDao->listaCategoria();
 ?>

  <h1>Cadastro de GMUD</h1>
    <form action="adiciona-produto.php" method="post">

        <? include 'produto-formulario-base.php';?>

          <tr>
            <td>
            <br>
            <input class="btn btn-primary" type="submit" value="Cadastrar" />
            </td>
            <td>
            </td>
          </tr>
      </table>
    </form>

<?php include 'rodape.php'; ?>
