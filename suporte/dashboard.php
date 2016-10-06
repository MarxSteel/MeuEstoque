<?php
//MENU LATERAL ATIVO
$vSup = "active";
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
    <h1>Suporte Técnico<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
   <?php
    if ($aSuporte === "PP") {
   ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon btn-primary">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Cadastrar Atendimento</h4></div>
     </div>
    </div>
    <div class="col-md-8">
     <div class="info-box">
     <center>
      <img src="../dist/img/logo/logoBlack.png" width="210">
     </center>
     </div>
    </div>
   <div class="col-md-12">
    <div class="nav-tabs-custom">
     <div class="box-header with-border">
      <i class="fa fa-warning"></i>
       <h3 class="box-title">Histórico de Atendimentos</h3>
     </div>
     <ul class="nav nav-tabs">
      <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
      <li><a href="#atp" data-toggle="tab">Atend. Pendentes</a></li>
      <li><a href="#atf" data-toggle="tab">Atend. Finalizados</a></li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="geral">
      <?php include_once'tabelaAtendGeral.php'; ?>
      </div>
      <div class="tab-pane" id="atp">
      <?php include_once'tabelaAtendPendente.php'; ?>
      </div>
      <div class="tab-pane" id="atf">
      <?php include_once'tabelaAtendFinal.php'; ?>
      </div>
     </div>
    </div>
   </div>
    <?php } else{ echo $SemPrivilegio; } ?><!-- validando privilegio -->
      <!-- MODAL DE CADASTRO DE ATENDIMENTO -->
      <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-aqua-gradient">
          <button type="button" class="close" data-dismiss="modal">X</button>
           <h4 class="modal-title">Cadastrar Atendimento</h4>
         </div>
         <div class="modal-body">
          <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-8 form-group">Nome da Revenda
            <input class="form-control" type="text" name="nm" required="required">
           </div>
           <div class="col-xs-4 form-group">Tipo de Atendimento
            <select class="form-control" name="tipoat" required="required">
             <option value="" selected="selected">SELECIONE</option>
             <option value="1">ATENDIMENTO</option>
             <option value="2">RETORNO DE ASSIST.</option>
             <option value="3">PEÇA</option>
            </select>
           </div>
           <div class="col-xs-7 form-group">Status do Atendimento
            <select class="form-control" name="status" required="required">
             <option value="" selected="selected">SELECIONE</option>
             <option value="1">Solucionado</option>
             <option value="2">Não Solucionado (encaminhado à Henry)</option>
             <option value="3">Pendente</option>
             <option value="4">Não Solucionado</option>
            </select>
           </div>
           <div class="col-xs-5 form-group">Data de Cadastro
            <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
           </div>
           <div class="col-xs-12"><strong>Atendimento</strong>
            <textarea name="obs" cols="45" rows="3" class="form-control"></textarea>
           </div>
           <div class="col-xs-12"><strong>Solução</strong>
            <textarea name="sol" cols="45" rows="3" class="form-control"></textarea><hr>
           </div>
           <div class="pull-right">
            <input name="Tsenha" type="submit" class="btn bg-aqua" id="Tsenha" value="CADASTRAR ATENDIMENTO"  /> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
           </div>
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $nRevenda = $_POST["nm"];
            $nStatus = $_POST["status"];
            $nTipo = $_POST["tipoat"];
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            $Sol = str_replace("\r\n", "<br/>", strip_tags($_POST["sol"]));


            $AddCat = $PDO->query("INSERT INTO suporte (NomeTec, Revenda, Atendimento, Solucao, Status, DataCadastro, TipoSup) VALUES ('$NomeUserLogado', '$nRevenda', '$Obs', '$Sol', '$nStatus', '$dt', '$nTipo')");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Atendimento Cadatrado com Sucesso!");
              location.href="dashboard.php"</script>';
             }
             else{
             echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
             }
           }
          ?>
         </div>
         <div class="modal-footer">
         </div>
        </div>
       </div>
      </div>
      <!-- FIM DO MODAL DE CADASTRO DE ATENDIMENTO -->
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
