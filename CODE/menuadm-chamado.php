<?php

include 'sql/sql.php';

$id = $_GET['id'];



?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">


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
    $inf_fechamento = $func->inf_fechamento;
?>
    <div class="container" style="margin-top: 40px">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="p-lg-3">
                    <center>
                        <h1> Informações do chamado: <?php echo $id ?> </h1>
                        <div>
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
                                        } else if ("<?php echo $status ?>" == 'Em progresso') {
                                            document.getElementById('prog_progresso').setAttribute('class', 'active');
                                            document.getElementById('prog_analise').setAttribute('class', 'active');
                                        } else if ("<?php echo $status ?>" == 'Em análise') {
                                            document.getElementById('prog_analise').setAttribute('class', 'active');
                                        }
                                    </script>
                                </form>
                            </section>
                        </div>
                    </center>
                    <br>
                    <div class="card text-justify">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <?php
                                    if ($status == 'Em análise') {
                                    ?><a class="nav-link active" >Sua solicitação está em analise por um de nossos atendentes</a> <?php } ?>
                                    <?php
                                    if ($status == 'Em progesso') {
                                    ?><a class="nav-link active">Sua solicitação está sendo tratada por uma equipe</a> <?php } ?>
                                    <?php
                                    if ($status == 'Finalizado') {
                                    ?><a class="nav-link active" >Sua solicitação foi corrigida</a> <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nome da rua: <?php echo $nomerua ?>, Numero: <?php echo $numero ?></h5>
                            <p class="card-text"> Referencia: <?php echo $referencial ?></p>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"><b>Detalhes da ocorrencia</b></label>
                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"> <?php echo $detalhes ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h1> Localização </h1>
                            <br>
                        
                        <div class="col-6">
                            <h1> Imagem </h1>
                            <br>
                            <img src="uploads/<?php echo $imagem ?>" width="600" height="335">
                        </div>
                    </div>
                </div>
                    
                <?php 
                    if ($inf_fechamento != null){
                        ?>
                        <br><br>
                            <div class="container">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"><b>Informações de Encerramento do chamado</b></label>
                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $inf_fechamento ?></textarea>
                        <?php
                    }
                ?>


                <br>
                <div style="text-align: left">
                    <a href="menuadm-chamados-todos.php" role="button" class="btn btn-primary btn-sm"> Voltar</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


<?php
}
?>