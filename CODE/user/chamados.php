<?php

include '../sql/sql.php';

$id = $_GET['id'];



?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row">
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
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="../uploads/<?php echo $imagem ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chamado Numero: <?php echo $id ?></h5>
                        <p class="card-text">Localização na rua: <?php echo $nomerua ?> <br> Numero - <?php echo $numero ?></p>
                        <p class="card-text"><?php echo $detalhes ?></p>
                        <a href="user/chamados.php?id=<?php echo $id ?>" class="btn btn-primary">Visualizar detalhes</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>