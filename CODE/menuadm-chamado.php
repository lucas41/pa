<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Area Administrativa</title>

    <link rel="stylesheet" href="./css/icons.css">
    <link rel="stylesheet" href="./css/core.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body class="loading" data-layout="dark-sidenav">
    <?php

    include './sql/sql.php';

    $id = $_GET['id'];
    ?>
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
                <!-- INICIO NAVBAR SUPERIOR TITULO -->
                <div class="navbar-custom">

                    <!-- INICIO TÍTULO DA PÁGINA E BOTÃO DE SAIR -->
                    <div class="app-search">
                        <h4>ÁREA ADMINISTRATIVA <a class="badge badge-danger float-right" href="scripts/sair.php">SAIR</a></h4>
                    </div>
                    <!-- FIM TÍTULO DA PÁGINA E BOTÃO DE SAIR -->

                </div>
                <!-- FIM NAVBAR SUPERIOR TITULO -->
                <?php
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
                ?>

                <div class="container-fluid">
                    <!-- INICIO TÍTULO CARD DA PÁGINA -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Status chamado #<?php echo $id ?> <?php echo $status ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- INICIO TÍTULO CARD DA PÁGINA -->

                    <!-- INICIO CARD DA PÁGINA -->
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="p-lg-3">

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
                                                } else if ("<?php echo $status ?>" == 'Em progresso') {
                                                    document.getElementById('prog_progresso').setAttribute('class', 'active');
                                                    document.getElementById('prog_analise').setAttribute('class', 'active');
                                                } else if ("<?php echo $status ?>" == 'Em análise') {
                                                    document.getElementById('prog_analise').setAttribute('class', 'active');
                                                }
                                            </script>
                                        </form>
                                    </section>
                                    <!-- END progressbar -->
                                    <div class="container">

                                        <p> Localização: <?php echo $nomerua ?> Nº <?php echo $numero ?></p>

                                        <p> Detalhes: <?php echo $detalhes ?></p>

                                        <p> Imagem de seu chamado anexada</p>

                                        <img src="./uploads/<?php echo $imagem ?>" style="width: 600px; hight: 600px">

                                    </div>

                                <?php
                                }
                                ?>
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
</body>

</html>