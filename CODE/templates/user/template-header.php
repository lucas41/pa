<?php if (isset($_SESSION['usuario'])) { ?>
    <header id="header" class="fixed-top ">

        <?php include '/var/www/html/CODE/templates/template-message.php'; ?>

        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="/CODE/usuario/view/index.php">LOS CHICAGOS</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/CODE/usuario/view/chamado-abrir.php">Abrir chamado</a></li>
                    <li><a class="nav-link scrollto" href="/CODE/usuario/view/chamado-todos.php">Todos os chamados</a></li>
                    <li><a class="getstarted scrollto" href="/CODE/scripts/sair.php">Sair</a></li>
                </ul>
            </nav>

        </div>

    </header>
<?php } else { ?>

    <header id="header" class="fixed-top">

        <?php include '/var/www/html/CODE/templates/template-message.php'; ?>

        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="/CODE/usuario/view/index.php">LOS CHICAGOS</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#cadastro">Cadastrar</a></li>
                    <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
                </ul>
            </nav>

        </div>

    </header>

<?php } ?>