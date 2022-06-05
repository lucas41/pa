<?php

include '/var/www/html/CODE/sql/sql.php';
include '/var/www/html/CODE/scripts/password.php';

$nomeusuario = $_POST['nomeusuario'];
$mailusuario = $_POST['mailusuario'];
$senhausuario = $_POST['senhausuario'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$titulo = "Bem vindo ao website"; // Titulo do Email a ser enviado
$mensagem = "Olá " . $nomeusuario . " é um prazer ter você conosco seja bem vindo"; // Mensagem do email a ser enviado 


$verificacpf = $cpf;

// Extrai somente os números
$verificacpf = preg_replace('/[^0-9]/is', '', $verificacpf);

// Verifica se foi informado todos os digitos corretamente
if (strlen($verificacpf) != 11) {
    $cpferrado = 'sim';
    session_start();
    $_SESSION['message_err'] = "CPF invalido!";
}

// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
else if (preg_match('/(\d)\1{10}/', $verificacpf)) {
    $cpferrado = 'sim';
    session_start();
    $_SESSION['message_err'] = "CPF invalido!";
} else {
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $verificacpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($verificacpf[$c] != $d) {
            $cpferrado = 'sim';
            session_start();
            $_SESSION['message_err'] = "CPF invalido!";
        }
    }
}

$cpf = md5($cpf);
$cpf = sha1($cpf);
$senhausuario = md5($senhausuario); // criptografando a senha com md5
$senhausuario = sha1($senhausuario); //criptografando a senha com sha1

$consulta = $conexao->prepare("select * from usuarios");
$consulta->execute();
$linha = $consulta->fetchAll(PDO::FETCH_OBJ);
foreach ($linha as $func) {
    $email = $func->mailusuario;
    if ($email == $mailusuario) {
        $existente = 'sim';
        session_start();
        $_SESSION['message_err'] = "E-mail já cadastrado!";
        break;
    }
}


if ($existente == 'sim') {
    header("location: /CODE/usuario/view/index.php");
} else if ($cpferrado == 'sim') {
    header("location: /CODE/usuario/view/index.php");
} else {
    $novo_cadastro = array($nomeusuario, $mailusuario, $telefone, $cpf, $senhausuario);
    $gravar = $conexao->prepare("insert into usuarios (nomeusuario, mailusuario,telefone,cpf,senha) values (?,?,?,?,?)");
    if ($gravar->execute($novo_cadastro)) {
        session_start();
        mail($mailusuario, $titulo, $mensagem); // se o cadastro for feito enviar um email informando a pessoa.
        $_SESSION['message_ok'] = "Cadastro realizado com sucesso!";
        header("location: /CODE/usuario/view/index.php");
    } else {
        session_start();
        $_SESSION['message_err'] = "Erro ao realizar o cadastro!";
        header("location: /CODE/usuario/view/index.php");
    }
}
