<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">

<div class="container">
    <h1 class="titulo-modulo">Cadastro de Funcionário</h1>
    <div class="row form-cadastro">
        <h2>Dados Pessoais</h2>
        <div class="col-md-3">
            <label for="nome_func" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">CPF</label>
            <input type="tel" class="form-control" id="cpf_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">RG</label>
            <input type="tel" class="form-control" id="rg_func">
        </div>
        <div class="col-md-3">
            <label for="cpf_func" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_func">
        </div>
       
        <div class="col-md-3">
            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="nascimento_func">
        </div>
        <div class="col-md-3">
            <label for="naturalidade_func" class="form-label">Naturalidade</label>
            <input type="text" class="form-control" id="naturalidade_func">
        </div>
        <div class="col-md-3">
            <label for="endereco_func" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco_func">
        </div>
         <div class="col-md-3">
         <label for="habilitacao_func" class="form-label">Possui carteira de habilitação</label>
             <select class="form-select" aria-label="Default select example">
                <option selected>Selecione</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="andamento">Em andamento</option>
            </select>
        </div>
        <div class="col-md-5">
        <label for="nivel_ensino_func" class="form-label">Nível de Ensino</label>
             <select class="form-select" aria-label="Default select example">
                <option selected>Selecione</option>
                <option value="sim">Ensino fundamental incompleto</option>
                <option value="nao">Ensino fundamental completo</option>
                <option value="nao">Ensino fundamental em andamento</option>
                <option value="sim">Ensino médio incompleto</option>
                <option value="nao">Ensino médio completo</option>
                <option value="nao">Ensino médio em andamento</option>
                <option value="sim">Graduação incompleto</option>
                <option value="nao">Graduação completo</option>
                <option value="nao">Graduação em andamento</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="celular_func" class="form-label">Celular</label>
            <input type="tel" class="form-control" id="celular_func">
        </div>
        <div class="col-md-4">
            <label for="telefone_func" class="form-label">Telefone secundário</label>
            <input type="tel" class="form-control" id="telefone_func">
        </div>
        </div>

        <div class="row form-cadastro">

        <h2>Dados da Contratação</h2>

        <div class="col-md-4">
            <label for="salario_func" class="form-label">Salário</label>
            <input type="tel" class="form-control" id="salario_func">
        </div>
     
        <div class="col-md-4">
            <label for="efetivacao_func" class="form-label">Data de efetivação</label>
            <input type="date" class="form-control" id="efetivacao_func">
        </div>
        <div class="col-md-4">
            <label for="jornada_func" class="form-label">Jornada de trabalho</label>
            <input type="tel" class="form-control" id="jornada_func">
        </div>
        <div class="col-md-6">
            <label for="cargo_func" class="form-label">Função</label>
            <input type="text" class="form-control" id="cargo_func">
        </div>
        <div class="col-md-12">
                <label for="obs_func" class="form-label">Observações</label>
                <textarea class="form-control" id="obs_func" rows="3"></textarea>
        </div>

        </div>
    <div class="row buttons-cadastro">

        <div class="col-md-4"></div>

            <div class="col-md-2">
                <button class="btn btn-success btn-lg">Cadastrar</button>
            </div>

            <div class="col-md-2">
                <button class="btn btn-danger btn-lg">Cancelar</button>
            </div>

        <div class="col-md-4"></div>

        </div>
</div>