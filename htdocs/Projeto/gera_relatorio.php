
<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$relatorio = $_POST['nome_relatorio'];


if ($relatorio == 'venda_dia') {
    $nome_relatorio = "Vendas do Dia";
    include("relatorio_venda_dia.php");

} else if ($relatorio == 'venda_semana') {
    $nome_relatorio = "Vendas da Semana";
    include("relatorio_venda_semana.php");

} else if ($relatorio == 'venda_mes') {
    $nome_relatorio = "Vendas do Mês";
    include("relatorio_venda_mes.php");

}else if ($relatorio == 'venda_func') {
    $nome_relatorio = "Vendas do Funcionário";
    include("relatorio_venda_func.php");
    
}else if ($relatorio == 'venda_produto') {
    $nome_relatorio = "Vendas por Produto";
    include("relatorio_venda_produto.php");
    
}else if ($relatorio == 'venda_datas') {
    $nome_relatorio = "Vendas entre Datas";
    include("relatorio_venda_datas.php");
    
}else if ($relatorio == 'venda_cliente') {
    $nome_relatorio = "Vendas por Cliente";
    include("relatorio_venda_cliente.php");
    
}


?>
<title>Mercado MELB | Relatório - <?php print $nome_relatorio ?></title>



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