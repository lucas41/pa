<?php

include('../sql/sql.php');

$id = $_GET['id'];

$deletar = $conexao->prepare("delete from chamados where id_chamado=?");
$deletar->execute(array($id));

if ($deletar){
    header('Location: ../menuadm.php');
}else {
    echo ("Erro ao excluir criar pagina de erro dentro de scripts");
}




?>