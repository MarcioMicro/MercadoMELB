<?php

session_name('mercado');
session_start();

include "includes/conect.php";

$id_produto = $_POST['id_produto'];

if ($id_produto != '') {
    $query_vendas_produto = "SELECT 
                                vendas.*, funcionarios.nome, venda_produto.id_produtos,venda_produto.quantidade ,produtos.nome AS nome_produto,funcionarios.nome AS nome_func,clientes.nome AS nome_cliente 
                            from 
                                vendas 
                            INNER JOIN 
                                funcionarios 
                            ON 
                                funcionarios.id = vendas.id_funcionarios 
                            INNER JOIN 
                                clientes 
                            ON 
                                clientes.id = vendas.id_clientes 
                            INNER JOIN 
                                venda_produto 
                            ON 
                                vendas.id = venda_produto.id_vendas 
                            INNER JOIN 
                                produtos
                            ON 
                                venda_produto.id_produtos = produtos.id    
                            WHERE 
                                venda_produto.id_produtos = $id_produto";
    $result_vendas_produto = mysqli_query($conect, $query_vendas_produto);
}
?>
<link rel="stylesheet" src="css/style.css">

<main class= "esconde">
    <div class="container-fluid">
        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Gerar Relatório</h1>
            <br>
            <div class="card">
                <div class="card-header">
                    Relatório de vendas por produtos
                </div>
                <div class="card-body">
                    <div class="row">
                        <form id="form_relatorio" name="form_relatorio" method="post" action="#">

                            <label for="func" class="form-label">Produtos</label>
                            <select class="form-select" id="id_produto" name="id_produto">
                                <option value="">Selecione</option>
                                <?php
                                $query_produto = "SELECT nome,id FROM produtos";
                                $result_produto = mysqli_query($conect, $query_produto);

                                while ($dados_produto = mysqli_fetch_array($result_produto)) { ?>
                                    <option value="<?php print $dados_produto['id'] ?>"><?php print $dados_produto['nome'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                            <div class="row buttons-cadastro">

                                <div class="col-md-12 d-flex justify-content-center">
                                    <button class="btn btn-success btn-lg me-3" type="submit">Gerar Relatório</button>

                                    <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='relatorios.php'">Cancelar</button>
                                </div>
                                <input type="hidden" name="nome_relatorio" id="nome_relatorio" value="venda_produto">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php if ($id_produto != '') { ?>
    <main>
        <div class="container-fluid">
            <div class="col-md-12 listagem-produtos">
                <br>
                <div class="card">
                    <div class="card-header">
                        Relatório de vendas por funcionários.
                    </div>
                    <div class="card-body">
                    <table class="table table table-bordered table-hover" id="venda">
                                <thead>
                                    <tr>
                                        <th scope="col">Id da Venda</th>
                                        <th scope="col">Data da Venda</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Valor da Venda</th>
                                        <th scope="col">Funcionário</th>
                                        <th scope="col">Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dados = mysqli_fetch_array($result_vendas_produto)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php print $dados['id']; ?></th>
                                            <td><?php print $dados['data_venda']; ?></td>
                                            <td><?php print $dados['nome_produto']; ?></td>
                                            <td><?php print "R$ " . number_format($dados['valor_total'], 2, ',', '.'); ?></td>
                                            <td><?php print $dados['nome_func']; ?></td>
                                            <td><?php print $dados['nome_cliente']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <br>
                <div class="row" style="align-items: center;">

                    <div class="col-xl-2 col-md-6 mb-4">
                        <?php

                        $query_qtd_vendas = "SELECT 
                                                count(*)
                                            FROM
                                                vendas
                                            INNER JOIN 
                                                venda_produto 
                                            ON 
                                                vendas.id = venda_produto.id_vendas 
                                            INNER JOIN 
                                                produtos
                                            ON 
                                                venda_produto.id_produtos = produtos.id     
                                            WHERE 
                                                venda_produto.id_produtos = $id_produto";

                        $result_cont_vendas = mysqli_query($conect, $query_qtd_vendas);
                        $qtd_vendas = mysqli_fetch_array($result_cont_vendas);

                        ?>
                        <div class="card border-left-primary shadow h-100 py-2" style="border-left: solid 3px #0d6efd;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Quantidade de Vendas</div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            <?php print $qtd_vendas[0]; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-cart-arrow-down" style="font-size: 2em;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 mb-4">
                        <?php

                        $query_valor_vendas = "SELECT 
                                                vendas.valor_total
                                            FROM
                                                vendas 
                                            INNER JOIN 
                                                venda_produto 
                                            ON 
                                                vendas.id = venda_produto.id_vendas 
                                            INNER JOIN 
                                                produtos
                                            ON 
                                                venda_produto.id_produtos = produtos.id     
                                            WHERE 
                                                venda_produto.id_produtos = $id_produto";

                        $result_valor_vendas = mysqli_query($conect, $query_valor_vendas);
                        while ($dados_venda = mysqli_fetch_array($result_valor_vendas)) {
                            $valor_venda = $dados_venda[0];
                            $valor_total = $valor_total + $valor_venda;
                        }

                        ?>
                        <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #1cc88a;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Valor total das Vendas</div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            <?php print "R$ " . number_format($valor_total, 2, ',', '.'); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-2 col-md-6 mb-4">
                        <?php

                        $query_qtd_cliente = "SELECT 
                                               vendas.* 
                                            FROM
                                                vendas              
                                            INNER JOIN 
                                                venda_produto 
                                            ON 
                                                vendas.id = venda_produto.id_vendas 
                                            INNER JOIN 
                                                produtos
                                            ON 
                                                venda_produto.id_produtos = produtos.id     
                                            WHERE 
                                                venda_produto.id_produtos = $id_produto   
                                            GROUP BY 
                                                id_clientes";

                        $result_qtd_cliente = mysqli_query($conect, $query_qtd_cliente);
                        $qtd_clientes_unicos = mysqli_num_rows($result_qtd_cliente);

                        ?>
                        <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #5a5c69;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Vendas para Cliente Único</div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            <?php print $qtd_clientes_unicos ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user" style="font-size:2em"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 mb-4">
                        <?php

                        $query_venda_max = "SELECT 
                                            max(vendas.valor_total)
                                        FROM
                                            vendas 
                                            INNER JOIN 
                                                venda_produto 
                                            ON 
                                                vendas.id = venda_produto.id_vendas 
                                            INNER JOIN 
                                                produtos
                                            ON 
                                                venda_produto.id_produtos = produtos.id     
                                            WHERE 
                                                venda_produto.id_produtos = $id_produto";

                        $result_venda_max = mysqli_query($conect, $query_venda_max);
                        $venda_mais_cara = mysqli_fetch_array($result_venda_max);

                        ?>
                        <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #0dcaf2;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Maior venda realizada</div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            <?php print "R$ " . number_format($venda_mais_cara[0], 2, ',', '.'); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-wave" style="font-size: 2em;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 mb-4">
                        <?php

                        $query_venda_min = "SELECT 
                                           min(vendas.valor_total) 
                                        FROM
                                            vendas 
                                            INNER JOIN 
                                                venda_produto 
                                            ON 
                                                vendas.id = venda_produto.id_vendas 
                                            INNER JOIN 
                                                produtos
                                            ON 
                                                venda_produto.id_produtos = produtos.id     
                                            WHERE 
                                                venda_produto.id_produtos = $id_produto";

                        $result_venda_min = mysqli_query($conect, $query_venda_min);
                        $venda_menos_cara = mysqli_fetch_array($result_venda_min);

                        ?>
                        <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #dc3545;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Menor venda realizada</div>
                                        <div class="h5 mb-0 font-weight-bold ">
                                            <?php print "R$ " . number_format($venda_menos_cara[0], 2, ',', '.'); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt" style="font-size: 2em;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-2 col-md-6 mb-4">
                        <button class="btn btn-warning" onclick="window.print()">Imprimir / Salvar PDF</button>
                    </div>
                </div>
            </div>
        </div>
      
    </main>

<?php } ?>
