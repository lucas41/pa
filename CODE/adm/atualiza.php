<?php 

include('../sql/sql.php');

$id = $_POST['id'];
$nomerua = $_POST['nomerua'];
$numero = $_POST['numero'];
$referencial = $_POST['referencial'];
$detalhes = $_POST['detalhes'];
$status = $_POST['status'];
$inf_fechamento = $_POST['inf_fechamento'];

if ($status == 'Finalizado'){
    $editar = $conexao->prepare("update chamados set nrua=?, numero=?, referencial=?, detalhes=?, status=?, inf_fechamento=? where id_chamado=? ");
    $editar->execute(array($nomerua,$numero,$referencial,$detalhes,$status,$inf_fechamento,$id));
}else{
    $editar = $conexao->prepare("update chamados set nrua=?, numero=?, referencial=?, detalhes=?, status=? where id_chamado=? ");
    $editar->execute(array($nomerua,$numero,$referencial,$detalhes,$status,$id));
}

if($editar){
    echo ("<br> Atualização feita com sucesso!");
}else{
    echo("<br> Erro ao atualizar funcionário!");
}

?>

<button><a href="../menuadm.php"> Voltar pra home </a></button>