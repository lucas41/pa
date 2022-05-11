<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    session_start();

    $usuario = $_SESSION['usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: index.html');
    }

    echo 'bem vindo ' . $_SESSION['usuario'];
    ?>

    <a  style="background-color: red; color: white" href="sair.php">Sair</a>
</body>

</html>