<?php

include '/var/www/html/CODE/sql/sql.php';
include '/var/www/html/CODE/usuario/view/css.php';

$id = $_GET['id'];

$consulta = $conexao->prepare("select * from chamados where id_chamado = $id");
$consulta->execute();
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
    <div class="container">
        <div class="p-lg-3">
            <h1 style="text-align: center;"> Informações do chamado #<?php echo htmlentities($id) ?> </h1>
            <div>
                <section class="multi_step_form">
                    <form id="msform">
                        <ul id="progressbar">
                            <li id="prog_analise">Em análise</li>
                            <li id="prog_progresso">Em progresso</li>
                            <li id="prog_finalizado">Finalizado</li>
                        </ul>
                        <script>
                            if ("<?php echo htmlentities($status) ?>" == 'Finalizado') {
                                document.getElementById('prog_finalizado').setAttribute('class', 'active');
                                document.getElementById('prog_progresso').setAttribute('class', 'active');
                                document.getElementById('prog_analise').setAttribute('class', 'active');
                            } else if ("<?php echo htmlentities($status) ?>" == 'Em progresso') {
                                document.getElementById('prog_progresso').setAttribute('class', 'active');
                                document.getElementById('prog_analise').setAttribute('class', 'active');
                            } else if ("<?php echo htmlentities($status) ?>" == 'Em análise') {
                                document.getElementById('prog_analise').setAttribute('class', 'active');
                            }
                        </script>
                    </form>
                </section>
            </div>
            <br>
            <div class="card text-justify">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <?php
                            if ($status == 'Em análise') {
                            ?><a class="nav-link active">Sua solicitação está em analise por um de nossos atendentes</a> <?php } ?>
                            <?php
                            if ($status == 'Em progesso') {
                            ?><a class="nav-link active">Sua solicitação está sendo tratada por uma equipe</a> <?php } ?>
                            <?php
                            if ($status == 'Finalizado') {
                            ?><a class="nav-link active">Sua solicitação foi corrigida</a> <?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Nome da rua</b></label>
                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="1" style="width:70%; resize: none"> <?php echo htmlentities($nomerua) ?> </textarea>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Número</b></label>
                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="1" style="width:39%; resize: none"> <?php echo htmlentities($numero) ?> </textarea>
                        </div>
                    </div>

                    <br>

                    <label for="exampleFormControlTextarea1" class="form-label"><b>Referência</b></label>
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="1" style="width:70%; resize: none"> <?php echo htmlentities($referencial) ?> </textarea>

                    <br>

                    <label for="exampleFormControlTextarea1" class="form-label"><b>Detalhes da ocorrencia</b></label>
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="2" style="width:70%; resize: none"> <?php echo htmlentities($detalhes) ?> </textarea>

                    <br>

                    <?php if ($inf_fechamento != null) { ?>

                        <label for="exampleFormControlTextarea1" class="form-label"><b>Informações de Encerramento do chamado</b></label>
                        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="2" style="width:70%; resize: none"><?php echo htmlentities($inf_fechamento) ?></textarea>

                    <?php } ?>

                    <br>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1> Localização </h1>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14756.135268926595!2d-46.91105235!3d-22.390082550000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1653868206264!5m2!1spt-BR!2sbr" width="600" height="335" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col">
                            <h1> Imagem </h1>
                            <img src="/CODE/uploads/<?php echo htmlentities($imagem) ?>" width="500" height="335">
                        </div>
                    </div>
                </div>
                <br>
            </div>

        </div>
        <br>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>


    <?php } ?>