<?php 

include('../sql/sql.php');

$id = $_POST['id'];
$nomerua = $_POST['nomerua'];
$numero = $_POST['numero'];
$referencial = $_POST['referencial'];
$detalhes = $_POST['detalhes'];
$status = $_POST['status'];


$editar = $conexao->prepare("update chamados set nrua=?, numero=?, referencial=?, detalhes=?, status=? where id_chamado=? ");



$editar->execute(array($nomerua,$numero,$referencial,$detalhes,$status,$id));

if($editar){
    echo ("<br> Atualização feita com sucesso!");
}else{
    echo("<br> Erro ao atualizar funcionário!");
}

?>

<button><a href="../menuadm.php"> Voltar pra home </a></button>