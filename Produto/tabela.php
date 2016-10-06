<?php
//MENU LATERAL ATIVO
$cTabela = "active";
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
  require_once '../privilegios.php';

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
    <h1>Tabela de produtos<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
   <?php 
   if ($vTabela === "PP") {
   ?>
    <div class="col-md-12">
     <div class="nav-tabs-custom">
      <div class="box-header with-border">
       <!--<i class="fa fa-warning"></i>
       <h3 class="box-title">Tabela de produtos</h3>-->
      </div>
      <div class="tab-content">
       <table id="listaProdutos" class="table table-bordered table-striped table-responsive">
        <thead>
         <tr>
          <th style="width: 5%">Código</th>
          <th style="width: 7%">Tipo</th>
          <th style="width: 35%">Produto</th>
          <th style="width: 35%">Descrição</th>
          <th style="width: 10%">Valor</th>
          <th style="width: 4%"></th>
         </tr>
        </thead>
        <tbody>
         <?php 
          while ($VCat = $Catt->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VCat['es_c2'] . '</td>';
            echo '<td>' . $VCat['es_c1'] . '</td>';
            echo '<td>' . $VCat['es_nome'] . '</td>';
            echo '<td>' . $VCat['es_cat'] . '</td>';
            echo '<td>R$' . $VCat['es_preco'] . '</td>';
            echo '<td><a class="btn btn-success btn-block btn-xs" href="';
            echo "javascript:abrir('DetalheProd.php?ID=" . $VCat['id'] . "');";
            echo '"><i class="fa fa-search"> </i></a></td>';
           echo '</tr>';
           endwhile;
         ?>
        </tbody>
       </table>
      </div>
     </div>
    </div>
   <?php } else{ ?>
    <div class="col-md-12 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon bg-red">
        <i class="fa fa-exclamation-triangle"></i>
       </span>
      </a>
      <div class="info-box-content">
       <h4><strong><i>Atenção!</i></strong></h4>
       <h4>Você não possui privilégios suficientes para abrir esta página. Contate o Administrador!</h4>
      </div>
     </div>
    </div>
    <?php } ?>
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
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#listaProdutos").DataTable();
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
