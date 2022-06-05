<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Administrativa</title>

    <link href="/CODE/css/icons.css" rel="stylesheet">
    <link href="/CODE/css/core.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/searchbuilder/1.3.3/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="loading" data-layout="dark-sidenav">

    <?php
    session_start();
    $usuario = $_SESSION['usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: ./index.html');
    }

    if (($_SESSION['permission'] != 'ok')) {
        header('location: ./index.html');
    }

    include 'message.php'; ?>
    <div class="wrapper">

        <?php include '/var/www/html/CODE/templates/adm/menulateral.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="navbar-custom">

                    <div class="app-search">
                        <h4>ÁREA ADMINISTRATIVA <a class="badge badge-danger float-right" href="/CODE/scripts/sair.php">SAIR</a></h4>
                    </div>

                </div>

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Informação do chamado</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="p-lg-3">

                                <div class="container">
                                    <?php include '/var/www/html/CODE/templates/chamado.php'; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <script src="/CODE/js/runtime.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/vendor.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/icons.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/core.c464bbd1982b6f37ac4e.js"></script>
            <script src="/CODE/js/pagesshared.c464bbd1982b6f37ac4e.js"></script>

            <script src="//code.jquery.com/jquery-3.5.1.js"></script>
            <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
            <script src="//cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
            <script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="//cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        buttons: ['searchBuilder'],
                        dom: 'Bfrtip',
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado",
                            "info": "Página _PAGE_ de _PAGES_",
                            "infoEmpty": "Nenhum registro disponível",
                            "infoFiltered": "(filtrado de _MAX_ registros no total)",
                            "paginate": {
                                "first": "Primeira",
                                "last": "Última",
                                "next": "Próxima",
                                "previous": "Anterior"
                            },
                            "search": "Pesquisar:",
                            "searchBuilder": {
                                title: {
                                    0: 'Filtro',
                                    _: 'Filtro (%d)'
                                },
                                clearAll: 'Limpar Tudo',
                                add: '+',
                                button: {
                                    0: 'Filtro Avançado',
                                    _: 'Filtro Avançado (%d)'
                                },
                                data: 'Coluna',
                                condition: 'Comparador',
                                value: 'Opção',

                            }
                        }
                    });
                });
            </script>

            <script type='text/javascript'>
                function muda(obj, id) {
                    var index = obj.selectedIndex;
                    var option = obj.options[index].value;
                    if (option == 'Finalizado') {
                        document.getElementById('caixa' + id).style.display = "block";


                    } else
                    if (option == 'Em análise') {
                        document.getElementById('caixa' + id).style.display = "none";

                    } else
                    if (option == 'Em progresso') {
                        document.getElementById('caixa' + id).style.display = "none";

                    }
                }
            </script>

            <script>
                new bootstrap.Toast(toastNotice).show();
            </script>
</body>

</html>