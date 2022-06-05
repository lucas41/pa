<?php

include '../sql/sql.php';
include '../scripts/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$consulta = $conexao->prepare("select email,senha,nome FROM administradores WHERE email = '$usuario'");
$consulta->execute();

$total = $consulta->rowCount();

$linha = $consulta->fetchall(PDO::FETCH_OBJ);

$permissao = 'ok';

foreach($linha as $func){ 

    $mailusuario = $func->email;
    $senha = $func->senha; //senha que recebo do banco
    $nomeusuario = $func->nome;


    $senhadecodificada = md5($senhausuario);
 
    $senhadecodificada = sha1($senhadecodificada); 

    if($total > 0){ // verifica se a pesquisa encontrou ao menos um cadastro no banco de dados
        
        if($senhadecodificada == $senha){ // compara a senha que vem do banco com a senha envida pelo post ja criptografada
   
            session_start();
            $_SESSION['usuario'] = $nomeusuario; // inicia nova sessão e passa o nome da pessoa
            $_SESSION['permission'] = $permissao;
            
            header('Location: ../menuadm-chamado-todos.php'); // renderiza o menu
        } else {
            header('Location: ../scripts/erro.php'); // eniva para a pagina de erro
        }
    } else {
        header('Location: ../scripts/erro.php');// eniva para a pagina de erro
    }
     
}
?>
