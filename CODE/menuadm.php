<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $permissao = $_SESSION['permission'];
    if (!isset($_SESSION['usuario'])) {
        header('location: index.html');
    }
    if( $permissao != 'ok'){
        header('location: menu.php');
    }
    ?>

    <h1> Menu de ADM</h1>
    <div class="container" style="margin-top: 40px">
        <h1> chamados registrados </h1>
        <br>
        <div class="container">
            <div class="row">
                <?php
                include 'sql/sql.php';
                $consulta = $conexao->prepare("select * from chamados");
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
                            <img src="uploads/<?php echo $imagem ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chamado Numero: <?php echo $id ?></h5>
                                <p class="card-text">Localização na rua: <?php echo $nomerua ?> No numero <?php echo $numero ?></p>
                                <p class="card-text"><?php echo $detalhes ?></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                   

                <?php
                }
                ?>
            </div>
        </div>
    
        <br>
        <a class="btn btn-danger" href="scripts/sair.php">Sair</a>
    </div>
</body>
</html>