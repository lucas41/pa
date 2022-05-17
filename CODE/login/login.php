<?php

include '../sql/sql.php';
include '../scripts/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$consulta = $conexao->prepare("select mailusuario,senha,nomeusuario FROM usuarios WHERE mailusuario = '$usuario'");


$consulta->execute();

$total = $consulta->rowCount();


$linha = $consulta->fetchall(PDO::FETCH_OBJ);

foreach($linha as $func){ 

    $mailusuario = $func->mailusuario;
    $senha = $func->senha; //senha que recebo do banco
    $nomeusuario = $func->nomeusuario;


    $senhadecodificada = md5($senhausuario);
    // senha recebida pelo post sendo criptografada para conferencia em md5 e sha1
    $senhadecodificada = sha1($senhadecodificada);



    if($total > 0){ // verifica se a pesquisa encontrou ao menos um cadastro no banco de dados
        
        if($senhadecodificada == $senha){ // compara a senha que vem do banco com a senha envida pelo post ja criptografada
   
        session_start();
        $_SESSION['usuario'] = $nomeusuario; // inicia nova sessão e passa o nome da pessoa
        
        header('Location: ../menu.php'); // renderiza o menu
    } else {
        header('Location: ../scripts/erro.php'); // eniva para a pagina de erro
    }
} else {
    header('Location: ../scripts/erro.php');// eniva para a pagina de erro
}
     

   
   }

   ?>
