<?php 

session_start();

include '/var/www/html/model/sql/sql.php';

$id = $_POST['id'];
$status = $_POST['status'];
$inf_fechamento = $_POST['inf_fechamento'];


try {
    if ($status == 'Finalizado'){
        $editar = $conexao->prepare("update chamados set status=?, inf_fechamento=? where n_chamado=? ");
        $editar->execute(array($status,$inf_fechamento,$id));
    }else{
        $editar = $conexao->prepare("update chamados set status=? where n_chamado=? ");
        $editar->execute(array($status,$id));
    }
    $_SESSION['message_ok'] = "Status atualizado com sucesso!";
} catch (\PDOException $err) {
    $_SESSION['message_err'] = "Falha ao atualizar o status!";
}

header('Location: /view/administrador/chamado-todos.php');