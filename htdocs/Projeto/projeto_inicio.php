<?php 
session_name('mercado');
session_start();

if ($_SESSION == array()) {
    $msg = urlencode("Sessão Encerrada");

header("Location: index.php?mensagem=$msg");
  
}

include "includes/cabecalho.php"; ?>
<div>


</div>
</div>
</div>


</meta>