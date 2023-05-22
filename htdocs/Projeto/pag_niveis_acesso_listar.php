<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$query = "SELECT
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
                niveis_acesso.id_func = funcionarios.id";

$resultados = mysqli_query($conect, $query);
$linhas = mysqli_num_rows($resultados);

$acao = $_POST['acao'];

if($acao = 'deletar'){

    $query_delete = "DELETE FROM `niveis_acesso` WHERE id_func = '$_POST[id_func]'";
    
    $deletar = mysqli_query($conect, $query_delete);
    header("location:pag_niveis_acesso_listar.php");
}

?>


<main>
    <div class="container-fluid">

        <div class="col-md-12">
            <h1 class="mt-4">Níveis de Acesso</h1>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table table table-bordered table-hover" id="dados">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Acesso Estoque</th>
                                    <th scope="col">Acesso Produtos</th>
                                    <th scope="col">Acesso Funcionários</th>
                                    <th scope="col">Acesso Vendas</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($dados = mysqli_fetch_array($resultados)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php print $dados['id']; ?></th>
                                        <td><?php print $dados['nome']; ?></td>
                                        <td><?php print $dados['cargo']; ?></td>
                                        <td><?php if ($dados['acesso_estoque'] == 's') print "Sim";
                                            else print "Não"  ?></td>
                                        <td><?php if ($dados['acesso_produtos'] == 's') print "Sim";
                                            else print "Não" ?></td>
                                        <td><?php if ($dados['acesso_funcionarios'] == 's') print "Sim";
                                            else print "Não" ?></td>
                                        <td><?php if ($dados['acesso_vendas'] == 's') print "Sim";
                                            else print "Não" ?></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff; margin-right: 10px;" title="Editar" onclick="editaAcesso(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Excluir" onclick="deletaFunc(<?php print $dados['id']; ?>)"><i class="fas fa-trash-can"></i></button>
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
</div>
</div>

<form name="edita_func">
    <input type="hidden" name="id_func" id="id_func">
</form>

<form name="deleta_func">
    <input type="hidden" name="id_func" id="deleta_func">
    <input type="hidden" name="acao" id="acao" value="deletar">
</form>



<script>
    editaAcesso = (id) => {
        document.edita_func.id_func.value = id;
        document.edita_func.action = "pag_niveis_acesso_editar.php";
        document.edita_func.method = "post";
        document.edita_func.submit();
    }




    deletaFunc = (id) => {
        Swal.fire({
            text: "Tem certeza de que deseja retirar TODAS as permissões do funcionário ?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "Não",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                document.deleta_func.id_func.value = id;
                document.deleta_func.action = "pag_niveis_acesso_listar.php";
                document.deleta_func.method = "post";
                document.deleta_func.submit();
            }
        });
        return false;
    }

</script>