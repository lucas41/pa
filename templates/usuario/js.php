<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<script src="/assets/js/js-index/swiper/swiper-bundle.min.js"></script>
<script src="/assets/js/js-index/aos/aos.js"></script>
<script src="/assets/js/js-index/glightbox/glightbox.min.js"></script>
<script src="/assets/js/js-index/main.js"></script>

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

<script>
    new bootstrap.Toast(toastNotice).show();
</script>