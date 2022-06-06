<?php

$host = 'db';

define('USER', 'root');

define('PASSWORD', 'root');

define('DB_NAME', 'pa');


$conexao = new PDO('mysql:host='.$host.';dbname='.DB_NAME, USER, PASSWORD);

?>