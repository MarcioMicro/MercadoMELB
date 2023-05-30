<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


$query_vendas = "SELECT
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
";
$resultado_vendas = mysqli_query($conect, $query_vendas);
?>



<main>
<div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
        <h1 class="mt-4">Vendas</h1>
                      <br>
                      <div class="card">
                        <div class="card-body">
                        <div class = "col-md-12 pb-5">
                        <button class="btn btn-primary" onclick="window.location.href='nova_venda.php'"><i class ="fa fa-plus"></i> Nova Venda</button>
                        </div>
                        <div class="row">
                <table class="table table table-bordered table-hover" id="dados">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor da Venda</th>
                        <th scope="col">Funcionário</th>
                        <th scope="col">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php  
                        while($dados = mysqli_fetch_array($resultado_vendas)){
                   ?> 
                            <tr>
                            <th scope="row"><?php print $dados['id']; ?></th>
                            <td><?php print date("d/m/Y", strtotime($dados['data_venda'])); ?></td>
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