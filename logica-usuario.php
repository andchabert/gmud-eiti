
<?php
session_start ();


function logaUsuario($email) {
  $_SESSION["usuario_logado"] = $email;
}

function usuario_logado() {
  return $_SESSION["usuario_logado"];
}

function usuarioEstaLogado () {
  return isset($_SESSION["usuario_logado"]);
  }

function verificaUsuario () {
if (!usuarioEstaLogado()) {
  $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
  header ("Location: index.php");
die();
    }
}

function logout () {
//  unset ($_SESSION['usuario_logado']);
  session_destroy();
  session_start();
}
