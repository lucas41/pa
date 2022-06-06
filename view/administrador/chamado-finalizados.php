<?php

include '/var/www/html/templates/administrador/css.php';
include '/var/www/html/templates/message.php';

include '/var/www/html/templates/administrador/leftsidebar.php';
include '/var/www/html/templates/administrador/header.php';

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chamados Fechados</h4>
            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <div class="p-lg-3">

                <div class="container" style="margin-top: 40px">

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
                        
                        $consulta = $conexao->prepare("select * from chamados WHERE status = 'Finalizado'");

                        $consulta->execute();
                        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($linha as $func) {
                            $id_chamado = $func->id_chamado;
                            $id = $func->n_chamado;
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

                                <td> <?php echo htmlentities($id)  ?> </td>
                                <td> <?php echo htmlentities($detalhes)   ?> </td>
                                <td> <?php echo htmlentities($data)       ?> </td>
                                <td> <?php echo htmlentities($status)     ?> </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/view/administrador/chamado-detalhado.php?id=<?php echo $id_chamado ?>" role="button"> visualizar </a>

                                    <button type="button" data-toggle=modal data-target=#modalExemplo<?php echo $id ?> class="btn btn-sm btn-success" id="button_edit<?php echo $id ?>"> Atualizar Status </button>
                                    <script>
                                        if ("<?php echo $status ?>" == 'Finalizado') {
                                            document.getElementById('button_edit<?php echo $id ?>').style.display = "none";
                                        }
                                    </script>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalExemplo<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Altere o status do chamado</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <!-- INICIO MODAL BODY -->
                                                <div class="modal-body">

                                                    <!-- INICIO FORM STATUS -->
                                                    <form action="./adm/atualiza-status.php" method="post" enctype="multipart/form-data">
                                                        <h4>Status atual: <?php echo $status ?></h4>
                                                        <input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none">
                                                        <div class="form-group">
                                                            <select class="form-select" name="status" aria-label="Default select example" onchange="muda(this);">
                                                                <option style="display:none;" selected>Selecione o status</option>
                                                                <option value="Em análise">Em análise</option>
                                                                <option value="Em progresso">Em progresso</option>
                                                                <option value="Finalizado">Finalizado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="caixa1" style="display: none;">
                                                            <br> <label> Informações de fechamento: </label> <br>
                                                            <div class="form-floating">
                                                                <textarea name="inf_fechamento" class="form-control" id="floatingTextarea2" style="height: 100px" require></textarea>
                                                            </div>
                                                            <br>
                                                            <div class="alert alert-danger" role="alert">
                                                                <b>Ao finalizar esse chamado não será mais possivel editar!</b>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- FIM FORM STATUS -->

                                                        <!-- FIM MODAL BODY -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-danger" id="button_att"> Atualizar </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>

                </div>
                <!-- FIM CONTEUDO CARD -->

            </div>
        </div>
    </div>
    <!-- FIM CARD CARD DA PÁGINA -->

</div>

<?php include '/var/www/html/templates/administrador/js.php'; ?>