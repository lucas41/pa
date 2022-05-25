<?php

include '../sql/sql.php';

$id = $_GET['id'];



?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">


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
    $status = $func->status;
?>
    <!-- START progressbar -->
    <section class="multi_step_form">
        <form id="msform">
            <ul id="progressbar">
                <li id="prog_analise">Em análise</li>
                <li id="prog_progresso">Em progresso</li>
                <li id="prog_finalizado">Finalizado</li>
            </ul>
            <script>
                if ("<?php echo $status ?>" == 'Finalizado') {
                    document.getElementById('prog_finalizado').setAttribute('class', 'active');
                    document.getElementById('prog_progresso').setAttribute('class', 'active');
                    document.getElementById('prog_analise').setAttribute('class', 'active');
                }else if("<?php echo $status ?>" == 'Em progresso'){
                    document.getElementById('prog_progresso').setAttribute('class', 'active');
                    document.getElementById('prog_analise').setAttribute('class', 'active');
                }else if("<?php echo $status ?>" == 'Em análise'){
                    document.getElementById('prog_analise').setAttribute('class', 'active');
                }
            </script>
        </form>
    </section>
    <!-- END progressbar -->
    <div class="container">



        <h1> Informações sobre seu chamado Nº: <?php echo $id ?> <?php echo $status ?></h1>

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