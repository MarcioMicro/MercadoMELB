<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Cadastro de Funcion√°rio</h1>
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
                            <input type="text" class="form-control" id="nome_func" name="nome_func">
                        </div>
                        <div class="col-md-4">
                            <label for="cpf_func" class="form-label">CPF</label>
                            <input type="tel" class="form-control" id="cpf_func" name="cpf_func">
                        </div>
                        <div class="col-md-4">
                            <label for="rg_func" class="form-label">RG</label>
                            <input type="tel" class="form-control" id="rg_func" name="rg_func" maxlength="12">
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-3">
                            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento_func" name="nascimento_func">
                        </div>
                        <div class="col-md-3">
                            <label for="sexo_func" class="form-label">Sexo</label>
                            <select class="form-select" aria-label="Default select example" id="sexo_func" name="sexo_func">
                                <option selected value="">Selecione</options>
                                <option value="F">Feminino</options>
                                <option value="M">Masculino</options>
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
                                    <option value = "<?php print $dados_naturalidade['id']; ?>"><?php print $dados_naturalidade['cidade']; ?></option>
                                
<?php
                                    }
                                
                                ?>
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="endereco_func" class="form-label">Endere√ßo</label>
                            <select class="form-select"  id="endereco_func" name="endereco_func">
                                <option value="">Selecione</option>
                                    <?php 
                                    $query_endereco = "SELECT enderecos.id, rua, numero, bairro, cidades.cidade FROM enderecos INNER JOIN cidades ON enderecos.id_cidades = cidades.id ORDER BY cidades.cidade ASC";
                                    $result_endereco = mysqli_query($conect, $query_endereco);

                                    while ($dados_endereco = mysqli_fetch_array($result_endereco)) { ?>
                                        <option value = "<?php print $dados_endereco['id'] ?>"><?php print $dados_endereco['cidade'] . " - " . $dados_endereco['bairro'] . " - " . $dados_endereco['rua'] . " - ". $dados_endereco['numero'] ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>

                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-5">
                            <label for="nivel_ensino_func" class="form-label">N√≠vel de Ensino</label>
                            <select class="form-select" aria-label="Default select example" name="nivel_ensino_func" id="nivel_ensino_func">
                                <option selected value="">Selecione</option>
                                <option value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                                <option value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                                <option value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                                <option value="Ensino Medio Incompleto">Ensino m√©dio incompleto</option>
                                <option value="Ensino Medio Completo">Ensino m√©dio completo</option>
                                <option value="Ensino Medio Andamento">Ensino m√©dio em andamento</option>
                                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                                <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                                <option value="Ensino Superior Andamento">Ensino Superior Andamento</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="celular_func" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular_func" name="celular_func">
                        </div>
                        <div class="col-md-3">
                            <label for="email_func" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_func" name="email_func">
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="card">
                <div class="card-header">
                    Dados da Contrata√ß√£o
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">



                        <div class="col-md-4">
                            <label for="salario_func" class="form-label">Sal√°rio</label>
                            <input type="tel" class="form-control" id="salario_func" name="salario_func">
                        </div>

                        <div class="col-md-4">
                            <label for="efetivacao_func" class="form-label">Data de efetiva√ß√£o</label>
                            <input type="date" class="form-control" id="efetivacao_func" name="efetivacao_func" max="<?php print date("Y-m-d") ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="departamento_func" class="form-label">Departamento</label>
                            <input type="tel" class="form-control" id="departamento_func" name="departamento_func">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-4">
                            <label for="cargo_func" class="form-label">Cargo</label>
                            <input type="text" class="form-control" id="cargo_func" name="cargo_func">
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

                            <button class="btn btn-danger btn-lg">Cancelar</button>
                        </div>



                    </div>
                </div>
            </div>
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
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¬®|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + ' cont√©m caracteres inv√°lidos!', "warning");
                    // Se o campo cont√©m caracteres inv√°lidos, limpe o campo
                    input.val('');
                }
            });
        });

        $('input[type=text]').on('focus', function() {
            const inputId = $(this).attr('id');
            const input = $('#' + inputId);
            input.on('input', function() {
                const value = input.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¬®|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + ' cont√©m caracteres inv√°lidos!', "warning");
                    // Se o campo cont√©m caracteres inv√°lidos, limpe o campo
                    input.val('');
                }
            });
        });
        $('textarea').on('focus', function() {
            const textareaId = $(this).attr('id');
            const textarea = $('#' + textareaId);

            // Verifique se o valor da textarea cont√©m os caracteres desejados
            textarea.on('input', function() {
                const value = textarea.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¬®|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo ' + textareaId.charAt(0).toUpperCase() + textareaId.slice(1) + ' cont√©m caracteres inv√°lidos!', "warning");
                    // Se a textarea cont√©m caracteres inv√°lidos, limpe a textarea
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
        if (document.cadastro.nascimento.func.value == "") {
            document.cadastro.nascimento.func.focus();
            Swal.fire("", "Preencha corretamente o campo Data de Nascimento", "warning");
            return (false);
        }
        if (document.cadastro.sexo_func.value != "") {
            document.cadastro.sexo_func.focus();
            Swal.fire("", "O campo Sexo n„o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.naturalidade.value == "") {
            document.cadastro.naturalidade.focus();
            Swal.fire("", "O campo Naturalidade n„o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.endereco.value == "") {
            document.cadastro.endereco.focus();
            Swal.fire("", "O campo EndereÁo n„o pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro.nivel_ensino.value == "") {
            Swal.fire("", "O campo NÌvel de Ensino n„o pode estar vazio", "warning");
            document.cadastro.nivel_ensino.focus();
            return false;
        }
     
        const telefone = document.cadastro.celular_func.value;

        const numerosTelefone = celular_func.replace(/\D/g, '');
        const todosIguais = /^(\d)\1+$/;
        if (document.cadastro.celular_func.value == "" || todosIguais.test(numerosTelefone)) {
            Swal.fire("", "Preencha corretamente o campo Fone", "warning");
            document.cadastro.celular_func.focus();
            return false;
        }

        const emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        const email = $('#email').val();
        if (document.cadastro.email.value == "" || !emailRegex.test(email)) {
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
            document.cadastro.email.focus();
            return false;
        }

        if ($('#salario_func').val() == "") {
            Swal.fire("", "Preencha corretamente o campo Sal·rio", "warning");
            $('#salario_func').focus();
            return false;
        }

        if (document.cadastro.efetivacao_func.value == "") {
            document.cadastro.efetivacao_func.focus();
            Swal.fire("", "Preencha corretamente o campo Data de EfetivaÁ„o", "warning");
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
        cpf = cpf.replace(/[^\d]+/g, ''); // Remove todos os caracteres que n„o s„o dÌgitos
        if (cpf.length != 11) return false; // Verifica se o CPF tem 11 dÌgitos
        // Verifica se todos os dÌgitos s„o iguais (n„o È um CPF v·lido)
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
        return true; // CPF v·lido
    }
</script>

<?php if (($_POST['erro']) != ""){ ?>
<script>
Swal.fire("", "<?php print $_POST['erro'] ?>", "warning");
</script>
<?php } ?>