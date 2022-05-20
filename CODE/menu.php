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
    if (!isset($_SESSION['usuario'])) {
        header('location: index.html');
    }
    ?>

    <div class="container" style="margin-top: 40px">
        <h1> Meus chamados registrados </h1>

        <a href="user/_insertchamado.php" class="btn btn-sm btn-primary"> Cadastrar novo chamado </a>
        <br><br>

        <table class="table">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">Nº Chamado</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <?php
            include 'sql/sql.php';
            $consulta = $conexao->prepare("select * from chamados where id_user=" . $_SESSION['id_user']);
            $consulta->execute(); //todas as linhas da minha tabela
            $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
            foreach ($linha as $func) {
                $id = $func->id_chamado;
                $nomerua = $func->nrua;
                $numero = $func->numero;
                $referencial = $func->referencial;
                $detalhes = $func->detalhes;
                $imagem = $func->imagem;
                $data = $func->Date;
                $status = $func->status;
            ?>

                <tr style="text-align: center;">
                    <td> <?php echo $id ?> </td>
                    <td> <?php echo $detalhes ?> </td>
                    <td> <?php echo $data ?> </td>
                    <td> <?php echo $status ?> </td>
                    <td> <a class="btn btn-primary btn-sm" style="color:white" href="user/chamados.php?id=<?php echo $id?>" role="button"><i class="fa-solid fa-pen-to-square"></i> visualizar </a>
                        <a class="btn btn-danger btn-sm" onclick="alerta()" style="color:white" href="deletar_categoria.php?id=<?php echo $id?>" role="button"><i class="fa-solid fa-trash"></i> Excluir </a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>

        <br>
        <a class="btn btn-danger" href="scripts/sair.php">Sair</a>
    </div>
</body>






</html>