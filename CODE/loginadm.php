<?php

include 'sql.php';
include 'password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$consulta = $conexao->prepare("select email,senha,nome FROM administradores WHERE email = '$usuario'");


//$buscar - mysqli_query($conexao,$sql)
$consulta->execute();

// $total - mysqli_num_rows($buscar)

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
        
        header('Location: menuadm.php'); // renderiza o menu
    } else {
        header('Location: erro.php'); // eniva para a pagina de erro
    }
} else {
    header('Location: erro.php');// eniva para a pagina de erro
}
     

   
   }
?>






