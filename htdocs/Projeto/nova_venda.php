<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$query = "SELECT id,nome,marca,preco_venda,embalagem,unidade,cod_barras FROM produtos";

$sql_query_produtos =mysqli_query($conect,$query);
$num_result=mysqli_num_rows($sql_query_produtos);
?>

<main>
<div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
        <h1 class="mt-4">Nova Venda</h1>
                      <br>
                      <div class="card">
                        <div class="card-body">
                        <div class="row">
                <table class="table table table-bordered table-hover" id="dados">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Pre&ccedil;o de Venda</th>
                        <th scope="col">Código de Barras</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Adicionar ao Carrinho</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($dados = mysqli_fetch_array($sql_query_produtos)){
                     ?> 
                            <tr>
                            <th scope="row"><?php print $dados['id']; ?></th>
                            <td><?php print $dados['nome']; ?></td>
                            <td><?php print $dados['marca']; ?></td>
                            <td><?php print $dados['preco_venda']; ?></td>
                            <td><?php print $dados['cod_barras']; ?></td>
                            <td>
                               <input type="number" class="form-control" style="width:20%; margin:0px; display:flex; appearance:auto;"name="quantidade_produto" id="quantidade_produto">
                            </td>
                            <td>
                            <button type="button" class="btn btn-success btn-sm btn-circle" style="color: #fff" title="Adicionar ao Carrinho" onclick="adicionarCarrinho(<?php print $dados['id']; ?>)"><i class="fa-solid fa-basket-shopping"></i></button>
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