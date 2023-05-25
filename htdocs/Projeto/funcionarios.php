<?php
session_name('mercado');
session_start();
include "includes/cabecalho.php";

$acao = $_POST['acao'];

if($acao = 'deletar'){

    $query_delete = "DELETE FROM funcionarios WHERE id = '" . $_POST["id_func"]. "'";
    
    $deletar = mysqli_query($conect, $query_delete);
    header("Location: funcionarios.php");
}

?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">Funcionários da Empresa</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class = "col-md-12 pb-5">
                        <button class="btn btn-primary" onclick="window.location.href='pag_cadastro_func.php'"><i class ="fa fa-plus"></i> Cadastrar Novo Funcionário</button>
                        </div>
                        <?php
                        include "includes/conect.php";
                        $query = "SELECT id,nome,cargo,departamento,salario,data_admissao,data_nascimento FROM funcionarios";

                        $result = mysqli_query($conect, $query);
                        $num_result = mysqli_num_rows($result);
                        ?>
                        <table class="table table table-bordered table-hover" id="dados">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Salário</th>
                                    <th scope="col">Data de Admissão</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($dados = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php print $dados['id']; ?></th>
                                            <td><?php print $dados['nome']; ?></td>
                                            <td><?php print $dados['cargo']; ?></td>
                                            <td><?php print $dados['departamento']; ?></td>
                                            <td><?php print $dados['salario']; ?></td>
                                            <td><?php print $dados['data_admissao']; ?></td>
                                            <td><?php print $dados['data_nascimento']; ?></td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff; margin-right: 10px;" title="Editar" onclick="editaFunc(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

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
    <input type="hidden" name="acao" id="acao" value="editar">
</form>

<form name="deleta_func">
    <input type="hidden" name="id_func" id="deleta_func">
    <input type="hidden" name="acao" id="acao" value="deletar">
</form>

<script>
    editaFunc = (id) => {
        document.edita_func.id_func.value = id;
        document.edita_func.action = "pag_cadastro_func.php";
        document.edita_func.method = "post";
        document.edita_func.submit();
    }

    deletaFunc = (id) => {
        Swal.fire({
            text: "Tem certeza de que deseja remover esse funcionário do sistema?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "Não",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                document.deleta_func.id_func.value = id;
                document.deleta_func.action = "funcionarios.php";
                document.deleta_func.method = "post";
                document.deleta_func.submit();
            }
        });
        return false;
    }

</script>