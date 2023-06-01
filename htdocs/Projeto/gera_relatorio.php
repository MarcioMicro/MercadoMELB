<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$relatorio = $_POST['nome_relatorio'];


if ($relatorio == 'venda_dia') {

    include("relatorio_venda_dia.php");

} else if ($relatorio == 'venda_semana') {

    include("relatorio_venda_semana.php");

} else if ($relatorio == 'venda_mes') {

    include("relatorio_venda_mes.php");

}else if ($relatorio == 'venda_func') {

    include("relatorio_venda_func.php");
    
}else if ($relatorio == 'venda_produto') {

    include("relatorio_venda_produto.php");
    
}else if ($relatorio == 'venda_datas') {

    include("relatorio_venda_datas.php");
    
}else if ($relatorio == 'venda_cliente') {

    include("relatorio_venda_cliente.php");
    
}


?>




<script>
    $('#venda').DataTable({
        "language": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sEmptyTable": "Sem dados disponíveis nesta tabela",
            "sInfo": "Mostrando registros de _START_ a _END_ em um total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
            "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sLast": "Último",
                "sNext": "Seguinte",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Ordenar de forma crescente",
                "sSortDescending": ": Ordenar de forma decrescente"
            }
        }
    });
</script>