<?php

include '../sql/sql.php';

$id = $_GET['id'];



?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<?php

$consulta = $conexao->prepare("select * from chamados where id_chamado = $id");
$consulta->execute(); //todas as linhas da minha tabela
$linha = $consulta->fetchAll(PDO::FETCH_OBJ);
foreach ($linha as $func) {
    $id = $func->id_chamado;
    $nomerua = $func->nrua;
    $numero = $func->numero;
    $referencial = $func->referencial;
    $detalhes = $func->detalhes;
    $imagem = $func->imagem;
?>
    <div class="container" style="margin-top: 50px">
        <h1> Informações sobre seu chamado Nº: <?php echo $id ?></h1>

        <p> Localização: <?php echo $nomerua ?> Nº <?php echo $numero ?></p>

        <p> Detalhes: <?php echo $detalhes ?></p>

        <p> Imagem de seu chamado anexada</p>

        <img src="../uploads/<?php echo $imagem ?>" style="width: 600px; hight: 600px">
        <div>
            <a href="../menu.php" class="btn btn-sm btn-primary"> Voltar </a>
        </div>
    </div>


<?php
}
?>