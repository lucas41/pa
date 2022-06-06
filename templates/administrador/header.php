<?php 

session_start();
$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header('location: /');
}

if (($_SESSION['permission'] != 'ok')) {
    header('location: /');
}

?>

<body class="loading" data-layout="dark-sidenav">

    <div class="wrapper">

        <div class="content-page">
            <div class="content">
                <div class="navbar-custom">

                    <div class="app-search">
                        <h4>ÁREA ADMINISTRATIVA <a class="badge badge-danger float-right" href="/model/scripts/sair.php">SAIR</a></h4>
                    </div>

                </div>