<?php

include '/var/www/html/model/sql/sql.php';
include '/var/www/html/model/scripts/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$consulta = $conexao->prepare("select email FROM administradores WHERE email = '$usuario';");
$consulta->execute();
$total = $consulta->rowCount();

if ($total > 0) {

    $consulta = $conexao->prepare("select email,senha,nome FROM administradores WHERE email = '$usuario'");
    $consulta->execute();

    $total = $consulta->rowCount();

    $linha = $consulta->fetchall(PDO::FETCH_OBJ);

    $permissao = 'ok';

    foreach ($linha as $func) {

        $mailusuario = $func->email;
        $senha = $func->senha;
        $nomeusuario = $func->nome;


        $senhadecodificada = md5($senhausuario);

        $senhadecodificada = sha1($senhadecodificada);

        if ($total > 0) { // verifica se a pesquisa encontrou ao menos um cadastro no banco de dados

            if ($senhadecodificada == $senha) { // compara a senha que vem do banco com a senha envida pelo post ja criptografada

                session_start();
                $_SESSION['usuario'] = $nomeusuario; // inicia nova sessão e passa o nome da pessoa
                $_SESSION['permission'] = $permissao;
                $_SESSION['message_ok'] = "Login realizado com sucesso";
                header('Location: /view/administrador/chamado-todos.php'); // renderiza o menu
            } else {
                session_start();
                $_SESSION['message_err'] = "E-mail ou Senha invalidos";
                header("location: /");
            }
        } else {
            session_start();
            $_SESSION['message_err'] = "E-mail ou Senha invalidos";
            header("location: /");
        }
    }
} else {

    $consulta = $conexao->prepare("select id_user,mailusuario,senha,nomeusuario FROM usuarios WHERE mailusuario = '$usuario'");
    $consulta->execute();

    $total = $consulta->rowCount();

    $linha = $consulta->fetchall(PDO::FETCH_OBJ);

    foreach ($linha as $func) {

        $mailusuario = $func->mailusuario;
        $senha = $func->senha;
        $nomeusuario = $func->nomeusuario;
        $id_user = $func->id_user;

        $senhadecodificada = md5($senhausuario);
        $senhadecodificada = sha1($senhadecodificada);

        if ($total > 0) { // verifica se a pesquisa encontrou ao menos um cadastro no banco de dados

            if ($senhadecodificada == $senha) { // compara a senha que vem do banco com a senha envida pelo post ja criptografada

                session_start();
                $_SESSION['usuario'] = $nomeusuario; // inicia nova sessão e passa o nome da pessoa
                $_SESSION['id_user'] = $id_user;
                $_SESSION['message_ok'] = "Login realizado com sucesso";
                header('Location: /view/usuario/chamado-todos.php'); // renderiza o menu
            } else {
                session_start();
                $_SESSION['message_err'] = "E-mail ou Senha invalidos";
                header("location: /");
            }
        } else {
            session_start();
            $_SESSION['message_err'] = "E-mail ou Senha invalidos";
            header("location: /");
        }
    }
}
