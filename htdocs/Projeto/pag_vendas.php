<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


$query_vendas = "SELECT * from vendas";
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
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php  
                        while($dados = mysqli_fetch_array($resultado_vendas)){
                   ?> 
                            <tr>
                            <th scope="row"><?php print $dados['id']; ?></th>
                            <td><?php print $dados['data']; ?></td>
                            <td><?php print $dados['valor_total']; ?></td>
                            <td><?php print $dados['id_funcionarios']; ?></td>
                            <td><?php print $dados['id_clientes']; ?></td>
                            <td>
                               <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff" title="Editar" onclick="editaProduto(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

                                <button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Editar" onclick="deletaProduto(<?php print $dados['id']; ?>)"><i class="fas fa-trash-can"></i></button>
                            </td>
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