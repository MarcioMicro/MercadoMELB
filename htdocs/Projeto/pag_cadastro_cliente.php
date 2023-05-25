<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

if ($_POST['id_cli'] != "") {
    $query = "SELECT * FROM clientes WHERE id = '" . $_POST['id_cli']. "'";
    $result = mysqli_query($conect, $query);
    $dados_cli = mysqli_fetch_array($result);
}

?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Cadastro de Clientes</h1>
        <br>

        <form name="cadastro" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Dados Pessoais
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-4">
                            <label for="nome_cli" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_cli" name="nome_cli" value="<?php print $dados_cli['nome'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cpf_cli" class="form-label">CPF</label>
                            <input type="tel" class="form-control" id="cpf_cli" name="cpf_cli" value="<?php print $dados_cli['cpf'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="rg_cli" class="form-label">RG</label>
                            <input type="tel" class="form-control" id="rg_cli" name="rg_cli" maxlength="12" value="<?php print $dados_cli['rg'] ?>">
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-3">
                            <label for="nascimento_cli" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento_cli" name="nascimento_cli" value="<?php if ($dados_cli['data_nascimento'] != "") print date('Y-m-d', strtotime($dados_cli['data_nascimento'])); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="sexo_cli" class="form-label">Sexo</label>
                            <select class="form-select" aria-label="Default select example" id="sexo_cli" name="sexo_cli">
                                <option value="">Selecione</options>
                                <option <?php if ($dados_cli['sexo'] == "F") print "selected"; ?> value="F">Feminino</options>
                                <option <?php if ($dados_cli['sexo'] == "M") print "selected"; ?> value="M">Masculino</options>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="naturalidade_cli" class="form-label">Naturalidade</label>
                            <select class="form-select"  id="naturalidade_cli" name="naturalidade_cli">
                                <option value = "">Selecione</option>
                                <?php
                                $query_natural = "SELECT id, cidade FROM cidades ORDER BY cidade ASC";
                                $result_naturalidade = mysqli_query($conect, $query_natural);
                                while ($dados_naturalidade = mysqli_fetch_array($result_naturalidade)) { ?>
                                    <option <?php if ($dados_cli['naturalidade'] == $dados_naturalidade['id']) print "selected"; ?> value = "<?php print $dados_naturalidade['id']; ?>"><?php print $dados_naturalidade['cidade']; ?></option>
                                
<?php
                                    }
                                
                                ?>
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="endereco_cli" class="form-label">Endereço</label>
                            <select class="form-select"  id="endereco_cli" name="endereco_cli">
                                <option value="">Selecione</option>
                                    <?php 
                                    $query_endereco = "SELECT enderecos.id, rua, numero, bairro, cidades.cidade FROM enderecos INNER JOIN cidades ON enderecos.id_cidades = cidades.id ORDER BY cidades.cidade ASC";
                                    $result_endereco = mysqli_query($conect, $query_endereco);

                                    while ($dados_endereco = mysqli_fetch_array($result_endereco)) { ?>
                                        <option <?php if ($dados_cli['id_enderecos'] == $dados_endereco['id']) print "selected"; ?> value = "<?php print $dados_endereco['id'] ?>"><?php print $dados_endereco['cidade'] . " - " . $dados_endereco['bairro'] . " - " . $dados_endereco['rua'] . " - ". $dados_endereco['numero'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    <option value="X">Outro</option>
                            </select>
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-5">
                            <label for="nivel_ensino_cli" class="form-label">Nível de Ensino</label>
                            <select class="form-select" name="nivel_ensino_cli" id="nivel_ensino_cli">
                                <option value="">Selecione</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Fundamental Incompleto') print "selected" ?> value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Fundamental Completo') print "selected" ?> value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Fundamental Andamento') print "selected" ?> value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Medio Incompleto') print "selected" ?> value="Ensino Medio Incompleto">Ensino médio incompleto</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Medio Completo') print "selected" ?> value="Ensino Medio Completo">Ensino médio completo</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Medio Andamento') print "selected" ?> value="Ensino Medio Andamento">Ensino médio em andamento</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Superior Incompleto') print "selected" ?> value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Superior Completo') print "selected" ?> value="Ensino Superior Completo">Ensino Superior Completo</option>
                                <option <?php if ($dados_cli['nivel_ensino'] == 'Ensino Superior Andamento') print "selected" ?> value="Ensino Superior Andamento">Ensino Superior Andamento</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="celular_cli" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular_cli" name="celular_cli" value="<?php print $dados_cli['telefone'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="email_cli" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_cli" name="email_cli" value = "<?php print $dados_cli['email'] ?>">
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
                            <label for="salario_cli" class="form-label">Salário</label>
                            <input type="tel" class="form-control" id="salario_cli" name="salario_cli" value = "<?php print $dados_cli['salario'] ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="efetivacao_cli" class="form-label">Data de efetivação</label>
                            <input type="date" class="form-control" id="efetivacao_cli" name="efetivacao_cli" max="<?php print date("Y-m-d") ?>" value = "<?php if ($dados_cli['data_admissao'] != "") print date("Y-m-d", strtotime($dados_cli['data_admissao']));  ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="departamento_cli" class="form-label">Departamento</label>
                            <input type="tel" class="form-control" id="departamento_cli" name="departamento_cli" value = "<?php print $dados_cli['departamento'] ?>">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-4">
                            <label for="cargo_cli" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="cargo_cli" name="cargo_cli" value = "<?php print $dados_cli['cargo'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="senha_cli" class="form-label">Senha</label>
                            <input type="text" class="form-control" id="senha_cli" name="senha_cli">
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row buttons-cadastro">

                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>

                            <button type= "button" class="btn btn-danger btn-lg" onclick="window.location.href='cliionarios.php'">Cancelar</button>
                        </div>



                    </div>
                </div>
            </div>
            <input type = "hidden" value = "<?php print $_POST['acao'] ?>" name = "acao" id = "acao">
            <input type="hidden"  value = "<?php print $_POST['id_cli'] ?>" name = "id_cli" id = "id_cli">
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
        if (document.cadastro.rg_cli.value == ""  /*|| document.cadastro.rg_cli.value.length != 10 */) {
            document.cadastro.rg_cli.focus();
            Swal.fire("", "Preencha corretamente o campo RG", "warning");
            return (false);
        }
        if (document.cadastro.nascimento_cli.value == "") {
            document.cadastro.nascimento_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Nascimento", "warning");
            return (false);
        }
        if (document.cadastro.sexo_cli.value == "") {
            document.cadastro.sexo_cli.focus();
            Swal.fire("", "O campo Sexo n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.naturalidade_cli.value == "") {
            document.cadastro.naturalidade_cli.focus();
            Swal.fire("", "O campo Naturalidade n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.endereco_cli.value == "") {
            document.cadastro.endereco_cli.focus();
            Swal.fire("", "O campo Endere&#231;o n&#227;o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.nivel_ensino_cli.value == "") {
            Swal.fire("", "O campo N&#237;vel de Ensino n&#227;o pode estar vazio", "warning");
            document.cadastro.nivel_ensino_cli.focus();
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

        const emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        const email = $('#email_cli').val();
        if (document.cadastro.email_cli.value == "" || !emailRegex.test(email)) {
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
            document.cadastro.email.focus();
            return false;
        }

        if ($('#salario_cli').val() == "") {
            Swal.fire("", "Preencha corretamente o campo Sal&#225;rio", "warning");
            $('#salario_cli').focus();
            return false;
        }

        if (document.cadastro.efetivacao_cli.value == "") {
            document.cadastro.efetivacao_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Efetiva&#231;&#227;o", "warning");
            return (false);
        }

        if (document.cadastro.departamento_cli.value == "") {
            document.cadastro.departamento_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Departamento", "warning");
            return (false);
        }

        if (document.cadastro.cargo_cli.value == "") {
            document.cadastro.cargo_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Cargo", "warning");
            return (false);
        }

        if (document.cadastro.senha_cli.value == "") {
            document.cadastro.senha_cli.focus();
            Swal.fire("", "Preencha corretamente o campo Senha", "warning");
            return (false);
        }

        document.cadastro.action = "insere_cliionario.php";
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

<?php if (($_POST['erro']) != ""){ ?>
<script>
Swal.fire("", "<?php print $_POST['erro'] ?>", "warning");
</script>
<?php } ?>