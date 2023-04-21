<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$query = "SELECT id,nome,marca,preco_venda,embalagem,estoque,unidade FROM produtos";

$sql_query_produtos =mysqli_query($conect,$query);
$num_result=mysqli_num_rows($sql_query_produtos);

?>

<div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
        <h1 class="mt-4">Produtos em Estoque</h1>
                      <br>
                      <div class="card">
                        <div class="card-body">
                        <div class="row">
                <table class="table table table-bordered table-hover" id="produtos">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Preço de Venda</th>
                        <th scope="col">Quantidade em Estoque</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Embalagem</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($num_result == 0){ ?>
                      
                        <tr>
                            <td colspan="7">Não existem produtos cadastrados</td>
                        </tr>
                  <?php  
                    } else{ 
                        while($dados = mysqli_fetch_array($sql_query_produtos)){
                   ?> 
                            <tr>
                            <th scope="row"><?php print $dados['id']; ?></th>
                            <td><?php print $dados['nome']; ?></td>
                            <td><?php print $dados['marca']; ?></td>
                            <td><?php print $dados['preco_venda']; ?></td>
                            <td><?php print $dados['embalagem']; ?></td>
                            <td><?php print $dados['estoque']; ?></td>
                            <td><?php print $dados['unidade']; ?></td>
                            </tr>
                         <?php
                                }       
                             }
                            ?>  
                    </tbody>
                </table>
        </div>
        </div>
        </div>
    </div>


</div>

<script>
$(document).ready(function () {
    $('#produtos').DataTable();
});
</script>