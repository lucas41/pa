<?php

include 'conexao.php';



session_start();

session_destroy();

header("location: index.html");

?>