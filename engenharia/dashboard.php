<?php
//MENU LATERAL ATIVO
$cEng = "active";
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
  $dt = date('d/m/Y H:i:s');
  require_once '../privilegios.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Titulo; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition <?php echo $cor; ?> fixed sidebar-mini">
 <div class="wrapper">
  <header class="main-header">
   <a href="#" class="logo">
    <span class="logo-mini">
     <img src="../dist/img/logo/logoWhite.png" width="50"/>
    </span>
    <span class="logo-lg">
     <img src="../dist/img/logo/logoWhite.png" width="180" />
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
        <img src="../dist/img/user/<?php echo $foto; ?>" class="user-image">
        <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
       </a>
       <ul class="dropdown-menu">
        <li class="user-header">
         <img src="../dist/img/user/<?php echo $foto; ?>" class="img-circle">
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
      <img src="../dist/img/user/<?php echo $foto; ?>" class="img-circle">
     </div>
     <div class="pull-left info">
      <p><?php echo $NomeUserLogado; ?></p>
     </div>
    </div>
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
  <div class="content-wrapper">
   <section class="content-header">
    <h1>Engenharia > Controle de Firmware<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
   <?php
    if ($aSuporte === "PP") {
   ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#novoFwLinha"">
       <span class="info-box-icon bg-red">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Firmware de Linha</h4></div>
     </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#novoFwEspecial"">
       <span class="info-box-icon bg-yellow">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Firmware Especial</h4></div>
     </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#NovoProduto"">
       <span class="info-box-icon bg-purple">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Novo Produto</h4></div>
     </div>
    </div>
   <div class="col-md-8">
    <div class="nav-tabs-custom">
     <div class="box-header with-border">
      <i class="fa fa-warning"></i>
       <h3 class="box-title">Lista de Firmware</h3>
     </div>
     <ul class="nav nav-tabs">
      <li class="active"><a href="#geral" data-toggle="tab">Firmware de Linha</a></li>
      <li><a href="#atp" data-toggle="tab">Firmware Especial</a></li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="geral">
      <?php include_once'tabelaFwLinha.php'; ?>
      </div>
      <div class="tab-pane" id="atp">
      <?php include_once'tabelaFwEspecial.php'; ?>
      </div>
     </div>
    </div>
   </div>
   <div class="col-md-4">
    <div class="nav-tabs-custom">
     <div class="box-header with-border">
      <i class="fa fa-warning"></i>
       <h3 class="box-title">Lista de Produtos</h3>
     </div>
     <?php include_once 'tabelaProduto.php'; ?>
    </div>
   </div>
    <?php } else{ echo $SemPrivilegio; } 
    include_once 'modalEngenharia.php';
    ?><!-- validando privilegio -->
  </div>
 </section>
</div>
  <?php include_once '../footer.php'; ?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#tabEstr").DataTable();
    $("#tabFinal").DataTable();
    $("#tabGeral").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script language="JavaScript">
function abrir(URL) { 
  var width = 1100;
  var height = 650;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
</body>
</html>
