<script src="/assets/js/runtime.c464bbd1982b6f37ac4e.js"></script>
<script src="/assets/js/vendor.c464bbd1982b6f37ac4e.js"></script>
<script src="/assets/js/icons.c464bbd1982b6f37ac4e.js"></script>
<script src="/assets/js/core.c464bbd1982b6f37ac4e.js"></script>
<script src="/assets/js/pagesshared.c464bbd1982b6f37ac4e.js"></script>

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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