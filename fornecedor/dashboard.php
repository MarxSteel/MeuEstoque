<?php
//MENU LATERAL ATIVO

$cLogistica = "active";
$cFornecedor = "active";


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
  $VerTela = $cp['pFornecedor'];
  $AddFornecedor = $cp['pAddFornecedor'];





$dt = date("d/m/Y - H:i:s");

$ChamaFornecedor = "SELECT * FROM fornecedor";
$Forn = $PDO->prepare($ChamaFornecedor);
$Forn->execute();


$ChamaFornecedor = "SELECT * FROM cadVacina";
$Forn = $PDO->prepare($ChamaFornecedor);
$Forn->execute();



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
    <h1>Fornecedores<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <?php 
   if ($VerTela === "PP") {
   ?>
   <div class="row">
    <?php
    if ($AddFornecedor === "PP") {
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon btn-primary">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Cadastrar Fornecedor</h4></div>
      <!-- MODAL DE CADASTRO DE FORNECEDOR -->
      <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-green-gradient">
          <button type="button" class="close" data-dismiss="modal">X</button>
           <h4 class="modal-title">Cadastrar novo Fornecedor</h4>
         </div>
         <div class="modal-body">
          <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-12 form-group">Nome do Fornecedor
            <input class="form-control" type="text" name="nm" required="required">
           </div>
           <div class="col-xs-6 form-group">Tipo de Fornecedor
            <select class="form-control" name="tp" required="required">
             <option value="" selected="selected">SELECIONE</option>
             <option value="1">Nacional</option>
             <option value="2">Importação</option>
            </select>
           </div>
           <div class="col-xs-6 form-group">Data de Cadastro
            <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
           </div>
           <div class="col-xs-12">Observações
            <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
           </div>
           <div class="pull-right"><br /><br />
            <input name="Tsenha" type="submit" class="btn bg-green" id="Tsenha" value="Cadastrar Novo Fornecedor"  />
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
           </div>
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $nomeCat = $_POST["nm"];
            $tipo = $_POST["tp"];
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            $AddCat = $PDO->query("INSERT INTO fornecedor (f_Nome, Obs, DataCadastro, f_Tipo) VALUES ('$nomeCat', '$Obs', '$dt', '$tipo')");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Fornecedor Cadastrado com Sucesso");
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
     </div>
    </div>
    <div class="col-md-8">
     <div class="info-box">
     </div>
    </div>
    <?php }
    else{
     echo '<div class="col-md-12">';
     echo '<div class="info-box"></div>';
     echo '</div>';
    }
    ?>
     <div class="col-md-12">
      <div class="info-box">
       <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th style="width: 10px">#</th>
           <th>Fornecedor</th>
           <th style="width: 15px">Modalidade</th>
           <th style="width: 50px"></th>
          </tr>
         </thead>
         <tbody>
         <?php 
          while ($VFor = $Forn->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VFor['f_id'] . '</td>';
            echo '<td>' . $VFor['f_Nome'] . '</td>';
            $TipoForn = $VFor['f_Tipo'];
            if ($TipoForn === "1") {
            echo '<td><span class="label label-info">NACIONAL</span></td>'; 
            }
            else{
            echo '<td><span class="label label-danger">INTERNACIONAL</span></td>'; 
            }
            ?>
            <td>
            <a class="btn btn-default btn-xs btn-block" href="javascript:abrir('CadFornecedor.php?ID=<?php echo $VFor['f_id']; ?>');">
             <i class="fa fa-search"> Visualizar</i>
            </a>
            </td>
            <?php
           echo '</tr>';
           endwhile;
          ?>
          </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
    <?php
    }
    else{
    ?>
    <div class="col-md-12 col-sm-6 col-xs-12">
     <div class="info-box">
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon bg-black">
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
