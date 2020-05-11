<?php
function mostraAlerta ($tipo) {
      if (isset($_SESSION[$tipo])) {
?>
  <p class="alert-<?= $tipo?>"><?= $_SESSION[$tipo]?></p>
<?
  unset($_SESSION[$tipo]);
      }
}
