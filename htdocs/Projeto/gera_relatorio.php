<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$relatorio = $_POST['nome_relatorio'];

if ($relatorio == 'venda_func' and $id_func != '') {
    
}
if ($relatorio == 'venda_mes') {
    
}

if ($relatorio == 'venda_semana') {
    
}

if ($relatorio == 'venda_dia') {
    $hoje = date('y-m-d');
    $query_produto_hoje = "SELECT * FROM vendas WHERE data_venda LIKE '%$hoje%' ";
    $result_produto_hoje = mysqli_query($conect, $query_produto_hoje);
    print $query_produto_hoje;

}

if ($relatorio == 'venda_produto' and $produto != '') {
    
}

if ($relatorio == 'venda_datas' and $datas != '') {
    
}


?>

<main>
    <div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Gerar Relatório</h1>
            <br>
            <div class="card">
                <div class="card-header">
                    <?php if ($relatorio == 'venda_func') {
                        print "Vendas por Funcionários";
                    } ?>
                    <?php if ($relatorio == 'venda_mes') {
                        print "Vendas por Mês";
                    } ?>
                    <?php if ($relatorio == 'venda_semana') {
                        print "Vendas por Semana";
                    } ?>
                    <?php if ($relatorio == 'venda_dia') {
                        print "Vendas por Dia";
                    } ?>
                    <?php if ($relatorio == 'venda_produto') {
                        print "Vendas por Produto";
                    } ?>
                    <?php if ($relatorio == 'venda_datas') {
                        print "Vendas enter Datas";
                    } ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form>
                            <?php if ($relatorio == 'venda_func') { ?>
                                <label for="func" class="form-label">Funcionário</label>
                                <select class="form-select" id="func" name="func">
                                    <option value="">Selecione</option>
                                    <?php
                                    $query_funcionario = "SELECT nome,id FROM funcionarios";
                                    $result_funcionario = mysqli_query($conect, $query_funcionario);

                                    while ($dados_funcionario = mysqli_fetch_array($result_funcionario)) { ?>
                                        <option value="<?php print $dados_funcionario['id'] ?>"><?php print $dados_funcionario['nome'] ?></option>
                                </select>
                        <?php
                                    }
                                }
                        ?>



                        <?php if ($relatorio == 'venda_produto') { ?>
                            <label for="func" class="form-label">Produtos</label>
                            <select class="form-select" id="func" name="func">
                                <option value="">Selecione</option>
                                <?php
                                $query_produto = "SELECT nome,id FROM produtos";
                                $result_produto = mysqli_query($conect, $query_produto);

                                while ($dados_produto = mysqli_fetch_array($result_produto)) { ?>
                                    <option value="<?php print $dados_produto['id'] ?>"><?php print $dados_produto['nome'] ?></option>
                            </select>
                    <?php
                                }
                            }
                    ?>


                    <?php if ($relatorio == 'venda_datas') { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="efetivacao_func" class="form-label">Data Inicial</label>
                                <input type="date" class="form-control" id="efetivacao_func" name="efetivacao_func" max="<?php print date("Y-m-d") ?>" value="<?php if ($dados_func['data_admissao'] != "") print date("Y-m-d", strtotime($dados_func['data_admissao']));  ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="efetivacao_func" class="form-label">Data Final</label>
                                <input type="date" class="form-control" id="efetivacao_func" name="efetivacao_func" max="<?php print date("Y-m-d") ?>" value="<?php if ($dados_func['data_admissao'] != "") print date("Y-m-d", strtotime($dados_func['data_admissao']));  ?>">
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row buttons-cadastro">

                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Gerar Relatório</button>

                            <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='relatorios.php'">Cancelar</button>
                        </div>



                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>