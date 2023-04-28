<script src="includes/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bs-admin.css">
<link rel="stylesheet" href="css/style.css">
<link rel = "stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/Chart.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="includes/sb-admin/js/sb-admin-2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://kit.fontawesome.com/10a6d5e523.js" crossorigin="anonymous"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap5.min.js"></script>
<meta charset="iso-8859-1">

<meta charset="iso-8859-1">


<style>
  #sidebar a {
    color: #ffffff !important;
  }

  #sidebar .nav-item a:hover {
    color: #ec6ad1 !important;
    text-decoration: none;
  }
</style>

<body class="sb-nav-fixed">


  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sidenav-azul" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
          <a class="navbar-brand d-flex justify-content-center" href="projeto_inicio.php"><img src="images/logo_melb.png" class="login-logo"></a>
            <div class="sb-sidenav-menu-heading">Modulos</div>
            <a class="nav-link" href="pag_cadastro_func.php">
              <div class="sb-nav-link-icon"> <i class="fa-solid fa-address-card"></i></div>
              Cadastrar funcionário
            </a>
            <a class="nav-link" href="pag_estoque.php">
              <div class="sb-nav-link-icon"> <i class="fa-solid fa-boxes-stacked"></i></div>
              Estoque
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Layouts
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Charts
            </a>
            <a class="nav-link" href="tables.html">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tables
            </a>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
    <nav class="sb-topnav navbar navbar-expand navbar-azul">


    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-5" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i> </button>
<div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php print ucfirst($_SESSION['usuario_nome']) ?></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
         
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="includes/encerrar_sessao.php">Finalizar</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <script>

$(document).ready(function () {
    $('#dados').DataTable({
    "language": {
        "sProcessing":    "Processando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "Não foram encontrados resultados",
        "sEmptyTable":    "Sem dados disponíveis nesta tabela",
        "sInfo":          "Mostrando registros de _START_ a _END_ em um total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros de 0 a 0 de um total de 0 registros",
        "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Carregando...",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sLast":    "Último",
            "sNext":    "Seguinte",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Ordenar de forma crescente",
            "sSortDescending": ": Ordenar de forma decrescente"
        }
    }
});
});
</script>