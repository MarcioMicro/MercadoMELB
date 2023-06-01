<?php 
include "includes/cabecalho.php";
include "includes/conect.php";
session_name('mercado');
session_start();

//print_r($_POST);

$nome = trim($_POST['nome_func']);
$cpf = trim($_POST['cpf_func']);
$rg = trim($_POST['rg_func']);
$nascimento = trim($_POST['nascimento_func']);
$sexo = trim($_POST['sexo_func']);
$endereco = trim($_POST['endereco_func']);
$nivel_ens = trim($_POST['nivel_ensino_func']);
$celular = trim($_POST['celular_func']);
$email = trim($_POST['email_func']);
$salario = trim($_POST['salario_func']);
$efetivacao = trim($_POST['efetivacao_func']);
$dep = trim($_POST['departamento_func']);
$cargo = trim($_POST['cargo_func']);
$senha = trim($_POST['senha_func']);

$id_cidades = trim($_POST['naturalidade_func']);
$estado = trim($_POST['cidade_estado']);

if ($estado == "X") {
    $estado = trim($_POST['estado_novo']);
}

if ($id_cidades == "X") {
    $cidade = trim($_POST['cidade_nova']);

    $query = "INSERT INTO cidades (id, cidade, estado) VALUES
    (
    '',
    '$cidade',
    '$estado'
    );";
    $result = mysqli_query($conect, $query);

    
 
}

if ($endereco == "X") {
    $endereco_cep = $_POST['endereco_CEP'];
    $endereco_bairro = $_POST['endereco_bairro'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_rua = $_POST['endereco_rua'];

    $query1 = "SELECT id FROM cidades WHERE cidade = '$cidade' AND estado = '$estado'";
    $result1= mysqli_query($conect, $query1);
    $dados1 = mysqli_fetch_array($result1);

    $id_cidades = $dados1['id'];    

    $query2 = "INSERT INTO enderecos (id, rua, numero, complemento, bairro, cep, id_cidades) VALUES
    (
    '',
    '$endereco_rua',
    '$endereco_numero', 
    '',
    '$endereco_bairro',
    '$endereco_cep',
    '$id_cidades'
    );";
    
    $result_2 = mysqli_query($conect, $query2);

    $query3 = "SELECT MAX(id) as id FROM enderecos";
    $result3 = mysqli_query($conect, $query3);
    $dados3 = mysqli_fetch_array($result3);

    $endereco = $dados3['id'];

   
}


$acao = trim($_POST['acao']);
$id_func = trim($_POST['id_func']);


$senha = password_hash($senha, PASSWORD_DEFAULT);

$query = "SELECT id FROM funcionarios WHERE cpf = '$cpf'";
$result = mysqli_query($conect, $query);
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0 and $acao != "editar") {
    $erro = "CPF já cadastrado no sistema!";

} else if ($acao == "") {
    $query_insert = "INSERT INTO funcionarios (id, nome, cargo, departamento, salario, data_admissao, cpf, rg, data_nascimento, sexo, telefone, nivel_ensino, email, senha, id_enderecos, naturalidade) VALUES
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
                    '$nivel_ens',
                    '$email',
                    '$senha',
                    '$endereco',
                    '$id_cidades'
                    );
    ";
  
    $result_insert = mysqli_query($conect, $query_insert);
    
    $query_select22 = "SELECT MAX(id) AS id_func FROM funcionarios WHERE cpf = '$cpf'";
    $result_select22 = mysqli_query($conect, $query_select22);
    $dados_select22 = mysqli_fetch_array($result_select22);


    $query_insert22 = "INSERT INTO niveis_acesso (id_func) VALUES ('" . $dados_select22['id_func'] . "')";
    mysqli_query($conect, $query_insert22);

} elseif ($acao == "editar") {
    $query_update = "UPDATE funcionarios SET nome = '$nome',
    cargo = '$cargo',
    departamento = '$dep',
    salario = '$salario',
    data_admissao = '$efetivacao',
    cpf = '$cpf',
    rg = '$rg',
    data_nascimento = '$nascimento',
    sexo = '$sexo', 
    telefone = '$celular',
    nivel_ensino = '$nivel_ens',
    email = '$email',
    senha = '$senha',
    id_enderecos = '$endereco',
    naturalidade = '$id_cidades' WHERE id = $id_func";


    $result = mysqli_query($conect, $query_update);
}

?>

<form action="funcionarios.php" method="post" name="volta" id ="volta">
    <?php if ($erro != "")  { ?>
        <input type="hidden" value="<?php $erro ?>" name="erro" id ="erro">
    <?php } ?>
</form>

<script>
    $(document).ready(function () {
        $('#volta').submit();
    });

</script>
