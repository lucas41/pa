<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="./css/css-index/aos/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Template Main CSS File -->
    <link href="../css/css-index/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Template Main CSS File -->
    <link href="../css/css-index/style.css" rel="stylesheet">

</head>

<body style="background-color:#37517e">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">LOS CHICAGOS</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="../menu2.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="_insertchamado.php">Abrir chamado</a></li>
                    <li><a class="nav-link scrollto" href="../menu2.php">Ver todos os chamados</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <br><br>

    <section id="about" class="about">
        <div class="container" style="background:white; border-radius: 15px">
            <?php

            include '../sql/sql.php';

            $id = $_GET['id'];


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
                <div class="container">
                    <div>
                        <div class="card-body">
                            <div class="p-lg-3">
                                <center>
                                    <h1 style="margin-top: 50px"> Informações do chamado #<?php echo $id ?> </h1>
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
                                        <h5 class="card-title">Nome da rua: <?php echo $nomerua ?>, Numero: <?php echo $numero ?></h5>
                                        <p class="card-text"> Referencia: <?php echo $referencial ?></p>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"><b>Detalhes da ocorrencia</b></label>
                                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"> <?php echo $detalhes ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($inf_fechamento != null) {
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

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <h1> Localização </h1>
                                                <br>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14756.135268926595!2d-46.91105235!3d-22.390082550000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1653868206264!5m2!1spt-BR!2sbr" width="500" height="335" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <div class="col-6">
                                                <h1> Imagem </h1>
                                                <br>
                                                <img src="../uploads/<?php echo $imagem ?>" width="500" height="335">
                                            </div>
                                        </div>
                                    </div>



                                    <br>

                                    </div>
                                </div>
                                <br>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


                <?php
            }
                ?>
                </div>
    </section>







    <!-- Vendor JS Files -->
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


    <script src="../js/js-index/aos/aos.js"></script>
    <script src="../js/js-index/glightbox/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../js/js-index/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="../js/js-index/main.js"></script>

</body>

</html>