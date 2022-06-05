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
            <br>
            <div style="margin: 0 2% 0% ">

                <h1 style="color:black; text-align: center;"> ABRIR CHAMADO </h1>

                <br>
                <form action="/CODE/usuario/model/chamado-abrir.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <b><label>Nome da rua </label></b>
                        <input type="text" name="nrua" class="form-control" required autocomplete="off" placeholder="Nome da rua onde o problema se encontra">
                        <br>
                    </div>
                    <div class="form-group">
                        <b><label>Número </label></b>
                        <input type="number" name="numero" class="form-control" required autocomplete="off" placeholder="Numero da casa">
                        <br>
                    </div>
                    <div class="form-group">
                        <b><label>Referência </label></b>
                        <input type="text" name="referencial" class="form-control" autocomplete="off" placeholder="Uma referencia do local">
                        <br>
                    </div>
                    <div class="form-group">
                        <b><label>Detalhes: </label></b>
                        <br>
                        <div class="form-floating">
                            <textarea name="detalhes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Imagem: </label></b>
                        <input type="file" name="imagem" class="form-control" required>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <br>
                        <button type="submit" class="btn btn-lg btn-success "> Cadastrar </button>

                    </div>
                </form>
                <br>
            </div>
        </div>

    </section>

</body>

<?php include '/var/www/html/CODE/usuario/view/js.php'; ?>

</html>