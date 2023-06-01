<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

if ($_POST['id_cli'] != "") {
    $query = "SELECT clientes.*, cidades.id AS id_cidades, cidades.estado  FROM clientes INNER JOIN enderecos ON clientes.id_enderecos = enderecos.id  INNER JOIN cidades ON enderecos.id_cidades = cidades.id WHERE clientes.id = '" . $_POST['id_cli'] . "'";
    $result = mysqli_query($conect, $query);
    $dados_cli = mysqli_fetch_array($result);
    $nome = $dados_cli['nome'];
    $cpf = $dados_cli['cpf'];
    $celular = $dados_cli['telefone'];

    $nasc = $dados_cli['dataNasc'];

    $email = $dados_cli['email'];

    $cidade = $dados_cli['id_cidades'];
    $estado = $dados_cli['estado'];
    $endereco = $dados_cli['id_enderecos'];
    $estado_novo = $_POST['estado_novo'];
    $cidade_nova = $_POST['cidade_nova'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_bairro = $_POST['endereco_bairro'];
    $endereco_CEP = $_POST['endereco_CEP'];
    $endereco_rua = $_POST['endereco_rua'];
} else {


    $nome = $_POST['nome_cli'];
    $cpf = $_POST['cpf_cli'];
    $celular = $_POST['celular_cli'];
    $nasc = $_POST['nascimento_cli'];
    $email = $_POST['email_cli'];
    $cidade = $_POST['cidade_cli'];
    $estado = $_POST['cidade_estado'];
    $endereco = $_POST['endereco_cli'];
    $estado_novo = $_POST['estado_novo'];
    $cidade_nova = $_POST['cidade_nova'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_bairro = $_POST['endereco_bairro'];
    $endereco_CEP = $_POST['endereco_CEP'];
    $endereco_rua = $_POST['endereco_rua'];
}

if ($dados_cli) {
    
    if ($_POST['nome_cli'] != $dados_cli['nome'] and $_POST['nome_cli'] != '') {
        $nome = $_POST['nome_cli'];
        
    }

    if ($dados_cli['cpf'] != $_POST['cpf_cli'] and $_POST['cpf_cli'] != '') {
        $cpf = $_POST['cpf_cli'];
    }
    if ($dados_cli['telefone'] != $_POST['celular_cli'] and $_POST['celular_cli'] != '') {
        $celular = $_POST['celular_cli'];
    }
    if ($dados_cli['dataNasc'] != $_POST['nascimento_cli'] and $_POST['nascimento_cli'] != '') {
        $nasc = $_POST['nascimento_cli'];
    }
    if ($dados_cli['email'] != $_POST['email_cli'] and $_POST['email_cli'] != '') {
        $email = $_POST['email_cli'];
    }
    if ($dados_cli['id_cidades'] != $_POST['cidade_cli'] and $_POST['cidade_cli'] != '') {
        $cidade = $_POST['cidade_cli'];
    }
    if ($dados_cli['estado'] != $_POST['cidade_estado'] and $_POST['cidade_estado'] != '') {
        $estado = $_POST['cidade_estado'];
    }
    if ($dados_cli['id_enderecos'] != $_POST['endereco_cli'] and $_POST['endereco_cli'] != '') {
        $endereco = $_POST['endereco_cli'];
    }
}
?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4"><?php if ($_POST['acao'] != "editar") print "Cadastro";
                            else print "Edi&ccedil;&atilde;o"; ?> de Clientes</h1>
        <br>

        <form name="cadastro" id="cadastro" method="post">
            <div class="card">
                <div class="card-header">
                    Dados Pessoais
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-4">
                            <label for="nome_cli" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_cli" name="nome_cli" value="<?php print $nome ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cpf_cli" class="form-label">CPF</label>
                            <input type="tel" class="form-control" id="cpf_cli" name="cpf_cli" value="<?php print $cpf ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="celular_cli" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular_cli" name="celular_cli" value="<?php print $celular ?>">
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-3">
                            <label for="nascimento_cli" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento_cli" name="nascimento_cli" value="<?php if ($nasc != "") print date('Y-m-d', strtotime($nasc)); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="email_cli" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_cli" name="email_cli" value="<?php print $email ?>">
                        </div>


                        <div class="col-md-3">
                            <label for="cidade_estado" class="form-label">UF</label>
                            <select class="form-select" id="cidade_estado" name="cidade_estado" onchange="submit()">
                                <option value="">Selecione</option>
                                <?php
                                $query_cidade = "SELECT id, cidade, estado FROM cidades GROUP BY estado ORDER BY estado";
                                $result_cidade = mysqli_query($conect, $query_cidade);

                                while ($dados_cidade = mysqli_fetch_array($result_cidade)) { ?>
                                    <option <?php if ($estado == $dados_cidade['estado']) print "selected"; ?> value="<?php print $dados_cidade['estado'] ?>"><?php print $dados_cidade['estado'] ?></option>
                                <?php
                                }
                                ?>
                                <option <?php if ($estado == "X") print "selected" ?> value="X">Outra</option>
                            </select>
                        </div>

                        <?php if ($estado == "X") { ?>
                            <div class="col-md-3">
                                <label for="estado_novo" class="form-label">Qual?</label>
                                <input type="text" class="form-control" id="estado_novo" name="estado_novo" maxlength="2" value="<?php print $estado_novo ?>">
                            </div>
                    </div>
                    <div class="row" style="padding: 10px">
                    <?php } ?>


                    <div class="col-md-3">
                        <label for="cidade_cli" class="form-label">Cidade</label>
                        <select class="form-select" id="cidade_cli" name="cidade_cli" onchange="submit()">
                            <option value="">Selecione</option>
                            <?php
                            $query_cidade = "SELECT id, cidade, estado FROM cidades WHERE estado = '$estado' ORDER BY cidade";
                            $result_cidade = mysqli_query($conect, $query_cidade);

                            while ($dados_cidade = mysqli_fetch_array($result_cidade)) { ?>
                                <option <?php if ($cidade == $dados_cidade['id']) print "selected"; ?> value="<?php print $dados_cidade['id'] ?>"><?php print $dados_cidade['cidade'] ?></option>
                            <?php
                            }
                            ?>
                            <option <?php if ($cidade == "X") print "selected" ?> value="X">Outra</option>
                        </select>
                    </div>

                    <?php if ($cidade == "X") { ?>
                        <?php if ($estado != "X") print "</div><div class= 'row' style='padding:10px'>"; ?>
                        <div class="col-md-3">
                            <label for="cidade_nova" class="form-label">Qual?</label>
                            <input type="text" class="form-control" id="cidade_nova" name="cidade_nova" value="<?php print $cidade_nova ?>">
                        </div>


                    <?php } ?>

                    <?php if ($estado != "X" and $cidade != "X") print "</div><div class= 'row' style='padding:10px'>"; ?>
                    <div class="col-md-3">
                        <label for="endereco_cli" class="form-label">Endere&ccedil;o</label>
                        <select class="form-select" id="endereco_cli" name="endereco_cli" onchange="submit()">
                            <option value="">Selecione</option>
                            <?php
                            $query_endereco = "SELECT enderecos.id, rua, numero, bairro, cidades.cidade FROM enderecos INNER JOIN cidades ON enderecos.id_cidades = cidades.id WHERE cidades.id = '$cidade' ORDER BY cidades.cidade ASC";
                            $result_endereco = mysqli_query($conect, $query_endereco);

                            while ($dados_endereco = mysqli_fetch_array($result_endereco)) { ?>
                                <option <?php if ($endereco == $dados_endereco['id']) print "selected"; ?> value="<?php print $dados_endereco['id'] ?>"><?php print $dados_endereco['cidade'] . " - " . $dados_endereco['bairro'] . " - " . $dados_endereco['rua'] . " - " . $dados_endereco['numero'] ?></option>
                            <?php
                            }
                            ?>
                            <option <?php if ($endereco == "X") print "selected"; ?> value="X">Outro</option>
                        </select>
                    </div>
                    <?php if ($endereco == "X") { ?>

                        <div class="col-md-3">
                            <label for="endereco_rua" class="form-label">Rua</label>
                            <input type="text" class="form-control" id="endereco_rua" name="endereco_rua" value="<?php print $endereco_rua ?>">
                        </div>
                        <?php if ($estado == "X" and $cidade == "X") print "</div><div class= 'row' style='padding:10px'>"; ?>
                        <div class="col-md-3">
                            <label for="endereco_numero" class="form-label">N&uacute;mero</label>
                            <input type="tel" class="form-control" id="endereco_numero" name="endereco_numero" value="<?php print $endereco_numero ?>">
                        </div>
                        <?php if (($estado != "X" and $cidade == "X") or ($estado == "X" and $cidade != "X")) print "</div><div class= 'row' style='padding:10px'>"; ?>
                        <div class="col-md-3">
                            <label for="endereco_bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="endereco_bairro" name="endereco_bairro" value="<?php print $endereco_bairro ?>">
                        </div>
                        <?php if ($estado != "X" and $cidade != "X") print "</div><div class= 'row' style='padding:10px'>"; ?>
                        <div class="col-md-3">
                            <label for="endereco_CEP" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="endereco_CEP" name="endereco_CEP" value="<?php print $endereco_CEP ?>">
                        </div>

                    <?php } ?>

                    </div>


                    <div class="row buttons-cadastro">

                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>

                            <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='clientes.php'">Cancelar</button>
                        </div>



                    </div>
                </div>
            </div>
            <p>&nbsp;</p>

            <input type="hidden" value="<?php print $_POST['acao'] ?>" name="acao" id="acao">
            <input type="hidden" value="<?php print $_POST['id_cli'] ?>" name="id_cli" id="id_cli">
        </form>
    </div>
</main>
</div>
</div>


<script>
    $(document).ready(function() {

        $('#celular_cli').mask('(00) 00000-0000');
        $('#cpf_cli').mask('000.000.000-00');

        $('input[type=email]').on('focus', function() {
            const inputId = $(this).attr('id');
            const input = $('#' + inputId);
            input.on('input', function() {
                const value = input.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|"|'|!|\?|\*|\-|\_|\+|#|%|¨|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + ' contém caracteres inválidos!', "warning");
                    // Se o campo contém caracteres inválidos, limpe o campo
                    input.val('');
                }
            });
        });

        $('input[type=text]').on('focus', function() {
            const inputId = $(this).attr('id');
            const input = $('#' + inputId);
            input.on('input', function() {
                const value = input.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¨|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + ' contém caracteres inválidos!', "warning");
                    // Se o campo contém caracteres inválidos, limpe o campo
                    input.val('');
                }
            });
        });
        $('textarea').on('focus', function() {
            const textareaId = $(this).attr('id');
            const textarea = $('#' + textareaId);

            // Verifique se o valor da textarea contém os caracteres desejados
            textarea.on('input', function() {
                const value = textarea.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¨|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + textareaId.charAt(0).toUpperCase() + textareaId.slice(1) + ' contém caracteres inválidos!', "warning");
                    // Se a textarea contém caracteres inválidos, limpe a textarea
                    textarea.val('');
                }
            });


        });
    });






    function verifica() {

        if (document.cadastro.nome_cli.value == "") {

            Swal.fire("", "Preencha corretamente o campo Nome", "warning");
            document.cadastro.nome_cli.focus();
            return false;
        }
        // var regex_cpf = /^([0-9]){3}\.([0-9]){3}\.([0-9]){3}\-([0-9]){2}$/;

        if (document.cadastro.cpf_cli.value == "" || !validarCPF(document.cadastro.cpf_cli.value)) {
            Swal.fire("", "Preencha corretamente o campo CPF", "warning");
            document.cadastro.cpf_cli.focus();
            return false;
        }

        const telefone = document.cadastro.celular_cli.value;

        const numerosTelefone = telefone.replace(/\D/g, '');
        const todosIguais = /^(\d)\1+$/;
        if (document.cadastro.celular_cli.value == "" || todosIguais.test(numerosTelefone)) {
            Swal.fire("", "Preencha corretamente o campo Fone", "warning");
            document.cadastro.celular_cli.focus();
            return false;
        }

        if (document.cadastro.nascimento_cli.value == "") {
            document.cadastro.nascimento_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Nascimento", "warning");
            return (false);
        }
        const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
        const email = $('#email_cli').val();
        if (document.cadastro.email_cli.value == "" || !emailRegex.test(email)) {
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
            document.cadastro.email_cli.focus();
            return false;
        }

        if (document.cadastro.cidade_estado.value == "") {
            document.cadastro.cidade_estado.focus();
            Swal.fire("", "O campo Estado n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.cidade_estado.value == "X" && document.cadastro.estado_novo.value == "") {
            document.cadastro.cidade_estado.focus();
            Swal.fire("", "O campo Estado n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.cidade_cli.value == "") {
            document.cadastro.cidade_cli.focus();
            Swal.fire("", "O campo Cidade n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.cidade_cli.value == "X" && document.cadastro.cidade_nova.value == "") {
            document.cadastro.cidade_nova.focus();
            Swal.fire("", "O campo Cidade n&#227;o pode estar vazio", "warning");
            return (false);
        }


        if (document.cadastro.endereco_cli.value == "") {
            document.cadastro.endereco_cli.focus();
            Swal.fire("", "O campo Endere&#231;o n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_cli.value == "X" && document.cadastro.endereco_rua.value == "") {
            document.cadastro.endereco_rua.focus();
            Swal.fire("", "O campo Rua n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_cli.value == "X" && document.cadastro.endereco_numero.value == "") {
            document.cadastro.endereco_numero.focus();
            Swal.fire("", "O campo N&#250;mero n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_cli.value == "X" && document.cadastro.endereco_bairro.value == "") {
            document.cadastro.endereco_bairro.focus();
            Swal.fire("", "O campo Bairro n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_cli.value == "X" && document.cadastro.endereco_CEP.value == "") {
            document.cadastro.endereco_CEP.focus();
            Swal.fire("", "O campo CEP n&#227;o pode estar vazio", "warning");
            return (false);
        }


        document.cadastro.action = "insere_cliente.php";
        document.cadastro.method = "post";
        document.cadastro.submit();
    }



    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g, ''); // Remove todos os caracteres que n�o s�o d�gitos
        if (cpf.length != 11) return false; // Verifica se o CPF tem 11 d�gitos
        // Verifica se todos os d�gitos s�o iguais (n�o � um CPF v�lido)
        for (var i = 0; i < 10; i++) {
            if (cpf.charAt(i) != cpf.charAt(i + 1)) {
                break;
            }
            if (i == 9) return false;
        }
        var soma = 0;
        for (var i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        var resto = soma % 11;
        var digito1 = (resto < 2) ? 0 : 11 - resto;
        if (digito1 != parseInt(cpf.charAt(9))) return false;
        soma = 0;
        for (var i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        resto = soma % 11;
        var digito2 = (resto < 2) ? 0 : 11 - resto;
        if (digito2 != parseInt(cpf.charAt(10))) return false;
        return true; // CPF v�lido
    }
</script>

<?php if (($_POST['erro']) != "") { ?>
    <script>
        Swal.fire("", "<?php print $_POST['erro'] ?>", "warning");
    </script>
<?php } ?>
