<?php
//print_r($_POST);
error_reporting(0);

session_name('mercado');
session_start();

include "includes/conect.php";

$acao = $_POST['valor'];
$id_prod = $_POST['id'];
$cont = $_POST['cont'];
$id_venda = $_POST['id_venda'];
$quantidade = $_POST['quantidade'];

$remove_tudo = $_POST['remove_tudo'];

$query = "SELECT preco_venda FROM produtos WHERE id = $id_prod";
$result = mysqli_query($conect, $query);
$dados = mysqli_fetch_array($result);
$valor_venda = $dados['preco_venda'];

$query = "SELECT * FROM venda_produto WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
$result = mysqli_query($conect, $query);
$dados_produto = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);


if ($acao == "adicionar") {
    if ($num_rows > 0) {
        $query = "UPDATE venda_produto SET quantidade = ". $dados_produto['quantidade'] . "  + $quantidade, valor_unit = $valor_venda, valor_total = $valor_venda * (". $dados_produto['quantidade'] . "  + $quantidade) WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
    } else {
        if ($quantidade != 0) {
            $query = "INSERT INTO venda_produto (quantidade, valor_unit, valor_total, id_vendas, id_produtos) VALUES 
            (
                $quantidade,
                $valor_venda,
                $valor_venda * $quantidade,
                $id_venda,
                $id_prod
            );
        ";
        }
    }
    //print $query;
    
} elseif ($acao == "remover") {
    if ($num_rows > 0) {
        
        if ($remove_tudo != '' or $dados_produto['quantidade'] - $quantidade <= 0) $query = "DELETE FROM venda_produto WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
        else $query = "UPDATE venda_produto SET quantidade = ". $dados_produto['quantidade'] . "  - $quantidade, valor_unit = $valor_venda, valor_total = $valor_venda * (". $dados_produto['quantidade'] . "  - $quantidade) WHERE id_vendas = $id_venda AND id_produtos = $id_prod";

        
    }
} elseif ($acao == "checar") {
    print $dados_produto['quantidade'];
    exit();
}

mysqli_query($conect, $query);
?>
<div class="card" id="card_produtos_venda">
    <div class="card-header">
        Produtos da Compra
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table table-bordered table-hover" id="venda">
                <thead>
                    <tr>
                        <th scope="col">Id do Produto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Pre&ccedil;o de Venda</th>
                        <th scope="col">Código de Barras</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Remover do Carrinho</th>
                    </tr>
                </thead>
                <tbody id="vendas_body">
                    <?php
                    $query = "SELECT produtos.*, venda_produto.quantidade FROM venda_produto INNER JOIN produtos ON venda_produto.id_produtos = produtos.id WHERE id_vendas = $id_venda";
                    $result = mysqli_query($conect, $query);
                    while ($dados = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <th scope="row"><?php print $dados['id'] ?></th>
                            <td><?php print $dados['nome'] ?></td>
                            <td><?php print $dados['marca'] ?></td>
                            <td>R$ <?php print $dados['preco_venda'] ?></td>
                            <td><?php print $dados['cod_barras'] ?></td>
                            <td><?php print number_format($dados['quantidade']) ?></td>
                            <td><button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Remover do Carrinho" onclick="removerCarrinho(<?php print $dados['id']; ?>)"><i class="fa fa-shopping-basket"></i></button></td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>

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

</div>