<script src="includes/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bs-admin.css">
<link rel="stylesheet" href="css/style.css">

<script src="js/bootstrap.bundle.min.js"></script>
<script src="includes/sb-admin/js/sb-admin-2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://kit.fontawesome.com/10a6d5e523.js" crossorigin="anonymous"></script>
<script src="https://www.uricer.edu.br/cmw/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  <nav class="sb-topnav navbar navbar-expand navbar-azul">

    <a class="navbar-brand ps-3" href="#">Supermercado MELB</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i> </button>
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

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sidenav-azul" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon"> <i class="fas fa-tachometer-alt"></i></div>
              Dashboard
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
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i> </div>
              Pages
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.html">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
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
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?php print ucfirst($_SESSION['usuario_nome']) ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">