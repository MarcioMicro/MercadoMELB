<?php

session_name('mercado');
session_start();

$data_inicial = $_POST['data_inicial'] . " 00:00:00"; 
$data_final = $_POST['data_final'] . " 00:00:00";
include "includes/conect.php";
if ($data_final != '' and $data_inicial != '') {
    $query_produto_datas = "SELECT 
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
                                data_venda >= '$data_inicial'
                            AND 
                                data_venda >= '$data_final'";
    $result_produto_datas = mysqli_query($conect, $query_produto_datas);
}
?>

<main>
    <div class="container-fluid">
        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Gerar Relatório</h1>
            <br>
            <div class="card">
                <div class="card-header">
                    Relatório de vendas entre datas
                </div>
                <div class="card-body">
                    <div class="row">
                        <form id="form_relatorio" name="form_relatorio" method="post" action="#">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_inicial" class="form-label">Data Inicial</label>
                                    <input type="date" class="form-control" id="data_inicial" name="data_inicial">
                                </div>

                                <div class="col-md-6">
                                    <label for="data_final" class="form-label">Data Final</label>
                                    <input type="date" class="form-control" id="data_final" name="data_final">
                                </div>
                            </div>

                            <div class="row buttons-cadastro">

                                <div class="col-md-12 d-flex justify-content-center">
                                    <button class="btn btn-success btn-lg me-3" type="submit">Gerar Relatório</button>

                                    <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='relatorios.php'">Cancelar</button>
                                </div>
                                <input type="hidden" name="nome_relatorio" id="nome_relatorio" value="venda_datas">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php if ($_POST['data_final'] != '' and $_POST['data_inicial'] != '') { ?>
    <main>
        <div class="container-fluid">
            <div class="col-md-12 listagem-produtos">
                <br>
                <div class="card">
                    <div class="card-header">
                        Relatório de vendas entre datas
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
                                    while ($dados = mysqli_fetch_array($result_produto_datas)) {
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
        </div>
    </main>

<?php } ?>