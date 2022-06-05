<?php

session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('location: /CODE/usuario/view/index.php');
}

include '/var/www/html/CODE/usuario/view/css.php';
include '/var/www/html/CODE/templates/user/template-header.php'; 

?>

<body style="background-color: #37517e">

    <br><br>

    <section id="about" class="about">

        <div class="container" style="background:white; border-radius: 15px">
            <?php include '/var/www/html/CODE/templates/chamado.php'; ?>
        </div>

    </section>

    <?php include '/var/www/html/CODE/templates/user/template-js.php'; ?>

</body>