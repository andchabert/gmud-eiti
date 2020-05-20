<?php
require_once 'cabecalho.php';

  //Domínio
  $dominio = "eitisolucoes.local";
  
  //Endereco do servido AD IP ou nome
  $servidor_AD = "10.168.12.194";
  
  $usuario = $_POST['email']."@".$dominio;
  $senha = $_POST['senha'];

  // Conexão com servidor AD. 
  $ad = ldap_connect("ldap://". $servidor_AD ."/")
      or die("Não foi possível conexão com Active Directory!");
  
  // Versao do protocolo       
  ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
  // Usara as referencias do servidor AD, neste caso nao
  ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
       
  // Bind to the directory server.
  $bd = ldap_bind($ad, $usuario, $senha );
 
  if( $bd ){
    logaUsuario($usuario);
    $_SESSION["success"] = "Usuário " . $usuario .  " logado com sucesso";
    header ("Location: index.php");
  }else{
    $_SESSION["danger"] = "Usuário ou senha inválidos";
  header ("Location: index.php");
  }
 
  //Fecha conexao
  ldap_unbind($ad);
?>