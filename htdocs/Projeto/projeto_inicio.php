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
          <div class="card-body">
            <div class="text-xs font-weight-bold text-dark mb-1">Tipo de Gr&aacute;fico</div>
            <select name="chartType_cidade" id="chartType_cidade" class="form-control" onchange="updatechartType_cidade()">
              <option value="line">Linha</option>
              <option value="bar">Barra</option>
              <option value="radar">Radar</option>
              <option value="polarArea">Polar</option>
              <option value="doughnut">Rosquinha</option>
            </select>

            <br><br>

            <canvas id="myChart_cidade" style="max-height:700px;"></canvas>
          </div>
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

        $sql_query_produtos = mysqli_query($conect, $query);
        $num_result = mysqli_num_rows($sql_query_produtos);
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
            <?php if ($num_result == 0) { ?>

              <tr>
                <td colspan="7">Não existem funcionários cadastrados</td>
              </tr>
              <?php
            } else {
              while ($dados = mysqli_fetch_array($sql_query_produtos)) {
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
</body>

<?php
$query = "SELECT SUM(valor_total) AS total_vendas, 
CASE 
    WHEN Month(data_venda) = 1 THEN 'Janeiro'
    WHEN Month(data_venda) = 2 THEN 'Fevereiro'
    WHEN Month(data_venda) = 3 THEN 'Março'
    WHEN Month(data_venda) = 4 THEN 'Abril'
    WHEN Month(data_venda) = 5 THEN 'Maio'
    WHEN Month(data_venda) = 6 THEN 'Junho'
    WHEN Month(data_venda) = 7 THEN 'Julho'
    WHEN Month(data_venda) = 8 THEN 'Agosto'
    WHEN Month(data_venda) = 9 THEN 'Setembro'
    WHEN Month(data_venda) = 10 THEN 'Outubro'
    WHEN Month(data_venda) = 11 THEN 'Novembro'
    WHEN Month(data_venda) = 12 THEN 'Dezembro'
END AS mes_nome
FROM vendas
GROUP BY Month(data_venda)
ORDER BY Month(data_venda)
";
$result = mysqli_query($conect, $query);
$xValues = array();
$yValues = array();
$cont = 0;
while ($dados = mysqli_fetch_array($result)) {
  $xValues[$cont] = $dados['mes_nome'];
  $yValues[$cont] = $dados['total_vendas'];
  $cont++;
}

$xValuesJSON = json_encode($xValues);
$yValuesJSON = json_encode($yValues);


?>


<script>
  var xValues = <?php print $xValuesJSON ?>;
  var yValues = <?php print $yValuesJSON ?>;

  myData_cidade = {
    labels: xValues,
    datasets: [{
      label: "Total Vendas",
      data: yValues,
      borderWidth: 2,
      weight: 1,
      backgroundColor: [
        "#4D94FF",
        "#3385FF",
        "#2674FF",
        "#1964FF",
        "#0D53FF",
        "#0043FF",
        "#0033CC",
        "#002699",
        "#001966",
        "#001233",
        "#000B1A",
        "#00060D"
      ]
    }],
    options: {
      locale: 'br-BR',
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: (value, index, values) => {
              return new Intl.NumberFormat('br-BR', {
                style: 'currency',
                currency: 'BRL',
                maximumSignificantDigits: 3
              }).format(value);
            }
          }
        }
      }
    }
  };

  // Default chart defined with type: 'line'

  var ctx_cidade = document.getElementById('myChart_cidade').getContext('2d');
  var myChart_cidade = new Chart(ctx_cidade, {
    type: 'line',
    data: myData_cidade
  });

  // Function runs on chart type select update
  function updatechartType_cidade() {
    // Since you can't update chart type directly in Charts JS you must destroy original chart and rebuild
    if (document.getElementById("chartType_cidade").value == "line" || document.getElementById("chartType_cidade").value == "bar") {
      myChart_cidade.destroy();
      myChart_cidade = new Chart(ctx_cidade, {
        type: document.getElementById("chartType_cidade").value,
        data: myData_cidade,
        options: {
          locale: 'br-BR',
          scales: {
            y: {

              ticks: {
                callback: (value, index, values) => {
                  return new Intl.NumberFormat('br-BR', {
                    style: 'currency',
                    currency: 'BRL',
                    maximumSignificantDigits: 3
                  }).format(value);
                }
              }
            }
          }
        }
      });
    } else {
      myChart_cidade.destroy();
      myChart_cidade = new Chart(ctx_cidade, {
        type: document.getElementById("chartType_cidade").value,
        data: myData_cidade
      });
    }
  };
</script>