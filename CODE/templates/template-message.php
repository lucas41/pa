<?php

// MENSAGEM DE SUCESSO
session_start();
if (isset($_SESSION['message_ok'])) {
?>
    <center>
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-absolute align-items-center w-100">
                <div id="toastNotice" class="toast align-items-center text-white bg-success bg-gradient border-0" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo $_SESSION['message_ok'] ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php
    $_SESSION['message_ok'] = NULL;
}

// MENSAGEM DE ERRO
if (isset($_SESSION['message_err'])) {
?>
    <center>
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-absolute align-items-center w-100">
                <div id="toastNotice" class="toast align-items-center text-white bg-danger bg-gradient border-0" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo $_SESSION['message_err'] ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php
    $_SESSION['message_err'] = NULL;
    session_destroy();
}

?>