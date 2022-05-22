<?php

include('../sql/sql.php');

$id = $_GET['id'];

$listar = $conexao->prepare("select * from chamados where id_chamado=?");
$listar->execute(array($id));
$linha = $listar->fetchAll(PDO::FETCH_OBJ);

foreach ($linha as $func) {  //a cada linha, ele percorre o banco de dados (a partir doq vc fatiou)
    $id = $func->id_chamado;
    $nomerua = $func->nrua;
    $numero = $func->numero;
    $referencial = $func->referencial;
    $detalhes = $func->detalhes;
    $imagem = $func->imagem;
    $status = $func->status;
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container" style="width: 400px; margin-top: 100px;">
        <h4> Editar chamado </h4>
        <br>
        <form action="atualiza.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nome da rua </label>
                <input value="<?php echo $nomerua ?>" type="text" name="nomerua" class="form-control" required autocomplete="off" placeholder="Nome da rua onde o problema se encontra">
            </div>
            <input type="number" class="form-control" name="id" value="<?php echo $id?>" style="display: none">
            <div class="form-group">
                <label>Numero </label>
                <input value="<?php echo $numero ?>" type="number" name="numero" class="form-control" required autocomplete="off" placeholder="Numero da casa">
            </div>
            <div class="form-group">
                <label> Referencia </label>
                <input value="<?php echo $referencial ?>" type="text" name="referencial" class="form-control" required autocomplete="off" placeholder="Uma referencia do local">
            </div>
            <div class="form-group">
                <label> detalhes: </label>
                <br>
                <div class="form-floating">
                    <input value="<?php echo $detalhes ?>" name="detalhes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></input>
                </div>
            </div>
            <br>
            <div class="form-group">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option selected> Status atual: <?php echo $status ?></option>
                    <option value="Aguardando">Aguardando</option>
                    <option value="progresso">Em progresso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
            <br>
            <div style="text-align: right">
                <a class="btn btn-sm btn-primary" href="../menuadm.php">voltar</a>
                <button type="submit" class="btn btn-sm btn-success"> Atualizar </button>
            </div>
        </form>
    </div>

<?php
}
?>