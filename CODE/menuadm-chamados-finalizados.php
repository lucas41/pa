<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Administrativa</title>

    <link href="./css/icons.css" rel="stylesheet">
    <link href="./css/core.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/searchbuilder/1.3.3/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="loading" data-layout="dark-sidenav">

    <?php
    session_start();
    $usuario = $_SESSION['usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: ../index.html');
    }

    if (($_SESSION['permission'] != 'ok')) {
        header('location: ../index.html');
    }

    if (isset($_SESSION['message'])) {
    ?>
        <center>
            <br>
            <div aria-live="polite" aria-atomic="true" class="position-relative" >
                <div class="toast-container position-absolute align-items-center w-100">
                    <div id="toastNotice" class="toast align-items-center text-white bg-success bg-gradient border-0" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                        <div class="d-flex">
                            <div class="toast-body">
                                <?php echo $_SESSION['message'] ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </center>

    <?php
        $_SESSION['message'] = NULL;
    } ?>

    <div class="wrapper">
        <div class="left-side-menu" id="left-side-bar">
            <div class="slimscroll-menu" id="left-side-menu-container"><a href="#" class="logo text-center"><span class="logo-lg"><img src="./public/images/logo.png" height="100" id="side-main-logo"> </span></a>

                <!-- INICIO NAVBAR LATERAL -->
                <ul class="mt-3 metismenu side-nav" id="left-bar-menu">

                    <li class="side-nav-title side-nav-item">Visão geral</li>
                    <li class="side-nav-item"><a href="#" class="side-nav-link"><i class="dripicons-web"></i>
                            <span>Chamados/Usuários</span></a></li>

                    <li class="side-nav-title side-nav-item mt-2">Chamados</li>
                    <li class="side-nav-item"><a href="menuadm-chamados-todos.php" class="side-nav-link"><i class="dripicons-view-list"></i>
                            <span>Todos chamados</span></a></li>
                    <li class="side-nav-item"><a href="menuadm-chamados-ativos.php" class="side-nav-link"><i class="dripicons-view-list"></i>
                            <span>Chamados ativos</span></a></li>
                    <li class="side-nav-item"><a href="menuadm-chamados-finalizados.php" class="side-nav-link"><i class="dripicons-view-list"></i>
                            <span>Chamados finalizados</span></a></li>

                    <li class="side-nav-title side-nav-item mt-2">Usuários</li>
                    <li class="side-nav-item"><a href="#" class="side-nav-link"><i class="dripicons-user-group"></i>
                            <span>Todos Usuários</span></a></li>
                    <li class="side-nav-item"><a href="#" class="side-nav-link"><i class="dripicons-user"></i>
                            <span>Outros</span></a></li>

                </ul>
                <!-- FIM NAVBAR LATERAL -->
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <!-- INICIO NAVBAR SUPERIOR -->
                <div class="navbar-custom">

                    <!-- INICIO TÍTULO DA PÁGINA E BOTÃO DE SAIR -->
                    <div class="app-search">
                        <h4>ÁREA ADMINISTRATIVA <a class="badge badge-danger float-right" href="scripts/sair.php">SAIR</a></h4>
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
                                        include 'sql/sql.php';
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
                                            $status = $func->status;
                                        ?>

                                            <tr style="text-align: center;">

                                                <td> <?php echo $id         ?> </td>
                                                <td> <?php echo $detalhes   ?> </td>
                                                <td> <?php echo $data       ?> </td>
                                                <td> <?php echo $status     ?> </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="menuadm-chamado.php?id=<?php echo $id ?>" role="button"> visualizar </a>

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

                    <!-- INICIO FOOTER -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">2018 - 2021 © Hyper - Coderthemes.com</div>
                                <div class="col-md-6">
                                    <div class="text-md-right footer-links d-none d-md-block"><a href="https://coderthemes.com/" target="_blank">About</a> <a href="https://coderthemes.com/" target="_blank">Support</a></div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- FIM FOOTER -->

                </div>

            </div>
            <script src="./js/runtime.c464bbd1982b6f37ac4e.js"></script>
            <script src="./js/vendor.c464bbd1982b6f37ac4e.js"></script>
            <script src="./js/icons.c464bbd1982b6f37ac4e.js"></script>
            <script src="./js/core.c464bbd1982b6f37ac4e.js"></script>
            <script src="./js/pagesshared.c464bbd1982b6f37ac4e.js"></script>

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