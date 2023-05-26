<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$func = $_POST['id_func'];


$query_func = "SELECT
                funcionarios.id, 
                funcionarios.nome, 
                funcionarios.cargo, 
                niveis_acesso.acesso_estoque,
                niveis_acesso.acesso_produtos,
                niveis_acesso.acesso_funcionarios,
                niveis_acesso.acesso_vendas
                FROM 
                `niveis_acesso` 
                INNER JOIN 
                `funcionarios` 
                ON 
                niveis_acesso.id_func = funcionarios.id
                WHERE
                funcionarios.id = $func";   

$resultado_func = mysqli_query($conect, $query_func);

?>
<main>
<div class="container-fluid">

<h1 class="mt-4">Permissões por Funcionário</h1>
                     
                      
    <form name = "edita_permissao" id = "edita_permissao" >
    <div class=  "card">
    <div class="card-body">
    <div class="row"  style="padding: 10px;">
    <?php while($dados = mysqli_fetch_array($resultado_func)){?>
        <div class="col-md-4">
            <h3>Permissões de <?php print $dados['nome'] ?></h3>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="acesso_estoque" class="form-label">Acesso ao Estoque</label>
                <select class="form-select" aria-label="Default select example" id="acesso_estoque" name="acesso_estoque">
                    <option selected><?php if ($dados['acesso_estoque'] == 's') print "Sim"; else print "Não";?></options>    
                    <option value="s">Sim</options>
                    <option value="n">Não</options>
                </select>
            </div>

            <div class="col-md-3">
                <label for="acesso_produtos" class="form-label">Acesso aos Produtos</label>
                <select class="form-select" aria-label="Default select example" id="acesso_produtos" name="acesso_produtos">
                    <option selected><?php if ($dados['acesso_produtos'] == 's') print "Sim"; else print "Não";?></options>    
                    <option value="s">Sim</options>
                    <option value="n">Não</options>
                </select>
            </div>

            <div class="col-md-3">
                <label for="acesso_funcionarios" class="form-label">Acesso aos Funcionários</label>
                <select class="form-select" aria-label="Default select example" id="acesso_funcionarios" name="acesso_funcionarios">
                    <option selected><?php if ($dados['acesso_funcionarios'] == 's') print "Sim"; else print "Não";?></options>    
                    <option value="s">Sim</options>
                    <option value="n">Não</options>
                </select>
                <input type="hidden" name="id_funcionario" id="nome_funcionario" value="<?php print $func ?>">
            </div>

            <div class="col-md-3">
                <label for="acesso_vendas" class="form-label">Acesso as Vendas</label>
                <select class="form-select" aria-label="Default select example" id="acesso_vendas" name="acesso_vendas">
                    <option selected><?php if ($dados['acesso_vendas'] == 's') print "Sim"; else print "Não";?></options>    
                    <option value="s">Sim</options>
                    <option value="n">Não</options>
                </select>
            </div>
        </div>
        
       
        <p>&nbsp;</p>
    <div class="row buttons-cadastro">

            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-success btn-lg me-3" type="button" onclick="atualiza()">Atualizar</button>
        
                <button class="btn btn-danger btn-lg" type="button" onclick="redirecionar()">Cancelar</button>
            </div>

  

        </div>
<?php } ?>
</div>
</div>
</form>
</div>
</main>
</div>
</div>

<script>

    function atualiza(){
        document.edita_permissao.action = "insere_nivel_acesso.php";
        document.edita_permissao.method = "post";
        document.edita_permissao.submit();
    }

    function redirecionar() {
          window.location.replace("pag_niveis_acesso_listar.php");
       }

</script>