<?php 
include "includes/cabecalho.php";
include "includes/conect.php";
session_name('mercado');
session_start();

print_r($_POST);

$nome = trim($_POST['nome_cli']);
$cpf = trim($_POST['cpf_cli']);
$nascimento = trim($_POST['nascimento_cli']);
$endereco = trim($_POST['endereco_cli']);
$celular = trim($_POST['celular_cli']);
$email = trim($_POST['email_cli']);
$estado = trim($_POST['cidade_estado']);
$cidade = trim($_POST['cidade_cli']);

if ($estado == "X") {
    $estado = trim($_POST['estado_novo']);
}

if ($cidade == "X") {
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
$id_cli = trim($_POST['id_cli']);

$query = "SELECT id FROM clientes WHERE cpf = '$cpf'";
$result = mysqli_query($conect, $query);
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0 and $acao != "editar") {
    $erro = "CPF já cadastrado no sistema!";

} else if ($acao == "") {
    $query_insert = "INSERT INTO clientes (id, nome, cpf, telefone, dataNasc, email, id_enderecos) VALUES
                    (
                    '',
                    '$nome',
                    '$cpf',
                    '$celular',
                    '$nascimento',
                    '$email',
                    '$endereco'
                    );
    ";
    
    $result_insert = mysqli_query($conect, $query_insert);
    
} elseif ($acao == "editar") {
    $query_update = "UPDATE clientes SET nome = '$nome',
    cpf = '$cpf',
    telefone = '$celular',
    salario = '$salario',
    dataNasc = '$nascimento',
    email = '$email',
    id_enderecos = '$endereco' WHERE id = $id_cli";

    $result = mysqli_query($conect, $query_update);
}

?>

<form action="clientes.php" method="post" name="volta" id ="volta">
    <?php if ($erro != "")  { ?>
        <input type="hidden" value="<?php $erro ?>" name="erro" id ="erro">
    <?php } ?>
</form>

<script>
    $(document).ready(function () {
        $('#volta').submit();
    });

</script>