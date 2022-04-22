<?php

include 'sql.php';
include 'password.php';


$nomeusuario = $_POST['nomeusuario'];
$mailusuario = $_POST['mailusuario'];
$senhausuario = $_POST['senhausuario'];





$sql = "INSERT INTO usuarios (nomeusuario, mailusuario, senha) VALUES ('$nomeusuario','$mailusuario', sha1('$senhausuario'))";

$inserir = mysqli_query($conexao,$sql);


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container" style="width: 400px; margin-top: 20px;">

    <h4> Usuario adicionado com sucesso </h4>
    <div style="margin-top: 20px;">
        <center>
            <a href="cadastro_usuario.php" role="button" class="btn btn-sm btn-primary"> Cadastrar um novo item </a>
        </center>
    </div>
</div>