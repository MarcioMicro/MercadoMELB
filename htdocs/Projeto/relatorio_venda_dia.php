<?php

session_name('mercado');
session_start();

include "includes/conect.php";


    $relatorio_nome = "Relatório de vendas do dia";
    $hoje = date('y-m-d');
    $query_produto_hoje = "SELECT 
                            vendas.*, funcionarios.nome AS nome_func,clientes.nome AS nome_cliente
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
                        WHERE 
                            data_venda 
                        LIKE  
                            '%$hoje%' ";
                            print $query_produto_hoje;
    $result_produto_hoje = mysqli_query($conect, $query_produto_hoje);

    ?>

<main>
    <div class="container-fluid">
        <br>
        <div class="col-md-12 listagem-produtos">
            <div class="card">
                <div class="card-header">
                   Vendas do Dia
                </div>
                <div class="card-body">
                        <table class="table table table-bordered table-hover" id="venda">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Data da Venda</th>
                                    <th scope="col">Valor da Venda</th>
                                    <th scope="col">Funcionário</th>
                                    <th scope="col">Cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_array($result_produto_hoje)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php print $dados['id']; ?></th>
                                        <td><?php print $dados['data_venda']; ?></td>
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
</main>