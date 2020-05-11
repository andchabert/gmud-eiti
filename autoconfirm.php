<?php require_once 'cabecalho.php';

// First make sure there is a code passed through the url
if(!isset($_GET['code'])) die;

// Set up your groups
$groups = array(
    '123qweasd' => 'Group 1',
    'dsf355fdf' => 'Group 2',
    '43256vcgd'=> 'Group 3'
);

// Make sure the code is correct
if(!isset($groups[$_GET['code']])) die;

// Any content below here will only be shown to if an index of the above array was passed through the url.

// Output the group name if you want (in this case, the output would be 'Group 1')
?>
<a href="http://localhost/gmud/produto-formulario.php">Link para aprovação do gmud</a>
