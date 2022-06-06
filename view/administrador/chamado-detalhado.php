<!doctype html>

<?php

include '/var/www/html/templates/administrador/css.php';
include '/var/www/html/templates/message.php';

include '/var/www/html/templates/administrador/leftsidebar.php';
include '/var/www/html/templates/administrador/header.php';

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Informação do chamado</h4>
                <br><br>
            </div>
        </div>
    </div>

    <div class="card m-b-30">
        <div class="card-body">
            <div class="p-lg-3">

                <div class="container">
                    <?php include '/var/www/html/templates/chamado-detalhado.php'; ?>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include '/var/www/html/templates/administrador/js.php'; ?>
