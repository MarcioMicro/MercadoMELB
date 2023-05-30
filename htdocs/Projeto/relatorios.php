<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";



?>
<style>

    .link{
        cursor: pointer;
    }


</style>


<main>
    <div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Relatórios</h1>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <ul class="list-group list-group-flush list-group-numbered">
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_func')">Relatórios de vendas por funcionários</a></li>
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_mes')">Relatórios de vendas mensais</a></li>
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_dia')">Relatórios de vendas diarias</a></li>
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_semana')">Relatórios de vendas semanais</a></li>
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_produto')">Relatórios de vendas por produto</a></li>
                            <li class="list-group-item"><a class="link" onclick="enviaRelatorio('venda_datas')">Relatórios de vendas entre datas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

<form name="form_relatorio">
    <input type="hidden" name="nome_relatorio" id="nome_relatorio">
</form>





</main>


<script>
        enviaRelatorio = (nome_relatorio) => {
        document.form_relatorio.nome_relatorio.value = nome_relatorio;
        document.form_relatorio.action = "gera_relatorio.php";
        document.form_relatorio.method = "get";
        document.form_relatorio.submit();
    }






</script>
