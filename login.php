<?php

include 'sql.php';
include 'password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$sql = "SELECT mailusuario,senha,nomeusuario FROM usuarios WHERE mailusuario = '$usuario'";

$buscar = mysqli_query($conexao,$sql);

$total = mysqli_num_rows($buscar);

 

while($array = mysqli_fetch_array($buscar)){


 echo $senha = $array['senha'];
 $nameusuario = $array['nomeusuario'];

echo $senhadecodificada = sha1($senhausuario);


if ($total > 0) {
    if($senhadecodificada == $senha){

        session_start();
        $_SESSION['usuario'] = $nameusuario;
        
        header('Location: menu.php');
    } else {
        header('Location: erro.php');
    }
} else {
    
    header('Location: erro.php');
}

}



?>