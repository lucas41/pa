<?php

include 'conexao.php';

session_start();

session_destroy();

header("location: /CODE/usuario/view/index.php");

?>