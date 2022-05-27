<?php 

include('../sql/sql.php');

session_start();

$id = $_POST['id'];
$status = $_POST['status'];
$inf_fechamento = $_POST['inf_fechamento'];


try {
    if ($status == 'Finalizado'){
        $editar = $conexao->prepare("update chamados set status=?, inf_fechamento=? where id_chamado=? ");
        $editar->execute(array($status,$inf_fechamento,$id));
    }else{
        $editar = $conexao->prepare("update chamados set status=? where id_chamado=? ");
        $editar->execute(array($status,$id));
    }
    $_SESSION['message'] = "Status atualizado com sucesso!";
    $_SESSION['messageID'] = 1;
} catch (\PDOException $err) {
    $_SESSION['message'] = "Falha ao atualizar o status!";
    $_SESSION['messageID'] = 0;
}

header('Location: ../menuadm-chamados-todos.php');
