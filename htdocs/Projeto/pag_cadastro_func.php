<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
<div class="container-fluid">
    
<h1 class="mt-4">Cadastro de Funcionário</h1>
                      <br>
                      
    <form name = "cadastro" id = "cadastro" >
    <div class=  "card">
        <div class = "card-header">
            Dados Pessoais
        </div>
    <div class="card-body">
    <div class="row"  style="padding: 10px;">
    
        <div class="col-md-4">
            <label for="nome_func" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_func" name = "nome_func">
        </div>
        <div class="col-md-4">
            <label for="cpf_func" class="form-label">CPF</label>
            <input type="tel" class="form-control" id="cpf_func" name = "cpf_func">
        </div>
        <div class="col-md-4">
            <label for="rg_func" class="form-label">RG</label>
            <input type="tel" class="form-control" id="rg_func" name = "rg_func">
        </div>

</div>
<div class = "row"  style="padding: 10px;">
        <div class="col-md-3">
            <label for="nascimento_func" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="nascimento_func" name="nascimento_func">
        </div>
        <div class="col-md-3">
            <label for="sexo_func" class="form-label">Sexo</label>
            <select class="form-select" aria-label="Default select example" id="sexo_func" name="sexo_func">
                <option selected value="">Seleciona</options>    
                <option value="F">Feminino</options>
                <option value="M">Masculino</options>
            </select>
        </div>
        <div class="col-md-3">
            <label for="naturalidade_func" class="form-label">Naturalidade</label>
            <input type="text" class="form-control" id="naturalidade_func" name="naturalidade_func">
        </div>
        <div class="col-md-3">
            <label for="endereco_func" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco_func" name = "endereco_func">
        </div>

</div>
<div class=  "row"  style="padding: 10px;">
        <div class="col-md-5">
        <label for="nivel_ensino_func" class="form-label">Nível de Ensino</label>
             <select class="form-select" aria-label="Default select example" name = "nivel_ensino_func" id = "nivel_ensino_func">
                <option selected value="">Selecione</option>
                <option value="Ensino Fundamental Incompleto">Ensino fundamental incompleto</option>
                <option value="Ensino Fundamental Completo">Ensino fundamental completo</option>
                <option value="Ensino Fundamental Andamento">Ensino fundamental em andamento</option>
                <option value="Ensino Medio Incompleto">Ensino médio incompleto</option>
                <option value="Ensino Medio Completo">Ensino médio completo</option>
                <option value="Ensino Medio Andamento">Ensino médio em andamento</option>
                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                <option value="Ensino Superior Andamento">Ensino Superior Andamento</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="celular_func" class="form-label">Celular</label>
            <input type="tel" class="form-control" id="celular_func" name = "celular_func">
        </div>
        <div class="col-md-3">
            <label for="email_func" class="form-label">Email</label>
            <input type="email" class="form-control" id="email_func" name = "email_func" onblur="validacaoEmail(cadastro.email)">
        </div>
        </div>
</div>
</div>
<p>&nbsp;</p>
<div class= "card">
    <div class = "card-header">
        Dados da Contratação
    </div>
    <div class= "card-body">
        <div class="row"  style="padding: 10px;">

      

        <div class="col-md-4">
            <label for="salario_func" class="form-label">Salário</label>
            <input type="tel" class="form-control" id="salario_func" name = "salario_func">
        </div>
     
        <div class="col-md-4">
            <label for="efetivacao_func" class="form-label">Data de efetivação</label>
            <input type="date" class="form-control" id="efetivacao_func" name = "efetivacao_func">
        </div>
        <div class="col-md-4">
            <label for="departamento_func" class="form-label">Departamento</label>
            <input type="tel" class="form-control" id="departamento_func" name = "departamento_func">
        </div>
