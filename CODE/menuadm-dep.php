<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/searchbuilder/1.3.3/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>

<body>

    <?php
    session_start();
    $usuario = $_SESSION['usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: index.html');
    }

    if (($_SESSION['permission'] != 'ok')) {
        header('location: index.html');
    }
    ?>

    <div class="container" style="margin-top: 40px">
        <h1>Chamados registrados </h1>

        <br><br>

        <table id="example" style="width:100%" class="table">
            <thead>
                <tr style="text-align: center;" class="table-dark">
                    <th scope="col">Nº Chamado</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>

            <?php
            include 'sql/sql.php';
            $consulta = $conexao->prepare("select * from chamados");
            $consulta->execute();
            $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
            foreach ($linha as $func) {
                $id = $func->id_chamado;
                $nomerua = $func->nrua;
                $numero = $func->numero;
                $referencial = $func->referencial;
                $detalhes = $func->detalhes;
                $imagem = $func->imagem;
                $data = $func->Date;
                $status = $func->status;
            ?>

                <tr style="text-align: center;">

                    <td> <?php echo $id         ?> </td>
                    <td> <?php echo $detalhes   ?> </td>
                    <td> <?php echo $data       ?> </td>
                    <td> <?php echo $status     ?> </td>
                    <td> <a class="btn btn-primary btn-sm" href="user/chamados.php?id=<?php echo $id ?>" role="button"> visualizar </a>

                        <a class="btn btn-success btn-sm" href="adm/edita.php?id=<?php echo $id ?>" role="button" id="button_edit"> Editar </a>
                        <script>
                            if ("<?php echo $status ?>" == 'finalizado') {
                                document.getElementById('button_edit').setAttribute('style', 'display: none;');
                            }
                        </script>
                    </td>
                </tr>

            <?php
            }
            ?>


        </table>

        <br> <a class="btn btn-danger" href="scripts/sair.php">Sair</a>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

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

</body>


</html>