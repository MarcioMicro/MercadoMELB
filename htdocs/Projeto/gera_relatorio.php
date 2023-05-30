<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$relatorio = $_GET['nome_relatorio'];
$id_func = $_POST['id_func'];
$id_produto = $_POST['id_produto'];
$acao = $_POST['acao'];

if(isset($_POST['data_inicial'])){
    $data_inicial = $_POST['data_inicial'] . " 00:00:00";
};

if(isset($_POST['data_final'])){
    $data_final = $_POST['data_final'] . " 00:00:00";
};



if ($id_func != '') {
    $relatorio_nome = "Relatório de vendas por funcionário";
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
    $result_vendas_func = mysqli_query($conect,$query_vendas_func);                           


}
if ($relatorio == 'venda_mes') {
    $relatorio_nome = "Relatório de vendas por mês";
    $hoje = date('Y-m-d H:i:s');
    $mes = date('Y-m-d H:i:s', strtotime('-30 days', strtotime($hoje)));
    $query_produto_mes = "SELECT 
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
                            BETWEEN '$mes' AND '$hoje'";

    $result_produto_mes = mysqli_query($conect, $query_produto_mes);
}

if ($relatorio == 'venda_semana') {
    $relatorio_nome = "Relatório de vendas por semana";
    $hoje = date('Y-m-d H:i:s');
    $semana = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($hoje)));
    $query_produto_semana = "SELECT 
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
                            BETWEEN '$semana' AND '$hoje'";

    $result_produto_semana = mysqli_query($conect, $query_produto_semana);
}

if ($relatorio == 'venda_dia') {
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
    $result_produto_hoje = mysqli_query($conect, $query_produto_hoje);
}

if ($id_produto != '') {
    $relatorio_nome = "Relatório de vendas por produto";
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
    $result_vendas_produto = mysqli_query($conect,$query_vendas_produto);  

}

if ($data_inicial != '' and $data_final != '') {
    $relatorio_nome = "Relatório de vendas entre datas";
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
    $result_produto_datas = mysqli_query($conect,$query_produto_datas);
}


?>

<?php if ($relatorio == 'venda_dia' or $relatorio == 'venda_mes' or $relatorio == 'venda_semana') {} 



else if ($relatorio == 'venda_datas' or $relatorio == 'venda_produto' or $relatorio == 'venda_func') { ?>
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
                            <form id="form_relatorio" name="form_relatorio" method="post" action="gera_relatorio.php">
                                <?php if ($relatorio == 'venda_func') { ?>
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
                                    }
                                    ?>
                                    </select>


                                    <?php if ($relatorio == 'venda_produto') { ?>
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
                                        }
                                ?>
                                </select>

                                <?php if ($relatorio == 'venda_datas') { ?>
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
                                <?php
                                }
                                ?>

                                <input type="hidden" name="acao" id="acao" value="resultado">

                                <div class="row buttons-cadastro">

                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button class="btn btn-success btn-lg me-3" type="submit">Gerar Relatório</button>

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
<?php } else {
} ?>


<?php if($acao == 'resultado'){?>
<main>
    <div class="container-fluid">
        <br>
        <div class="col-md-12 listagem-produtos">
            <div class="card">
                <div class="card-header">
                    <?php print $relatorio_nome;?>
                </div>
                <div class="card-body">
                    <?php if ($result_vendas_func != '') { ?>
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
                    <?php }else if ($result_vendas_produto != '') { ?>
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
                    <?php }else if ($result_produto_datas != '') { ?>
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
                    <?php } ?>            

                </div>
            </div>
        </div>
    </div>
</main>
<?php }?>





<main>
    <div class="container-fluid">
        <br>
        <div class="col-md-12 listagem-produtos">
            <div class="card">
                <div class="card-header">
                    <?php print $relatorio_nome;?>
                </div>
                <div class="card-body">
<?php if ($result_produto_hoje != '') { ?>
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


                    <?php   } else if ($result_produto_semana != '') { ?>
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
                                while ($dados = mysqli_fetch_array($result_produto_semana)) {
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
                    <?php } else if ($result_produto_mes != '') { ?>
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
                                while ($dados = mysqli_fetch_array($result_produto_mes)) {
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
                    <?php } ?>
                    </div>
            </div>
        </div>
    </div>
</main>
