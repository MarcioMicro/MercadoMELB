<?php

session_name('mercado');
session_start();

include "includes/conect.php";

$id_func = $_POST['id_func'];
if ($id_func != '') {
    $query_vendas_func = "SELECT 
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
                               id_funcionarios = $id_func";
    $result_vendas_func = mysqli_query($conect, $query_vendas_func);
}
?>

<main>
    <div class="container-fluid">
        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Gerar Relatório</h1>
            <br>
            <div class="card">
                <div class="card-header">
                    Relatório de vendas por funcionários.
                </div>
                <div class="card-body">
                    <div class="row">
                        <form id="form_relatorio" name="form_relatorio" method="post" action="#">

                            <label for="func" class="form-label">Funcionário</label>
                            <select class="form-select" id="id_func" name="id_func">
                                <option value="">Selecione</option>
                                <?php
                                $query_funcionario = "SELECT nome,id FROM funcionarios";
                                $result_funcionario = mysqli_query($conect, $query_funcionario);

                                while ($dados_funcionario = mysqli_fetch_array($result_funcionario)) { ?>
                                    <option value="<?php print $dados_funcionario['id'] ?>"><?php print $dados_funcionario['nome'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                                <div class="row buttons-cadastro">

                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button class="btn btn-success btn-lg me-3" type="submit">Gerar Relatório</button>

                                        <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='relatorios.php'">Cancelar</button>
                                    </div>
                                    <input type="hidden" name="nome_relatorio" id="nome_relatorio" value="venda_func">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php if($id_func != ''){ ?>
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
                                        <th scope="col">Id</th>
                                        <th scope="col">Data da Venda</th>
                                        <th scope="col">Valor da Venda</th>
                                        <th scope="col">Funcionário</th>
                                        <th scope="col">Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dados = mysqli_fetch_array($result_vendas_func)) {
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