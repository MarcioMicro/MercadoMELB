<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

if ($_POST['id_func'] != "") {
    $query = "SELECT * FROM funcionarios WHERE id = '" . $_POST['id_func']. "'";
    $result = mysqli_query($conect, $query);
    $dados_func = mysqli_fetch_array($result);
}

?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Cadastro de Funcionário</h1>
        <br>

        <form name="cadastro" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Dados Pessoais
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-4">
                            <label for="nome_func" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_func" name="nome_func" value="<?php print $dados_func['nome'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="cpf_func" class="form-label">CPF</label>
                            <input type="tel" class="form-control" id="cpf_func" name="cpf_func" value="<?php print $dados_func['cpf'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="rg_func" class="form-label">RG</label>
                            <input type="tel" class="form-control" id="rg_func" name="rg_func" maxlength="12" value="<?php print $dados_func['rg'] ?>">
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-3">
                            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento_func" name="nascimento_func" value="<?php if ($dados_func['data_nascimento'] != "") print date('Y-m-d', strtotime($dados_func['data_nascimento'])); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="sexo_func" class="form-label">Sexo</label>
                            <select class="form-select" aria-label="Default select example" id="sexo_func" name="sexo_func">
                                <option value="">Selecione</options>
                                <option <?php if ($dados_func['sexo'] == "F") print "selected"; ?> value="F">Feminino</options>
                                <option <?php if ($dados_func['sexo'] == "M") print "selected"; ?> value="M">Masculino</options>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="naturalidade_func" class="form-label">Naturalidade</label>
                            <select class="form-select"  id="naturalidade_func" name="naturalidade_func">
                                <option value = "">Selecione</option>
                                <?php
                                $query_natural = "SELECT id, cidade FROM cidades ORDER BY cidade ASC";
                                $result_naturalidade = mysqli_query($conect, $query_natural);
                                while ($dados_naturalidade = mysqli_fetch_array($result_naturalidade)) { ?>
                                    <option <?php if ($dados_func['naturalidade'] == $dados_naturalidade['id']) print "selected"; ?> value = "<?php print $dados_naturalidade['id']; ?>"><?php print $dados_naturalidade['cidade']; ?></option>
                                
<?php
                                    }
                                
                                ?>
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="endereco_func" class="form-label">Endereço</label>
                            <select class="form-select"  id="endereco_func" name="endereco_func">
                                <option value="">Selecione</option>
                                    <?php 
                                    $query_endereco = "SELECT enderecos.id, rua, numero, bairro, cidades.cidade FROM enderecos INNER JOIN cidades ON enderecos.id_cidades = cidades.id ORDER BY cidades.cidade ASC";
                                    $result_endereco = mysqli_query($conect, $query_endereco);

                                    while ($dados_endereco = mysqli_fetch_array($result_endereco)) { ?>
                                        <option <?php if ($dados_func['id_enderecos'] == $dados_endereco['id']) print "selected"; ?> value = "<?php print $dados_endereco['id'] ?>"><?php print $dados_endereco['cidade'] . " - " . $dados_endereco['bairro'] . " - " . $dados_endereco['rua'] . " - ". $dados_endereco['numero'] ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-5">
                            <label for="nivel_ensino_func" class="form-label">Nível de Ensino</label>
                            <select class="form-select" name="nivel_ensino_func" id="nivel_ensino_func">
                                <option value="">Selecione</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Fundamental Incompleto') print "selected" ?> value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Fundamental Completo') print "selected" ?> value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Fundamental Andamento') print "selected" ?> value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Medio Incompleto') print "selected" ?> value="Ensino Medio Incompleto">Ensino médio incompleto</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Medio Completo') print "selected" ?> value="Ensino Medio Completo">Ensino médio completo</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Medio Andamento') print "selected" ?> value="Ensino Medio Andamento">Ensino médio em andamento</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Superior Incompleto') print "selected" ?> value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Superior Completo') print "selected" ?> value="Ensino Superior Completo">Ensino Superior Completo</option>
                                <option <?php if ($dados_func['nivel_ensino'] == 'Ensino Superior Andamento') print "selected" ?> value="Ensino Superior Andamento">Ensino Superior Andamento</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="celular_func" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular_func" name="celular_func" value="<?php print $dados_func['telefone'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="email_func" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_func" name="email_func" value = "<?php print $dados_func['email'] ?>">
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
                            <input type="tel" class="form-control" id="salario_func" name="salario_func" value = "<?php print $dados_func['salario'] ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="efetivacao_func" class="form-label">Data de efetivação</label>
                            <input type="date" class="form-control" id="efetivacao_func" name="efetivacao_func" max="<?php print date("Y-m-d") ?>" value = "<?php if ($dados_func['data_admissao'] != "") print date("Y-m-d", strtotime($dados_func['data_admissao']));  ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="departamento_func" class="form-label">Departamento</label>
                            <input type="tel" class="form-control" id="departamento_func" name="departamento_func" value = "<?php print $dados_func['departamento'] ?>">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-4">
                            <label for="cargo_func" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="cargo_func" name="cargo_func" value = "<?php print $dados_func['cargo'] ?>">
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

                            <button type= "button" class="btn btn-danger btn-lg" onclick="window.location.href='funcionarios.php'">Cancelar</button>
                        </div>



                    </div>
                </div>
            </div>
            <input type = "hidden" value = "<?php print $_POST['acao'] ?>" name = "acao" id = "acao">
            <input type="hidden"  value = "<?php print $_POST['id_func'] ?>" name = "id_func" id = "id_func">
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
        if (document.cadastro.rg_func.value == ""  /*|| document.cadastro.rg_func.value.length != 10 */) {
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

        const emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
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

<?php if (($_POST['erro']) != ""){ ?>
<script>
Swal.fire("", "<?php print $_POST['erro'] ?>", "warning");
</script>
<?php } ?>