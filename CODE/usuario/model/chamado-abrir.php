<?php

include '/var/www/html/CODE/sql/sql.php';

$nrua = $_POST['nrua'];
$numero = $_POST['numero'];
$referencial = $_POST['referencial'];
$detalhes = $_POST['detalhes'];
$status = 'Em análise';

$nome_final = $_FILES['imagem']['name'];
$_UP['pasta'] = '/var/www/html/CODE/uploads/';
move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final);

$imagem = $nome_final;

session_start();

$id_user = $_SESSION['id_user'];

$novo_chamado = array($nrua, $numero, $referencial, $detalhes, $imagem, $status, $id_user);

$gravar = $conexao->prepare("insert into chamados (nrua, numero,referencial,detalhes,imagem, status, id_user) values (?,?,?,?,?,?,?)");

try {
    $gravar->execute($novo_chamado);
    header('Location: /CODE/usuario/view/chamado-todos.php');
} catch (\PDOException $err) {
    echo $err;
}
