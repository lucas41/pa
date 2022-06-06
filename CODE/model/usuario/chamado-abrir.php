<?php

include '/var/www/html/model/sql/sql.php';

use Ramsey\Uuid\Nonstandard\Uuid;
require_once '/var/www/html/vendor/autoload.php';

$id= Uuid::uuid4();
$nrua = $_POST['nrua'];
$numero = $_POST['numero'];
$referencial = $_POST['referencial'];
$detalhes = $_POST['detalhes'];
$status = 'Em análise';

$nome_final = $_FILES['imagem']['name'];
$_UP['pasta'] = '/var/www/html/assets/uploads/';
move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'] . $nome_final);

$imagem = $nome_final;

session_start();

$id_user = $_SESSION['id_user'];

$novo_chamado = array($id, $nrua, $numero, $referencial, $detalhes, $imagem, $status, $id_user);

$gravar = $conexao->prepare("insert into chamados (id_chamado, nrua, numero,referencial,detalhes,imagem, status, id_user) values (?,?,?,?,?,?,?,?)");

try {
    $gravar->execute($novo_chamado);
    $_SESSION['message_ok'] = "Chamado realizado com sucesso!";
    header('Location: /view/usuario/chamado-todos.php');
} catch (\PDOException $err) {
    $_SESSION['message_err'] = "Erro ao realizado chamado!";
    header('Location: /view/usuario/chamado-todos.php');
}
