<?php 
require_once 'cabecalho.php';
require_once 'PHPMailer/PHPMailerAutoload.php';

verificaUsuario();

$produto = new Produto();
$categoria = new Categoria();
$categoria = $_POST["categoria_id"];
$mail = new PHPMailer();

// Funções 

?>
<?php

  $produto->setNome($_POST['nome']);
  $produto->setData($_POST['data']);
  $produto->setHinicio($_POST['hinicio']);
  $produto->setHfim($_POST['hfim']);
  $produto->setJustificativa($_POST['justificativa']);
  $produto->setDescricao($_POST['descricao']);
  $produto->setRiscos($_POST['riscos']);

  if (array_key_exists ('usado', $_POST)) {
    $produto->setUsado(true);
  } else {
    $produto->setUsado(false);
  }

  $produto->setCliente($_POST['cliente']);

  if (array_key_exists ('ticket', $_POST)) {
    $produto->setTicket(true);
  } else {
    $produto->setTicket(false);
  }

  $produto->setNrticket($_POST['nrticket']);
  $produto->setEmail($categoria);
  $produto->setNivel($_POST['nivel']);

$ProdutoDao = new ProdutoDao ($conexao);

if ($ProdutoDao->insereProduto($produto)) {
  $_SESSION["success"] = "Produto adicionado com sucesso";

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.terra.com.br';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "andre.chabert@terra.com.br";
$mail->Password = "Ro2w3ll1";

$mail->setFrom("andre.chabert@terra.com.br", "Contato gmud");
$mail->addAddress("andre.chabert@gmail.com");
$mail->Subject = "Email aprovacao GMUD";
$mail->msgHTML("<html>Segue link para visualização e aprovação da janela de manuntenção <br> http://localhost/gmud/aprovgmud.php</html>");

$mail->AltBody = "de: teste";
$mail->send();
header ("Location: produto-formulario.php");

  } else {
  $_SESSION["danger"] = "Produto não foi adicionado";
  header ("Location: produto-formulario.php");
  }
?>

<?php include 'rodape.php'; ?>
