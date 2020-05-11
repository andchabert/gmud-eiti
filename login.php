<?php
require_once 'cabecalho.php';
require_once 'banco-usuario.php';

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if ($usuario == NULL) {
  $_SESSION["danger"] = "Usuário ou senha inválidos";
  header ("Location: index.php");
} else {
  logaUsuario($usuario["email"]);
  $_SESSION["success"] = "Usuário logado com sucesso";
  header ("Location: index.php");
}
die();
