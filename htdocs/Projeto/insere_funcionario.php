<?php 
include "includes/cabecalho.php";
include "includes/conect.php";
session_name('mercado');
session_start();

print_r($_POST);

$nome = trim($_POST['nome_func']);
$cpf = trim($_POST['cpf_func']);
$rg = trim($_POST['rg_func']);
$nascimento = trim($_POST['nascimento_func']);
$sexo = trim($_POST['sexo_func']);
$naturalidade = trim($_POST['naturalidade_func']);
$endereco = trim($_POST['endereco_func']);
$nivel_ens = trim($_POST['nivel_ensino_func']);
$celular = trim($_POST['celular_func']);
$email = trim($_POST['email_func']);
$salario = trim($_POST['salario_func']);
$efetivacao = trim($_POST['efetivacao_func']);
$dep = trim($_POST['departamento_func']);
$cargo = trim($_POST['cargo_func']);
$senha = trim($_POST['senha_func']);


$senha = password_hash($senha, PASSWORD_DEFAULT);

$query = "SELECT id FROM funcionarios WHERE cpf = '$cpf'";
$result = mysqli_query($conect, $query);
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
    $erro = "CPF já cadastrado no sistema!";

} else {
    $query_insert = "INSERT INTO funcionarios (id, nome, cargo, departamento, salario, data_admissao, cpf, rg, data_nascimento, sexo, telefone, email, senha, id_enderecos, naturalidade) VALUES
                    (
                    '',
                    '$nome',
                    '$cargo',
                    '$dep',
                    '$salario',
                    '$efetivacao',
                    '$cpf',
                    '$rg',
                    '$nascimento',
                    '$sexo',
                    '$celular',
                    '$email',
                    '$senha',
                    '$endereco',
                    '$naturalidade'
                    );
    ";
    
    $result_insert = mysqli_query($conect, $query_insert);
    
}


?>

<form action="pag_cadastro_func.php" method="post" name="volta" id ="volta">
    <?php if ($erro != "")  { ?>
        <input type="hidden" value="<?php $erro ?>" name="erro" id ="erro">
    <?php } ?>
</form>

<script>
    $(document).ready(function () {
        $('#volta').submit();
    });

</script>