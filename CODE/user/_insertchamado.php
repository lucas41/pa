<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/searchbuilder/1.3.3/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="../css/css-index/aos/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style-login.css">

    <!-- Template Main CSS File -->
    <link href="../css/css-index/style.css" rel="stylesheet">

</head>
<?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}
?>

<body style="background-color:#37517e">
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">LOS CHICAGOS</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="_insertchamado.php">Abrir chamado</a></li>
                    <li><a class="nav-link scrollto" href="../menu.php">Ver todos os chamados</a></li>
                    <li><a class="nav-link scrollto" href="../scripts/sair.php">Sair</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <br><br>

    <section id="about" class="about">
        <div class="container" style="background:white; border-radius: 15px">
            <br>
            <div style="margin: 0 2% 0% ">
                <h4> Cadastro novo chamado </h4>
                <br>
                <form action="_insertnewchamado.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome da rua </label> 
                        <input type="text" name="nrua" class="form-control" required autocomplete="off" placeholder="Nome da rua onde o problema se encontra">
                        <br>
                    </div>
                    <div class="form-group">
                        <label>Numero </label>
                        <input type="number" name="numero" class="form-control" required autocomplete="off" placeholder="Numero da casa">
                        <br>
                    </div>
                    <div class="form-group">
                        <label> Referencia </label>
                        <input type="text" name="referencial" class="form-control" autocomplete="off" placeholder="Uma referencia do local">
                        <br>
                    </div>
                    <div class="form-group">
                        <label> detalhes: </label>
                        <br>
                        <div class="form-floating">
                            <textarea name="detalhes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Imagem: </label>
                        <input type="file" name="imagem" class="form-control" required>
                    </div>
                    <br>
                    <div style="text-align: right">
                        <button type="submit" class="btn btn-sm btn-success"> Cadastrar </button>
                     
                    </div>
                </form>
                <br>
            </div>
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
    <script src="./js/js-index/main.js"></script>

</body>

</html>