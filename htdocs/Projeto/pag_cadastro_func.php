<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
<div class="container-fluid">
    
<h1 class="mt-4">Cadastro de Funcionário</h1>
                      <br>
                      
    <form name = "cadastro" id = "cadastro" onsubmit="verifica()">
    <div class=  "card">
        <div class = "card-header">
            Dados Pessoais
        </div>
    <div class="card-body">
    <div class="row"  style="padding: 10px;">
    
        <div class="col-md-3">
            <label for="nome_func" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_func" name = "nome_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">CPF</label>
            <input type="tel" class="form-control" id="cpf_func" name = "cpf_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">RG</label>
            <input type="tel" class="form-control" id="rg_func" name = "rg_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_func" name = "email_func">
        </div>
</div>
<div class = "row"  style="padding: 10px;">
        <div class="col-md-3">
            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="nascimento_func" name="nascimento_func">
        </div>
        <div class="col-md-3">
            <label for="naturalidade_func" class="form-label">Naturalidade</label>
            <input type="text" class="form-control" id="naturalidade_func" name="naturalidade_func">
        </div>
        <div class="col-md-3">
            <label for="endereco_func" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco_func" name = "endereco_func">
        </div>
         <div class="col-md-3">
         <label for="habilitacao_func" class="form-label">Possui carteira de habilitação</label>
             <select class="form-select" aria-label="Default select example" name = "habilitacao_func" id="habilitacao_func">
                <option selected>Selecione</option>
                <option value="nao">Não</option>
                <option value="A">A</option>
                <option value = "B">B</option>
                <option value = "AB">AB</option>
                <option value = "C">C</option>
                <option value = "D">D</option>
                <option value = "E">E</option>
            </select>
        </div>
</div>
<div class=  "row"  style="padding: 10px;">
        <div class="col-md-5">
        <label for="nivel_ensino_func" class="form-label">Nível de Ensino</label>
             <select class="form-select" aria-label="Default select example" name = "nivel_ensino_func" id = "nivel_ensino_func">
                <option selected>Selecione</option>
                <option value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                <option value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                <option value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                <option value="Ensino Medio Incompleto">Ensino médio incompleto</option>
                <option value="Ensino Medio Completo">Ensino médio completo</option>
                <option value="Ensino Medio Andamento">Ensino médio em andamento</option>
                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                <option value="Ensino Superior Andamento">Ensino Superior Andamento</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="celular_func" class="form-label">Celular</label>
            <input type="tel" class="form-control" id="celular_func" name = "celular_func">
        </div>
        <div class="col-md-4">
            <label for="telefone_func" class="form-label">Telefone secundário</label>
            <input type="tel" class="form-control" id="telefone_func" name = "telefone_func">
        </div>
        </div>
</div>
</div>
<p>&nbsp;</p>
<div class= "card">
    <div class = "card-header">
        Dados da Contratação
    </div>
    <div class= "card-body">
        <div class="row"  style="padding: 10px;">

      

        <div class="col-md-4">
            <label for="salario_func" class="form-label">Salário</label>
            <input type="tel" class="form-control" id="salario_func" name = "salario_func">
        </div>
     
        <div class="col-md-4">
            <label for="efetivacao_func" class="form-label">Data de efetivação</label>
            <input type="date" class="form-control" id="efetivacao_func" name = "efetivacao_func">
        </div>
        <div class="col-md-4">
            <label for="jornada_func" class="form-label">Jornada de trabalho</label>
            <input type="tel" class="form-control" id="jornada_func" name = "jornada_func">
        </div>
</div>
<div class = "row"  style="padding: 10px;">
        <div class="col-md-4">
            <label for="cargo_func" class="form-label">Função</label>
            <input type="text" class="form-control" id="cargo_func" name = "cargo_func">
        </div>
</div>
<div class = "row" style="padding: 10px;">
        <div class="col-md-12">
                <label for="obs_func" class="form-label">Observações</label>
                <textarea class="form-control" id="obs_func" rows="3" name = "obs_func"></textarea>
        </div>

        </div>
        <p>&nbsp;</p>
    <div class="row buttons-cadastro">

            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-success btn-lg me-3" >Cadastrar</button>
            
                <button class="btn btn-danger btn-lg">Cancelar</button>
            </div>

  

        </div>
</div>
</div>
</form>
</div>
</main>
</div>
</div>

<script>
    verifica = () => {
        if ("nada") {

        }
    }
</script>