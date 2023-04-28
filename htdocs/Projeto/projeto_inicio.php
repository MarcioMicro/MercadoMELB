<?php 
session_name('mercado');
session_start();

if ($_SESSION == array()) {
    $msg = urlencode("Sess�o Encerrada");

header("Location: index.php?mensagem=$msg");
  
}
include "includes/cabecalho.php"; ?>
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Página Inicial</h1>
                      <br>
     
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Lucros Mensais
                                    </div>
                                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="myChart"  class="chartjs-render-monitor"></canvas></div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Funcionários
                            </div>
                            <div class="card-body">
                                <?php 
                                include "includes/conect.php";
                                $query = "SELECT id,nome,cargo,departamento,salario,data_admissao,data_nascimento FROM funcionarios";

$sql_query_produtos =mysqli_query($conect,$query);
$num_result=mysqli_num_rows($sql_query_produtos); 
?>
                            <table class="table table table-bordered table-hover" id="dados">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Data de Admissão</th>
                        <th scope="col">Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($num_result == 0){ ?>
                      
                        <tr>
                            <td colspan="7">Não existem funcionários cadastrados</td>
                        </tr>
                  <?php  
                    } else{ 
                        while($dados = mysqli_fetch_array($sql_query_produtos)){
                   ?> 
                            <tr>
                            <th scope="row"><?php print $dados['id']; ?></th>
                            <td><?php print $dados['nome']; ?></td>
                            <td><?php print $dados['cargo']; ?></td>
                            <td><?php print $dados['departamento']; ?></td>
                            <td><?php print $dados['salario']; ?></td>
                            <td><?php print $dados['data_admissao']; ?></td>
                            <td><?php print $dados['data_nascimento']; ?></td>
                            </tr>
                         <?php
                                }       
                             }
                            ?>  
                    </tbody>
                </table>
            
            </div>
                        </div>
                    </div>
                </main>
</div>
</div>




<script>
var xValues = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
var yValues = [55, 49, 44, 24, 15];


new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: "#6fd8da",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: false
    }
  }
});
</script>