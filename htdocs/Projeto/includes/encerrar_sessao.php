<?php
session_name('mercado');
session_start();

session_unset();


session_destroy();

$msg = urlencode("Sess�o Encerrada");

header("Location: ../index.php?mensagem=$msg");
exit();


?>