<?php

session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('location: /');
}

include '/var/www/html/templates/usuario/css.php';
include '/var/www/html/templates/usuario/header.php';

?>

<body style="background-color: #37517e">

    <br><br>

    <section id="about" class="about">
        <div class="container" style="background:white; border-radius: 15px">
            <br>
            <div style="margin: 0 2% 0% ">

                <h1 style="color:black; text-align: center;"> TODOS OS CHAMADOS </h1>

                <br>
                <table id="example" style="width:100%" class="table">
                    <thead>
                        <tr style="text-align: center;" class="table-dark">
                            <th scope="col">Nº Chamado</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>

                    <?php
                    
                    include '/var/www/html/model/sql/sql.php';

                    $consulta = $conexao->prepare("select * from chamados where id_user=" . $_SESSION['id_user']);
                    $consulta->execute(); //todas as linhas da minha tabela
                    $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($linha as $func) {
                        $id = $func->id_chamado;
                        $n_chamado = $func->n_chamado;
                        $nomerua = $func->nrua;
                        $numero = $func->numero;
                        $referencial = $func->referencial;
                        $detalhes = $func->detalhes;
                        $imagem = $func->imagem;
                        $data = $func->Date;
                        $data = implode("/", array_reverse(explode("-", $data)));
                        $status = $func->status;

                    ?>

                        <tr style="text-align: center;">
                            <td> <?php echo htmlentities($n_chamado) ?> </td>
                            <td> <?php echo htmlentities($detalhes) ?> </td>
                            <td> <?php echo htmlentities($data) ?> </td>
                            <td> <?php echo htmlentities($status) ?> </td>
                            <td> <a class="btn btn-primary btn-sm" style="color:white" href="/view/usuario/chamado-detalhado.php?id=<?php echo $id ?>" role="button"><i class="fa-solid fa-pen-to-square"></i> visualizar </a> </td>
                        </tr>

                    <?php } ?>

                </table>
                <br>
            </div>
        </div>
    </section>

    <?php

    include '/var/www/html/templates/usuario/footer.php';
    include '/var/www/html/templates/usuario/js.php';

    ?>

</body>

</html>