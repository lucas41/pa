<?php

session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('location: /');
}

include '/var/www/html/templates/usuario/css.php';
include '/var/www/html/templates/usuario/header.php';

?>

<body style="background-color: #37517e">

    <br><br>

    <section id="about" class="about">

        <div class="container" style="background:white; border-radius: 15px">
            <?php include '/var/www/html/templates/chamado-detalhado.php'; ?>
        </div>

    </section>

    <?php

    include '/var/www/html/templates/usuario/footer.php';
    include '/var/www/html/templates/usuario/js.php';

    ?>

</body>