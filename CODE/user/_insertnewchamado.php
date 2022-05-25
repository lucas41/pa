<?php

include '../sql/sql.php';

$nrua = $_POST['nrua'];
$numero = $_POST['numero'];
$referencial = $_POST['referencial'];
$detalhes = $_POST['detalhes'];
$status = 'Aguardando';

$nome_final = $_FILES['imagem']['name'];
$_UP['pasta'] = '../uploads/';
move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final); 

$imagem = $nome_final;

session_start();

$id_user = $_SESSION['id_user'];

//echo 'bem vindo ' . $_SESSION['usuario'] . ' ID = a '. $_SESSION['id_user'];
$novo_chamado = array($nrua, $numero, $referencial, $detalhes, $imagem, $status, $id_user);
$gravar = $conexao->prepare("insert into chamados (nrua,numero,referencial,detalhes,imagem,status,id_user) values (?,?,?,?,?,?,?)");

try {
    $gravar->execute($novo_chamado);
    echo 'chamado registrado';
} catch (\PDOException $err) {
    echo "Erro ao registrar ".$err;
}

?>
