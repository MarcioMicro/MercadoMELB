<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">

<div class="container">
    <div class="row">
        <div class="col-md-12 listagem-produtos">
            <h2>Produtos em estoque</h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                            <td>Arroz</td>
                            <td>120</td>
                            <td>R$150,00</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                            <td>Feijão</td>
                            <td>10</td>
                            <td>R$140,00</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                            <td>Batata</td>
                            <td>900</td>
                            <td>R$190,00</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>


</div>