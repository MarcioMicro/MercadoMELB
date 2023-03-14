<link rel="stylesheet" href="css/login.css">
<script src="includes/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/sb-admin/css/sb-admin-2.min.css">


<script src="includes/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="includes/sb-admin/js/sb-admin-2.min.js"></script>
<?php // <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
?>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://kit.fontawesome.com/10a6d5e523.js" crossorigin="anonymous"></script>
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

<div id="wrapper" style="height: 100%">

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-gradient-secondary" id = "sidebar" style="width: 280px; height: 100%">


<p style= "height: 20px">&nbsp;</p>
    <span class="fs-4 text-center">Mercado da Esquina System</span>

    <hr>
    <ul class="nav nav-pills flex-column mb-auto text-center">
      <li class="nav-item active">
       <a href = "projeto_inicio.php" style="color: #ffffff"> P&aacute;gina Principal</a> 
      </li>

    </ul>
    <hr>

  </div>

  <div id="content-wrapper" class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>


      <div class="input-group">



      </div>


      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline  small" style="color: #ffffff !important; font-size: 14px;"><?php print ucfirst($_SESSION['usuario_nome']) ?></span>
            <i class="fas fa-user fa-sm fa-fw  " style="color: #ffffff !important; font-size: 14px;"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <div class="dropdown-header">Usu&atilde;rios</div>
            <div class="dropdown-divider"></div>

            <form action="" method="post" id="troca_user" name="troca_user"></form>
            <hr>
            <a class="dropdown-item" onclick="window.location.href='includes/encerrar_sessao.php'">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
              Finalizar
            </a>
          </div>





        </li>

      </ul>
    </nav>

    <script src="https://www.uricer.edu.br/cmw/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>






