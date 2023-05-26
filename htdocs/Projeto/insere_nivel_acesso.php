<?php 
session_name('mercado');
session_start();
include "includes/cabecalho.php";
include "includes/conect.php";

$acesso_estoque = trim($_POST['acesso_estoque']);
$acesso_clientes = trim($_POST['acesso_clientes']);
$acesso_funcionarios = trim($_POST['acesso_funcionarios']);
$acesso_vendas = trim($_POST['acesso_vendas']);
$id_func = trim($_POST['id_funcionario']);

    $query_atualiza = "update niveis_acesso SET acesso_estoque = '$acesso_estoque',acesso_clientes = '$acesso_clientes',
                        acesso_funcionarios = '$acesso_funcionarios',acesso_vendas = '$acesso_vendas' 
                        WHERE id_func = $id_func";
        

    $result_insert = mysqli_query($conect, $query_atualiza);

?>


<form action="pag_niveis_acesso_listar.php" method="post" name="volta" id ="volta">
    <?php if ($erro != "")  { ?>
        <input type="hidden" value="<?php $erro ?>" name="erro" id ="erro">
    <?php } ?>
</form>

<script>
    $(document).ready(function () {
        Swal.fire("", "Permissões atualizadas com sucesso", "success");
        setTimeout(function(){$('#volta').submit();}, 1500);        
  
    });

</script>