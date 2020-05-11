<?php require_once 'cabecalho.php';

mostraAlerta("success");
mostraAlerta("danger");

?>
<form action="envia-contato.php" method="post">
  <h1>Contato</h1>
    <table class="table">
      <tr>
        <td>Nome</td>
        <td><input type="text" name="nome" class="form-control">
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" class="form-control">
      </tr>
      <tr>
        <td>Mensagem</td>
        <td><textarea name="mensagem" class="form-control"></textarea>
      </tr>
      <tr>
        <td><button class="btn btn-primary">Enviar</button></td>
        <td>
        </td>
      </tr>
    </table>
</fomr>

<?php require_once 'rodape.php'; ?>
