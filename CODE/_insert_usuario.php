<?php

include 'sql/sql.php';
include 'scripts/password.php';


$nomeusuario = $_POST['nomeusuario'];
$mailusuario = $_POST['mailusuario'];
$senhausuario = $_POST['senhausuario'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];


$senhausuario = md5($senhausuario);
$senhausuario = sha1($senhausuario);


$novo_cadastro = array($nomeusuario, $mailusuario, $telefone, $cpf, $senhausuario);


$gravar = $conexao->prepare("insert into usuarios (nomeusuario, mailusuario,telefone,cpf,senha) values (?,?,?,?,?)");

if($gravar->execute($novo_cadastro)){




    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container" style="width: 400px; margin-top: 20px;">

    <h4> Usuario adicionado com sucesso </h4>
    <div style="margin-top: 20px;">
        <center>
            <a href="index.html" role="button" class="btn btn-sm btn-primary"> Menu </a>
        </center>
    </div>
</div>
    <?php
} else {
    echo 'erro no cadastro';
}






?>

