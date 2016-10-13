<?php
//MENU LATERAL ATIVO
$cEstoque = "active";
$cProdutos = "active";
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
    <h1>Produtos / Lista geral<small><?php echo $Titulo; ?></small></h1>
   </section>
   <section class="content">
   <div class="row">
   <?php if ($vProduto === "PP") { ?>
     <div class="col-md-4">
      <div class="info-box">
      </div>
     </div>
     <div class="col-md-4"> 
      <div class="info-box">
      <?php 
      if ($vItens === "PP") { ?>
       <a href="ArvoreProduto.php" >
        <span class="info-box-icon bg-black">
         <i class="fa fa-tree"></i>
        </span>
       </a>
       <div class="info-box-content"><h4>Árvore de Produto</h4></div>
      <?php } else { } ?>
      </div>
     </div>
     <div class="col-md-4">
      <div class="info-box">
      <?php if ($aItens === "PP") { ?>
      <a data-toggle="modal" data-target="#myModal"">
       <span class="info-box-icon btn-danger">
        <i class="fa fa-plus"></i>
       </span>
      </a>
      <div class="info-box-content"><br /><h4>Cadastrar Produto</h4></div>
      <!-- MODAL DE CADASTRO DE FORNECEDOR -->
      <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-green-gradient">
          <button type="button" class="close" data-dismiss="modal">X</button>
           <h4 class="modal-title">Cadastrar Produto</h4>
         </div>
         <div class="modal-body">
         <form name="itemNovo" id="name" method="post" action="" enctype="multipart/form-data">
          <div class="col-xs-7 form-group">Nome do item
            <input class="form-control" type="text" name="ni" required="required">
          </div>
          <div class="col-xs-5 form-group">Data de Cadastro
           <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
          </div>
          <div class="col-xs-4">Categoria
           <select class="form-control" name="cat" required="required">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($user3 = $stmt4->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $user3['Categoria'] ?>"><?php echo $user3['Categoria'] ?>
            </option>
            <?php endwhile; ?>
           </select>
          </div>
          <div class="col-xs-4">Und. de Medida
          <select class="form-control" name="un" required="required">
           <option value="" selected="selected">SELECIONE</option>
           <option value="P">PESO</option>
           <option value="U">UNIDADE</option>s
           <option value="L">LITRO</option>
          </select>
          </div>
          <div class="col-xs-4">Quantidade Mínima
           <input class="form-control" type="text" name="qmin">
          </div>
          <div class="col-xs-3">Cod. Comercial
           <input class="form-control" type="text" name="ccom">
          </div>
          <div class="col-xs-3">Cod. Projetos
           <input class="form-control" type="text" name="cpro">
          </div>
          <div class="col-xs-3">Cod. Almox
           <input class="form-control" type="text" name="calm">
          </div>  
          <div class="col-xs-3">Cod. Engenharia
           <input class="form-control" type="text" name="ceng">
          </div>
          <div class="col-xs-4">Fornecedor Padrão
           <select class="form-control" name="f1" required="required">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($ff1 = $F1->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $ff1['f_id'] ?>"><?php echo $ff1['f_Nome'] ?>
            </option>
            <?php endwhile; ?>
            <option value="0">Não informado</option>
           </select>
          </div>
          <div class="col-xs-4">Fornecedor2
           <select class="form-control" name="f2" required="required">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($ff2 = $F2->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $ff2['f_id'] ?>"><?php echo $ff2['f_Nome'] ?>
            </option>
            <?php endwhile; ?>
            <option value="0">Não informado</option>
           </select>
          </div>
          <div class="col-xs-4">Fornecedor Padrão
           <select class="form-control" name="f3" required="required">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($ff3 = $F3->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $ff3['f_id'] ?>"><?php echo $ff3['f_Nome'] ?>
            </option>
            <?php endwhile; ?>
            <option value="0">Não informado</option>
           </select>
          </div>
          <div class="col-xs-12">Observações
           <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
          </div>
          <input name="nitem" type="submit" class="btn btn-success btn-block" id="nitem" value="Finalizar Cadastro Inicial"  />
         </form>
          <?php
          if(@$_POST["nitem"])
          {
            $NomItem = $_POST['ni'];          //NOME DO ITEM
            $UniMedida = $_POST['un'];        //Unidade de Medida
            $QuantMinima = $_POST['qmin'];    //Unidade de Medida
            $CodCom = $_POST['ccom'];         //(es_c4)CÓD. DO COMERCIAL
            $CodPro = $_POST['cpro'];         //(es_c3)CÓD. DO PROJETOS 
            $CodAlm = $_POST['calm'];         //(es_c2)CÓD. DO ALMOXARIFADO
            $CodEng = $_POST['ceng'];         //(es_c1)CÓD. DA ENGENHARIA
            $For1 = $_POST['f1'];             //(es_f1)FORNECEDOR1
            $For2 = $_POST['f2'];             //(es_f2)FORNECEDOR2
            $For3 = $_POST['f3'];             //(es_f3)FORNECEDOR3
            $Categ = $_POST['cat'];           //categoria
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));

            $Campos = "es_nome, es_DataCadastro, es_c1, es_c2, es_c3, es_c4, es_f1, es_f2, es_f3, es_cat, es_obs";
            
            $AddItem = $PDO->query("INSERT INTO cad_estoque ($Campos) VALUES ('$NomItem', '$dt', '$CodEng', '$CodAlm', '$CodPro', '$CodCom', '$For1', '#$For2', '$For3', '$Categ', '$Obs')");
             if($AddItem)
             {
              echo '
              <script type="text/JavaScript">alert("Peça Adicionada Com sucesso");
              location.href="dashboard.php"</script>';
             }
             else
             {
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
      <? } else { } ?>
 
      </div>
     </div>
     <div class="col-md-12">
      <div class="info-box">
       <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
         <thead>
         <tr>
          <th style="width: 10px">#</th>
          <th style="width: 10%">Almoxarifado</th>
          <th style="width: 10%">Comercial</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th style="width: 15px">Categoria</th>
          <th style="width: 60px">UN</th>
          <th style="width: 50px"></th>
         </tr>
        </thead>
        <tbody>
         <?php 
          while ($VCat = $Catt->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VCat['id'] . '</td>';
            echo '<td>' . $VCat['es_c2'] . '</td>';
            echo '<td>' . $VCat['es_c4'] . '</td>';
            echo '<td>' . $VCat['es_nome'] . '</td>';
            echo '<td>' . $VCat['es_obs'] . '</td>';
            echo '<td>' . $VCat['es_cat'] . '</td>';
            echo '<td>' . $VCat['es_un'] . '</td>';
            echo '<td><a class="btn btn-success btn-block btn-xs" href="';
            echo "javascript:abrir('vProduto.php?ID=" . $VCat['id'] . "');";
            echo '"><i class="fa fa-search"> </i></a></td>';
           echo '</tr>';
           endwhile;
         ?>
        </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
    <?php } else { ?>
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
  var width = 1200;
  var height = 650;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
</body>
</html>