</div>
<div class = "row"  style="padding: 10px;">
        <div class="col-md-4">
            <label for="cargo_func" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo_func" name = "cargo_func">
        </div>
        <div class="col-md-4">
            <label for="senha_func" class="form-label">Senha</label>
            <input type="text" class="form-control" id="senha_func" name = "senha_func">
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


    verifica = () => {
	
		
    if (document.cadastro.nome_func.value == "" || document.cadastro.nome_func.value.length <= 3){
        document.cadastro.nome_func.focus();
        Swal.fire("", "Favor verificar o campo Nome!", "warning");
        return (false);
    }

    if (document.cadastro.cpf_func.value == "" || document.cadastro.cpf_func.value.length != 14) {
        document.cadastro.cpf_func.focus();
        Swal.fire("", "Favor inserir um CPF válido!", "warning");
        return (false);
    }

    if (document.cadastro.rg_func.value == "" || document.cadastro.rg_func.value.length != 10) {
        document.cadastro.rg_func.focus();
        Swal.fire("", "Favor verificar com campo RG!", "warning");
        return (false);
    }

    if (document.cadastro.nascimento.func.value == "") {
        document.cadastro.nascimento.func.focus();
        Swal.fire("", "Favor verifique o campo Data de Nascimento", "warning");
        return (false);
    }	

    if (document.cadastro.sexo_func.value != "selecione") {
        document.cadastro.sexo_func.focus();
        Swal.fire("", "O campo Percentual não pode ser zero!", "warning");
        return (false);
    }
    
    if (document.cadastro.naturalidade.value == "" || document.cadastro.naturalidade.value.length <= 3) {
        document.cadastro.naturalidade.focus();
        Swal.fire("", "Favor verificar o campo Instituição anterior ou atual!", "warning");
        return (false);
    }

    if (document.cadastro.endereco.value == "" || document.cadastro.endereco.value.length <= 3) {
        document.cadastro.endereco.focus();
        Swal.fire("", "Favor verificar o campo Curso anterior ou atual!", "warning");
        return (false);
    }
    
    if (document.cadastro.nivel_ensino_func.value == "") {
        document.cadastro.nivel_ensino_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.celular_func.value == "") {
        document.cadastro.celular_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.email_func.value == "") {
        document.cadastro.email_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.senha_func.value == "") {
        document.cadastro.senha_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.obs_func.value == "") {
        document.cadastro.obs_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.efetivacao_func.value == "") {
        document.cadastro.efetivacao_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.departamento_func.value == "") {
        document.cadastro.departamento_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.cargo_func.value == "") {
        document.cadastro.cargo_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    else{
        Swal.fire("", "Deu bom", "");
    }
}

			function validacaoEmail(field) {
				usuario = field.value.substring(0, field.value.indexOf("@"));
				dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

				if ((usuario.length >=1) &&
					(dominio.length >=3) &&
					(usuario.search("@")==-1) &&
					(dominio.search("@")==-1) &&
					(usuario.search(" ")==-1) &&
					(dominio.search(" ")==-1) &&
					(dominio.search(".")!=-1) &&
					(dominio.indexOf(".") >=1)&&
					(dominio.lastIndexOf(".") < dominio.length - 1)){
					
				}
				else{
				Swal.fire("", "Favor inserir um E-mail válido!", "warning");
				}
			};

            $(document).ready(function ($) {

	$('#celular_func').mask('(00) 00000-0000');
	$('#cpf_func').mask('000.000.000-00');
    
   $('input[type=text]').on('focus', function() {
    const inputId = $(this).attr('id');
	const input = $('#' + inputId);
	  input.on('input', function() {
    const value = input.val();
const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¨|&|=|\[|\]|\|/.test(value);

    if (hasInvalidCharacters) {
      Swal.fire("",'O campo ' + inputId.charAt(0).toUpperCase() + inputId.slice(1) + ' contém caracteres inválidos!', "warning");
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
      Swal.fire("",'O campo ' + textareaId.charAt(0).toUpperCase() + textareaId.slice(1) + ' contém caracteres inválidos!', "warning");
      // Se a textarea contém caracteres inválidos, limpe a textarea
      textarea.val('');
    }
  });
  

  });
});

	function verifica ()
	{
	const emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
		const email = $('#email').val();
		if(document.frm_envio.nome.value == "" )
		{
			
            Swal.fire("","Preencha corretamente o campo Nome", "warning");
			document.frm_envio.nome.focus();
			return false;
		}
		if(document.frm_envio.email.value == "")
		{
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
			document.frm_envio.email.focus();
			return false;
		} else if (!emailRegex.test(email)){
            Swal.fire("", "Preencha corretamente o campo E-mail", "warning");
			document.frm_envio.email.focus();
			return false;
		}
		
		if(document.frm_envio.fone.value == "" )
		{
            Swal.fire("", "Preencha corretamente o campo Fone", "warning");
			document.frm_envio.fone.focus();
			return false;
		} else{  
			const telefone = document.frm_envio.fone.value;
		
const numerosTelefone = telefone.replace(/\D/g, '');
const todosIguais = /^(\d)\1+$/;

if (todosIguais.test(numerosTelefone)) {
	Swal.fire("", "Preencha corretamente o campo Fone", "warning");
			document.frm_envio.fone.focus();
			return false;
}
			  }
		
		if(document.frm_envio.nivel_ensino.value == "" )
		{
            Swal.fire("", "Preencha corretamente o campo Nível de Ensino", "warning");
			document.frm_envio.nivel_ensino.focus();
			return false;
		}
		if(document.frm_envio.curso.value == "" )
		{
            Swal.fire("", "Preencha corretamente o campo Curso", "warning");
			document.frm_envio.curso.focus();
			return false;
		}
		
		document.frm_envio.action = "";
		document.frm_envio.method = "post";
		document.frm_envio.submit();
	}
	
    <?php if (($_POST['erro']) != ""){ ?>

        Swal.fire("", "<?php print $_POST['erro'] ?>", "warning");

    <?php } ?>




</script>