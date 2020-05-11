<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once 'logica-usuario.php';
require_once 'mostra-alerta.php';
require_once 'conecta.php';
function carregaClass ($nomeDaClasse){
  require_once 'class/'.$nomeDaClasse.'.php';
}
spl_autoload_register("carregaClass");
?>
<html>
<head>
    <title>Eiti Gmud</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link href="css/tabeladinamica.css" rel="stylesheet">
</head>
<body>
<?if (usuarioEstaLogado()) {?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alterna navegação">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="index.php"><img src="images/logo.jpg" style="width: 50px;height: 30px;"></a>
<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
<li class="nav-item">
<a class="nav-link" data-toggle="tooltip"  title="Cadastrar GMUD"  href="produto-formulario.php"><span class="material-icons">add</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tooltip"  title="Pesquisar GMUD"  href="produto-lista.php"><span class="material-icons">search</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tooltip" title="Cad E-mail Aprovador" href="categoria-formulario.php"><span class="material-icons">group_add</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tooltip" title="Contato" href="contato.php"><span class="material-icons">contact_support</span></a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tooltip"  title="Logout" href="logout.php"><span class="material-icons">exit_to_app</span></a>
</li>
</ul>
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
</form>
<?
    }
?>
</div>
</nav>
<div class="container">
<div class="principal">
    <br>
<!-- fim cabecalho.php -->
