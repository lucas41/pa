<?php

include '../sql/sql.php';
include '../scripts/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$consulta = $conexao->prepare("select id_user,mailusuario,senha,nomeusuario FROM usuarios WHERE mailusuario = '$usuario'");
$consulta->execute();

$total = $consulta->rowCount();

$linha = $consulta->fetchall(PDO::FETCH_OBJ);

foreach($linha as $func){ 

    $mailusuario = $func->mailusuario;
    $senha = $func->senha;
    $nomeusuario = $func->nomeusuario;
    $id_user = $func->id_user;

    // senha recebida pelo post sendo criptografada para conferencia em md5 e sha1
    $senhadecodificada = md5($senhausuario);
    $senhadecodificada = sha1($senhadecodificada);

    if($total > 0){ // verifica se a pesquisa encontrou ao menos um cadastro no banco de dados
        
        if($senhadecodificada == $senha){ // compara a senha que vem do banco com a senha envida pelo post ja criptografada
   
            session_start();
            $_SESSION['usuario'] = $nomeusuario; // inicia nova sessão e passa o nome da pessoa
            $_SESSION['id_user'] = $id_user;

            header('Location: ../menu.php'); // renderiza o menu
        } else {
            session_start();
            $_SESSION['msg_error'] = 'Falha ao digitar a senha tente novamente';
            header("location: ../index.php");
        }
    } else {
         session_start();
        $_SESSION['msg_error'] = 'Falha ao digitar a senha tente novamente';
        header("location: ../index.php");
    }
   
}

?>