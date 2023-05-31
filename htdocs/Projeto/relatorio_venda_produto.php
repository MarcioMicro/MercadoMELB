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

<main>
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
                                        <th scope="col">Quantidade Comprada</th>
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
                                            <td><?php print $dados['quantidade']; ?></td>
                                            <td><?php print $dados['valor_total']; ?></td>
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
            </div>
        </div>
        </div>
    </main>

<?php } ?>