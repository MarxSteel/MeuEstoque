<?php
$cHome = "active";
require("restritos.php"); 
require_once 'init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
require_once 'privilegios.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Titulo; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-red fixed sidebar-mini">
 <div class="wrapper">
  <header class="main-header">
   <a href="#" class="logo">
    <span class="logo-mini">
     <img src="dist/img/logo/logoWhite.png" width="50"/>
    </span>
    <span class="logo-lg">
     <img src="dist/img/logo/logoWhite.png" width="180" />
    </span>
   </a>
   <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
     <span class="sr-only">Minizar Navegação</span>
    </a>
    <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="dist/img/user/<?php echo $foto; ?>" class="user-image">
        <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
       </a>
       <ul class="dropdown-menu">
        <li class="user-header">
         <img src="dist/img/user/<?php echo $foto; ?>" class="img-circle">
         <p><?php echo $NomeUserLogado; ?></p>
        </li>
        <li class="user-footer">
         <div class="pull-left">
           <a href="../user/perfil.php" class="btn btn-info">Dados de Perfil</a>
         </div>
         <div class="pull-right">
          <a href="../logout.php" class="btn btn-danger">Sair</a>
         </div>
        </li>
       </ul>
      </li>
      <li>
       <a href="../logout.php" class="btn btn-danger btn-flat">Sair</a>
      </li>
     </ul>
    </div>
   </nav>
  </header>
  <aside class="main-sidebar">
   <section class="sidebar">
    <div class="user-panel">
     <div class="pull-left image">
      <img src="dist/img/user/<?php echo $foto; ?>" class="img-circle">
     </div>
     <div class="pull-left info">
      <p><?php echo $NomeUserLogado; ?></p>
     </div>
    </div>
    <?php include_once 'menuLateral.php'; ?>
    </section>
  </aside>
  <div class="content-wrapper">
   <section class="content-header">
    <h1>Página Inicial<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
     <div class="col-md-4">
      <div class="info-box">
       <a href="fw/dashboard.php" >
        <span class="info-box-icon bg-orange">
         <i class="fa fa-list"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Estoque</h4></div>
      </div>
     </div>
     <?php if ($vFornecedor === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
       <a href="fornecedor/dashboard.php" >
        <span class="info-box-icon btn-danger">
         <i class="fa fa-briefcase"></i></span>
       </a>
       <div class="info-box-content"><h4>Fornecedor</h4></div>
      </div>
     </div>
     <?php } else { } if ($vTransp === "P") { ?>
     <div class="col-md-4"> 
      <div class="info-box">
       <a href="Transporte.php" >
        <span class="info-box-icon btn-info">
         <i class="fa fa-truck"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Transportadoras</h4></div>
      </div>
     </div>
     <?php } else { } if ($permProdutos === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
       <a href="Produto/dashboard.php" >
        <span class="info-box-icon btn-black">
         <i class="fa fa-sort-alpha-asc"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Tabela de itens</h4></div>
      </div>
     </div>
     <?php } else { } if ($aSuporte === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
       <a href="suporte/dashboard.php" >
        <span class="info-box-icon bg-purple">
         <i class="fa fa-tty"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Suporte Técnico</h4></div>
      </div>
     </div>
     <?php } else { } if ($aEngenharia === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
       <a href="engenharia/dashboard.php" >
        <span class="info-box-icon bg-olive">
         <i class="fa fa-hdd-o"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Engenharia</h4></div>
      </div>
     </div>
     <?php } else { } if ($vNota === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
       <a href="notas/dashboard.php" >
        <span class="info-box-icon bg-black">
         <i class="fa fa-file"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Notas Fiscais</h4></div>
      </div>
     </div>
     <?php } else {  } ?>
   </div>
   </section>
  </div>
  <?php include_once 'footer.php'; ?>
</div>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
