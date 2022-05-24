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
        <h1>Chamados registrados </h1>


        <br><br>

        <table class="table">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">Nº Chamado</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>

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
                $data = $func->Date;
                $status = $func->status;
            ?>

                <tr style="text-align: center;">
                    <td> <?php echo $id         ?>  </td>
                    <td> <?php echo $detalhes   ?>  </td>
                    <td> <?php echo $data       ?>  </td>
                    <td> <?php echo $status     ?>  </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="user/chamados.php?id=<?php echo $id?>" role="button"> visualizar </a>
                        <a class="btn btn-success btn-sm" href="adm/edita.php?id=<?php echo $id ?>" role="button" id="button_edit"> Editar </a>
                        <script> 
                            if ("<?php echo $status ?>" == 'finalizado'){
                                document.getElementById('button_edit').setAttribute('style', 'display: none;');
                            }
                        </script>
                    </td>
                </tr>
                
            <?php } ?>

        </table>

        <br> <a class="btn btn-danger" href="scripts/sair.php">Sair</a>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>