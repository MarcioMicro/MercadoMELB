<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

if ($_POST['id_func'] != "") {
    $query = "SELECT funcionarios.*, cidades.id AS id_cidades, cidades.estado FROM funcionarios INNER JOIN enderecos ON funcionarios.id_enderecos = enderecos.id  INNER JOIN cidades ON enderecos.id_cidades = cidades.id WHERE funcionarios.id = '" . $_POST['id_func'] . "'";
    $result = mysqli_query($conect, $query);
    $dados_func = mysqli_fetch_array($result);

    $nome = $dados_func['nome'];
    $cargo = $dados_func['cargo'];
    $departamento = $dados_func['departamento'];
    $salario = $dados_func['salario'];
    $data_adm = $dados_func['data_admissao'];
    $cpf = $dados_func['cpf'];
    $rg = $dados_func['rg'];
    $data_nasc = $dados_func['data_nascimento'];
    $sexo = $dados_func['sexo'];
    $telefone = $dados_func['telefone'];
    $email = $dados_func['email'];
    $endereco = $dados_func['id_enderecos'];
    $cidade = $dados_func['naturalidade'];
    $nivel_ensino = $dados_func['nivel_ensino'];
    $estado = $dados_func['estado'];



    $estado_novo = $_POST['estado_novo'];
    $cidade_nova = $_POST['cidade_nova'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_bairro = $_POST['endereco_bairro'];
    $endereco_CEP = $_POST['endereco_CEP'];
    $endereco_rua = $_POST['endereco_rua'];
} else {
    //naturalidade_func

    $nome = $_POST['nome_func'];
    $cpf = $_POST['cpf_func'];
    $rg = $_POST['rg_func'];
    $data_nasc = $_POST['nascimento_func'];
    $sexo = $_POST['sexo_func'];
    $estado = $_POST['cidade_estado'];
    $cidade = $_POST['naturalidade_func'];
    $endereco = $_POST['endereco_func'];
    $nivel_ensino = $_POST['nivel_ensino_func'];
    $telefone = $_POST['celular_func'];
    $email = $_POST['email_func'];
    $salario = $_POST['salario_func'];
    $data_adm = $_POST['efetivacao_func'];
    $departamento = $_POST['departamento_func'];
    $cargo = $_POST['cargo_func'];

    $estado_novo = $_POST['estado_novo'];
    $cidade_nova = $_POST['cidade_nova'];
    $endereco_numero = $_POST['endereco_numero'];
    $endereco_bairro = $_POST['endereco_bairro'];
    $endereco_CEP = $_POST['endereco_CEP'];
    $endereco_rua = $_POST['endereco_rua'];
}

if ($dados_func) {

    if ($dados_func['cargo'] != $_POST['cargo_func'] and $_POST['cargo_func'] != '') {
        $cargo = $_POST['cargo_func'];
    }
    if ($dados_func['departamento'] != $_POST['departamento_func'] and $_POST['departamento_func'] != '') {
        $departamento = $_POST['departamento_func'];
    }
    if ($dados_func['salario'] != $_POST['salario_func'] and $_POST['salario_func'] != '') {
        $salario = $_POST['salario_func'];
    }
    if ($dados_func['data_admissao'] != $_POST['efetivacao_func'] and $_POST['efetivacao_func'] != '') {
        $data_adm = $_POST['efetivacao_func'];
    }
    if ($dados_func['rg'] !=    $_POST['rg_func'] and $_POST['rg_func'] != '') {
        $rg = $_POST['rg_func'];
    }
    if ($dados_func['sexo'] !=  $_POST['sexo_func'] and $_POST['sexo_func'] != '') {
        $sexo = $_POST['sexo_func'];
    }
    if ($dados_func['nivel_ensino'] != $_POST['nivel_ensino_func'] and $_POST['nivel_ensino_func'] != '') {
        $nivel_ensino = $_POST['nivel_ensino_func'];
    }
    if ($_POST['nome_func'] != $dados_func['nome'] and $_POST['nome_func'] != '') {
        $nome = $_POST['nome'];
    }

    if ($dados_func['cpf'] != $_POST['cpf_func'] and $_POST['cpf_func'] != '') {
        $cpf = $_POST['cpf_func'];
    }
    if ($dados_func['telefone'] != $_POST['celular_func'] and $_POST['celular_func'] != '') {
        $celular = $_POST['celular_func'];
    }
    if ($dados_func['data_nascimento'] != $_POST['nascimento_func'] and $_POST['nascimento_func'] != '') {
        $nasc = $_POST['nascimento_func'];
    }
    if ($dados_func['email'] != $_POST['email_func'] and $_POST['email_func'] != '') {
        $email = $_POST['email_cli'];
    }
    if ($dados_func['id_cidades'] != $_POST['naturalidade_func'] and $_POST['naturalidade_func'] != '') {
        $cidade = $_POST['naturalidade_func'];
    }
    if ($dados_func['estado'] != $_POST['cidade_estado'] and $_POST['cidade_estado'] != '') {
        $estado = $_POST['cidade_estado'];
    }
    if ($dados_cli['id_enderecos'] != $_POST['endereco_func'] and $_POST['endereco_func'] != '') {
        $endereco = $_POST['endereco_func'];
    }
}
?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4"><?php if ($_POST['acao'] == "editar") print "Edi&ccedil;&atilde;o";
                            else print "Cadastro" ?> de Funcionário</h1>
        <br>

        <form name="cadastro" id="cadastro" method="post">
            <div class="card">
                <div class="card-header">
                    Dados Pessoais
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-4">
                            <label for="nome_func" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_func" name="nome_func" value="<?php print $nome ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cpf_func" class="form-label">CPF</label>
                            <input type="tel" class="form-control" id="cpf_func" name="cpf_func" value="<?php print $cpf ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="rg_func" class="form-label">RG</label>
                            <input type="tel" class="form-control" id="rg_func" name="rg_func" maxlength="12" value="<?php print $rg ?>">
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-3">
                            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento_func" name="nascimento_func" value="<?php if ($data_nasc != "") print date('Y-m-d', strtotime($data_nasc)); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="sexo_func" class="form-label">Sexo</label>
                            <select class="form-select" aria-label="Default select example" id="sexo_func" name="sexo_func">
                                <option value="">Selecione</options>
                                <option <?php if ($sexo == "F") print "selected"; ?> value="F">Feminino</options>
                                <option <?php if ($sexo == "M") print "selected"; ?> value="M">Masculino</options>
                            </select>
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
                    <div class="row" style="padding: 10px;">

                    <?php } ?>


                    <div class="col-md-3">
                        <label for="naturalidade_func" class="form-label">Cidade</label>
                        <select class="form-select" id="naturalidade_func" name="naturalidade_func" onchange="submit()">
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
                    <?php if ($estado != "X") print "</div><div class= 'row' style='padding:10px'>"; ?>
                    <?php if ($cidade == "X") { ?>

                        <div class="col-md-3">
                            <label for="cidade_nova" class="form-label">Qual?</label>
                            <input type="text" class="form-control" id="cidade_nova" name="cidade_nova" value="<?php print $cidade_nova ?>">
                        </div>


                    <?php } ?>


                    <div class="col-md-3">
                        <label for="endereco_func" class="form-label">Endere&ccedil;o</label>
                        <select class="form-select" id="endereco_func" name="endereco_func" onchange="submit()">
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
                    <div class="col-md-3">
                        <label for="nivel_ensino_func" class="form-label">Nível de Ensino</label>
                        <select class="form-select" name="nivel_ensino_func" id="nivel_ensino_func">
                            <option value="">Selecione</option>
                            <option <?php if ($nivel_ensino == 'Ensino Fundamental Incompleto') print "selected" ?> value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                            <option <?php if ($nivel_ensino == 'Ensino Fundamental Completo') print "selected" ?> value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                            <option <?php if ($nivel_ensino == 'Ensino Fundamental Andamento') print "selected" ?> value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                            <option <?php if ($nivel_ensino == 'Ensino Medio Incompleto') print "selected" ?> value="Ensino Medio Incompleto">Ensino médio incompleto</option>
                            <option <?php if ($nivel_ensino == 'Ensino Medio Completo') print "selected" ?> value="Ensino Medio Completo">Ensino médio completo</option>
                            <option <?php if ($nivel_ensino == 'Ensino Medio Andamento') print "selected" ?> value="Ensino Medio Andamento">Ensino médio em andamento</option>
                            <option <?php if ($nivel_ensino == 'Ensino Superior Incompleto') print "selected" ?> value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                            <option <?php if ($nivel_ensino == 'Ensino Superior Completo') print "selected" ?> value="Ensino Superior Completo">Ensino Superior Completo</option>
                            <option <?php if ($nivel_ensino == 'Ensino Superior Andamento') print "selected" ?> value="Ensino Superior Andamento">Ensino Superior Andamento</option>
                        </select>
                    </div>
                    <?php if ($estado == "X" and $cidade == "X") print "</div><div class ='row' style='padding: 10px'>"; ?>
                    <div class="col-md-3">
                        <label for="celular_func" class="form-label">Celular</label>
                        <input type="tel" class="form-control" id="celular_func" name="celular_func" value="<?php print $telefone ?>">
                    </div>
                    <?php if (($estado == "X" and $cidade != "X") or $estado != "X" and $cidade == "X" ) print "</div><div class ='row' style='padding: 10px'>"; ?>
                    <div class="col-md-3">
                        <label for="email_func" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_func" name="email_func" value="<?php print $email ?>">
                    </div>
                    </div>

                </div>





            </div>
            <p>&nbsp;</p>
            <div class="card">
                <div class="card-header">
                    Dados da Contratação
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">



                        <div class="col-md-4">
                            <label for="salario_func" class="form-label">Salário</label>
                            <input type="tel" class="form-control" id="salario_func" name="salario_func" value="<?php print $salario ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="efetivacao_func" class="form-label">Data de efetivação</label>
                            <input type="date" class="form-control" id="efetivacao_func" name="efetivacao_func" max="<?php print date("Y-m-d") ?>" value="<?php if ($data_adm != "") print date("Y-m-d", strtotime($data_adm));  ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="departamento_func" class="form-label">Departamento</label>
                            <input type="tel" class="form-control" id="departamento_func" name="departamento_func" value="<?php print $departamento ?>">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-4">
                            <label for="cargo_func" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="cargo_func" name="cargo_func" value="<?php print $cargo ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="senha_func" class="form-label">Senha</label>
                            <input type="text" class="form-control" id="senha_func" name="senha_func">
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row buttons-cadastro">

                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>

                            <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='funcionarios.php'">Cancelar</button>
                        </div>



                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php print $_POST['acao'] ?>" name="acao" id="acao">
            <input type="hidden" value="<?php print $_POST['id_func'] ?>" name="id_func" id="id_func">
        </form>
    </div>
