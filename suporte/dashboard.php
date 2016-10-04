<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];


 $privilegio = $PDO->prepare("SELECT * FROM privilegio WHERE idUser='$login'");
 $privilegio->execute();
  $cp = $privilegio->fetch();
  $VerProdutos = $cp['pProduto'];
  $VProd = $cp['vIP'];            //VER ITENS DE PRODUÇÃO
  $CadProd = $cp['cIProd'];       //CADASTRAR ITENS DE PRODUÇÃO
  $VArPro = $cp['lisArPro'];      //LISTAR ARVORE DE PRODUTO

$dt = date("d/m/Y - H:i:s");
$ChamaCat = "SELECT * FROM cad_estoque";
$Catt = $PDO->prepare($ChamaCat);
$Catt->execute();

$QryCategoria = "SELECT * FROM categoria WHERE Status='1'";
// seleciona os registros
$stmt4 = $PDO->prepare($QryCategoria);
$stmt4->execute();


$ChamaFornecedor = "SELECT * FROM fornecedor";
$F1 = $PDO->prepare($ChamaFornecedor);
$F2 = $PDO->prepare($ChamaFornecedor);
$F3 = $PDO->prepare($ChamaFornecedor);
$F1->execute();
$F2->execute();
$F3->execute();
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
<body class="hold-transition skin-red fixed sidebar-mini">
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
    <h1>Suporte Técnico<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
   <div class="col-md-6">
    <div class="box box-default">
     <div class="box-header with-border">
      <i class="fa fa-warning"></i>
       <h3 class="box-title">Suporte Técnico</h3>
     </div>
     <div class="box-body">
      AQUI TEXTO DE SUPORTE
     </div>
    </div>
   </div>
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

TEXTO 3
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
TEXTO 2
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
TEXTO 1
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>







    </div>

   </section>
  </div>
  <?php include_once '../footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
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
