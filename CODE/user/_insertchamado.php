<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php

    session_start();

    $usuario = $_SESSION['usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: index.html');
    }

?>

<body>

    <div class="container" style="width: 400px; margin-top: 100px;">
        <h4> Cadastro novo chamado </h4>
        <br>
        <form action="_insertnewchamado.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nome da rua </label>
                <input type="text" name="nrua" class="form-control" required autocomplete="off" placeholder="Nome da rua onde o problema se encontra">
            </div>
            <div class="form-group">
                <label>Numero </label>
                <input type="number" name="numero" class="form-control" required autocomplete="off" placeholder="Numero da casa">
            </div>
            <div class="form-group">
                <label> Referencia </label>
                <input type="text" name="referencial" class="form-control" required autocomplete="off" placeholder="Uma referencia do local">
            </div>
            <div class="form-group">
                <label> detalhes: </label>
                <br>
                <div class="form-floating">
                    <textarea name="detalhes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label> Imagem: </label>
                <input type="file" name="imagem" class="form-control">
            </div>
            <br>
            <div style="text-align: right">
                <button type="submit" class="btn btn-sm btn-success"> Cadastrar </button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>