</main>
</div>
</div>


<script>
    $(document).ready(function() {

        $('#celular_func').mask('(00) 00000-0000');
        $('#cpf_func').mask('000.000.000-00');

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

        if (document.cadastro.nome_func.value == "") {

            Swal.fire("", "Preencha corretamente o campo Nome", "warning");
            document.cadastro.nome_func.focus();
            return false;
        }
        // var regex_cpf = /^([0-9]){3}\.([0-9]){3}\.([0-9]){3}\-([0-9]){2}$/;

        if (document.cadastro.cpf_func.value == "" || !validarCPF(document.cadastro.cpf_func.value)) {
            Swal.fire("", "Preencha corretamente o campo CPF", "warning");
            document.cadastro.cpf_func.focus();
            return false;
        }
        if (document.cadastro.rg_func.value == "" /*|| document.cadastro.rg_func.value.length != 10 */ ) {
            document.cadastro.rg_func.focus();
            Swal.fire("", "Preencha corretamente o campo RG", "warning");
            return (false);
        }
        if (document.cadastro.nascimento_func.value == "") {
            document.cadastro.nascimento_func.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Nascimento", "warning");
            return (false);
        }
        if (document.cadastro.sexo_func.value == "") {
            document.cadastro.sexo_func.focus();
            Swal.fire("", "O campo Sexo n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.cidade_estado.value == "") {
            document.cadastro.cidade_estado.focus();
            Swal.fire("", "O campo Estado n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.cidade_estado.value == "X" && document.cadastro.estado_novo.value == "") {
            document.cadastro.estado_novo.focus();
            Swal.fire("", "O campo Estado n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.naturalidade_func.value == "") {
            document.cadastro.naturalidade_func.focus();
            Swal.fire("", "O campo Cidade n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.naturalidade_func.value == "X" && document.cadastro.cidade_nova.value == "") {
            document.cadastro.cidade_nova.focus();
            Swal.fire("", "O campo Cidade n&#227;o pode estar vazio", "warning");
            return (false);
        }


        if (document.cadastro.endereco_func.value == "") {
            document.cadastro.endereco_func.focus();
            Swal.fire("", "O campo Endere&#231;o n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_func.value == "X" && document.cadastro.endereco_rua.value == "") {
            document.cadastro.endereco_rua.focus();
            Swal.fire("", "O campo Rua n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_func.value == "X" && document.cadastro.endereco_numero.value == "") {
            document.cadastro.endereco_numero.focus();
            Swal.fire("", "O campo N&#250;mero n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_func.value == "X" && document.cadastro.endereco_bairro.value == "") {
            document.cadastro.endereco_bairro.focus();
            Swal.fire("", "O campo Bairro n&#227;o pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro.endereco_func.value == "X" && document.cadastro.endereco_CEP.value == "") {
            document.cadastro.endereco_CEP.focus();
            Swal.fire("", "O campo CEP n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.naturalidade_func.value == "") {
            document.cadastro.naturalidade_func.focus();
            Swal.fire("", "O campo Naturalidade n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.endereco_func.value == "") {
            document.cadastro.endereco_func.focus();
            Swal.fire("", "O campo Endere&#231;o n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.nivel_ensino_func.value == "") {
            Swal.fire("", "O campo N&#237;vel de Ensino n&#227;o pode estar vazio", "warning");
            document.cadastro.nivel_ensino_func.focus();
            return false;
        }

        const telefone = document.cadastro.celular_func.value;

        const numerosTelefone = telefone.replace(/\D/g, '');
        const todosIguais = /^(\d)\1+$/;
        if (document.cadastro.celular_func.value == "" || todosIguais.test(numerosTelefone)) {
            Swal.fire("", "Preencha corretamente o campo Fone", "warning");
            document.cadastro.celular_func.focus();
            return false;
        }

        const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
        const email = $('#email_func').val();
        if (document.cadastro.email_func.value == "" || !emailRegex.test(email)) {
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
            document.cadastro.email.focus();
            return false;
        }

        if ($('#salario_func').val() == "") {
            Swal.fire("", "Preencha corretamente o campo Sal&#225;rio", "warning");
            $('#salario_func').focus();
            return false;
        }

        if (document.cadastro.efetivacao_func.value == "") {
            document.cadastro.efetivacao_func.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Efetiva&#231;&#227;o", "warning");
            return (false);
        }

        if (document.cadastro.departamento_func.value == "") {
            document.cadastro.departamento_func.focus();
            Swal.fire("", "Preencha corretamente o campo Departamento", "warning");
            return (false);
        }

        if (document.cadastro.cargo_func.value == "") {
            document.cadastro.cargo_func.focus();
            Swal.fire("", "Preencha corretamente o campo Cargo", "warning");
            return (false);
        }

        if (document.cadastro.senha_func.value == "") {
            document.cadastro.senha_func.focus();
            Swal.fire("", "Preencha corretamente o campo Senha", "warning");
            return (false);
        }

        document.cadastro.action = "insere_funcionario.php";
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
