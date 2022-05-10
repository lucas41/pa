<?php


$host = 'localhost';

define('USER', 'root');

define('PASSWORD', '');

define('DB_NAME', 'pa');


$conexao = new PDO('mysql:host='.$host.';dbname='.DB_NAME, USER, PASSWORD);



?>