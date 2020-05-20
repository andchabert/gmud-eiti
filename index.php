
<?php require_once 'cabecalho.php';
      require_once 'logica-usuario.php';

mostraAlerta("success");
mostraAlerta("danger");
?>
    <h1> Bem Vindo ao GMUD EITI </h1>
    <br> 
    <br>   <?
    if (usuarioEstaLogado()) { ?>
        <p class="alert-success"> Você esta logado como <?=usuario_logado()?></p>
    <?
  } else {
    ?>
<link href="css/loja.css" rel="stylesheet">
  <body class="text-center">
    <form action="ad.php" method="post" class="form-signin">
    <img class="mb-4" src="images/logo.jpg" style="width: 100px; height: 90px;" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1><br>
      <input type="text" name="email"  class="form-control" placeholder="Seu email" required autofocus>
      <br>
      <input type="password" name="senha" class="form-control" placeholder="Senha" required>
       <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </body>
</html>

<?
}
?>
<?php include 'rodape.php'; ?>