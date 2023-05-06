<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
<div class="container-fluid">
    
<h1 class="mt-4">Cadastro de Produtos</h1>
                      <br>
                      
    <form name = "cadastro" id = "cadastro" >
    <div class=  "card">
        <div class = "card-header">
            Características
        </div>
    <div class="card-body">
    <div class="row"  style="padding: 10px;">
    
        <div class="col-md-4">
            <label for="nome_prod" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_prod" name = "nome_prod">
        </div>
        <div class="col-md-4">
            <label for="marca_prod" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca_prod" name = "marca_prod">
        </div>
        <div class="col-md-4">
            <label for="preco_prod" class="form-label">Preço Venda</label>
            <input type="text" class="form-control" id="preco_prod" name = "preco_prod">
        </div>


 
<div class="col-md-6">
            <label for="embalagem_prod" class="form-label">Embalagem</label>
            <input type="text" class="form-control"id="embalagem_prod" name="embalagem_prod">
        </div>
        <div class="col-md-6">
            <label for="codBarras_prod" class="form-label">Código de Barras</label>
            <input type="text" class="form-control"id="codBarras_prod" name="codBarras_prod">
</div>            
           
        
        
        <div class="col-md-6">
            <label for="estoque_prod" class="form-label">Estoque</label>
            <input type="text" class="form-control" id="estoque_prod" name="estoque_prod">
        </div>
        <div class="col-md-6">
            <label for="unidade_prod" class="form-label">Unidade</label>
            <select class="form-select" aria-label="Default select example" id="unidade_prod" name="unidade_prod">
                <option selected>Seleciona</options>    
                <option value="Un">Unidade</options>
                <option value="KG">Quilograma</options>
                <option              value="G">Grama</options>
            </select>
        </div>
        
       
        <p>&nbsp;</p>
    <div class="row buttons-cadastro">

            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>
        
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
	
		
    if (document.cadastro.nome_prod.value == "" || document.cadastro.nome_prod.value.length <= 3){
        document.cadastro.nome_prod.focus();
        Swal.fire("", "Favor verificar o campo Nome!", "warning");
        return (false);
    }

    if (document.cadastro.marca_prod.value == "") {
        document.cadastro.marca_prod.focus();
        Swal.fire("", "Favor inserir uma marca válida!", "warning");
        return (false);
    }

    if (document.cadastro.preco_prod.value < 0) {
        document.cadastro.preco_prod.focus();
        Swal.fire("", "Favor verificar o campo preço produto!", "warning");
        return (false);
    }

    if (document.cadastro.embalagem_prod.value == "") {
        document.cadastro.embalagem_prod.focus();
        Swal.fire("", "Favor verificar o campo embalagem!", "warning");
        return (false);
    }	

    if (document.cadastro.codBarras_prod.value <=12 || document.cadastro.codBarras_prod.value > 13 ) {
        document.cadastro.codBarras_prod.focus();
        Swal.fire("", "Favor verificar o campo código de barras!", "warning");
        return (false);
    }
    
    if (document.cadastro.estoque_prod.value < 0 || document.cadastro.estoque_prod.value.length == "") {
        document.cadastro.estoque_prod.focus();
        Swal.fire("", "Favor verificar o campo estoque!", "warning");
        return (false);
    }

    if (document.cadastro.unidade_prod.value == "Seleciona") {
        document.cadastro.unidade_prod.focus();
        Swal.fire("", "Favor escolher alguma das opções!", "warning");
        return (false);
    }
    
    else{
        Swal.fire("", "Deu bom", "");
    }
}
</script>