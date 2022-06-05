<?php

session_start();
$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header('location: /CODE/usuario/view/index.php');
}

if (($_SESSION['permission'] != 'ok')) {
    header('location: /CODE/usuario/view/index.php');
}

include '/var/www/html/CODE/administrador/view/css.php';
include '/var/www/html/CODE/templates/template-message.php';
include '/var/www/html/CODE/templates/adm/menulateral.php';

?>

<body class="loading" data-layout="dark-sidenav">

    <div class="wrapper">

        <div class="content-page">
            <div class="content">
                <!-- INICIO NAVBAR SUPERIOR -->
                <div class="navbar-custom">

                    <!-- INICIO TÍTULO DA PÁGINA E BOTÃO DE SAIR -->
                    <div class="app-search">
                        <h4>ÁREA ADMINISTRATIVA <a class="badge badge-danger float-right" href="/CODE/scripts/sair.php">SAIR</a></h4>
                    </div>
                    <!-- FIM TÍTULO DA PÁGINA E BOTÃO DE SAIR -->

                </div>
                <!-- FIM NAVBAR SUPERIOR -->

                <div class="container-fluid">
                    <!-- INICIO TÍTULO CARD DA PÁGINA -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Chamados Fechados</h4>
                            </div>
                        </div>
                    </div>
                    <!-- INICIO TÍTULO CARD DA PÁGINA -->

                    <!-- INICIO CARD DA PÁGINA -->
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="p-lg-3">

                                <!-- INICIO CONTEUDO CARD -->

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
                                        include '/var/www/html/CODE/sql/sql.php';
                                        $consulta = $conexao->prepare("select * from chamados WHERE status = 'Finalizado'");

                                        $consulta->execute();
                                        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($linha as $func) {
                                            $id = $func->id_chamado;
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

                                                <td> <?php echo $id         ?> </td>
                                                <td> <?php echo $detalhes   ?> </td>
                                                <td> <?php echo $data       ?> </td>
                                                <td> <?php echo $status     ?> </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="/CODE/administrador/view/chamado.php?id=<?php echo $id ?>" role="button"> visualizar </a>

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

            </div>
            <script src="/CODE/js/runtime.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/vendor.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/icons.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/core.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/pagesshared.c464bbd1982b6f37ac4e.js"></script>

            <script src="//code.jquery.com/jquery-3.5.1.js"></script>
            <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
            <script src="//cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
            <script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="//cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        buttons: ['searchBuilder'],
                        dom: 'Bfrtip',
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado",
                            "info": "Página _PAGE_ de _PAGES_",
                            "infoEmpty": "Nenhum registro disponível",
                            "infoFiltered": "(filtrado de _MAX_ registros no total)",
                            "paginate": {
                                "first": "Primeira",
                                "last": "Última",
                                "next": "Próxima",
                                "previous": "Anterior"
                            },
                            "search": "Pesquisar:",
                            "searchBuilder": {
                                title: {
                                    0: 'Filtro',
                                    _: 'Filtro (%d)'
                                },
                                clearAll: 'Limpar Tudo',
                                add: '+',
                                button: {
                                    0: 'Filtro Avançado',
                                    _: 'Filtro Avançado (%d)'
                                },
                                data: 'Coluna',
                                condition: 'Comparador',
                                value: 'Opção',

                            }
                        }
                    });
                });
            </script>

            <script type='text/javascript'>
                function muda(obj) {
                    var index = obj.selectedIndex;
                    var option = obj.options[index].value;
                    if (option == 'Finalizado') {
                        document.getElementById('caixa1').style.display = "block";


                    } else
                    if (option == 'Em análise') {
                        document.getElementById('caixa1').style.display = "none";

                    } else
                    if (option == 'Em progresso') {
                        document.getElementById('caixa1').style.display = "none";

                    }
                }
            </script>

            <script>
                new bootstrap.Toast(toastNotice).show();
            </script>
</body>

</html>