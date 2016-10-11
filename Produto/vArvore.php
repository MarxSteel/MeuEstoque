<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];

   $IDModelo = $_GET['ID'];
   $mod = $PDO->prepare("SELECT * FROM arvore_prod WHERE ap_id='$IDModelo'");
   $mod->execute();
    $dmod = $mod->fetch();
    $NomeMod = $dmod['ap_Nome'];
    $FotoMod = $dmod['img'];
    $DataCadastrado = $dmod['ap_DataCadastro'];
    $Obs = $dmod['ap_Obs'];

$ChamaDado = "SELECT * FROM arvore_lista WHERE idModelo='$IDModelo'";
$Catt = $PDO->prepare($ChamaDado);
$Catt->execute();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Titulo; ?></title>
  <meta http-equiv="Content-Language" content="pt-br">  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <style type="text/css">
.texto {
word-wrap: break-word;
}
</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
 <header class="main-header">
  <nav class="navbar navbar-static-top">
   <div class="container">
    <div class="navbar-header">
     <img src="../dist/img/logo/logoWhite.png" width="180" />
    </div>
    <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/user/<?php echo $foto; ?>" class="user-image">
        <span class="hidden-xs">Olá, <?php echo $NomeUserLogado; ?></span>
       </a>
      </li>
     </ul>
    </div>
   </div>
  </nav>
 </header>
 <div class="content-wrapper">
  <div class="container">
   <section class="content-header">
    <h4>Produtos > Árvore de Produto > Ver Árvore de Produto
     <small><?php echo $Titulo; ?></small>
    </h4>
   </section>
   <section class="content">
    <div class="col-xs-4">
     <div class="box box-default">
      <div class="box-body">
      <img src="imagens/<?php echo $FotoMod; ?>" width="100%"><br />
      <h4>
      <strong>Modelo: </strong><?php echo $NomeMod; ?><br/>
      <strong>Data de Cadastro: </strong><?php echo $DataCadastrado; ?><br/>
      <strong>Observações: </strong><br/>
      </h4>
       <li class="list-group-item">
        <i class="texto">
         <?php echo $Obs; ?>
        </i>
       </li>
      </div>
     </div>
    </div>
    <div class="col-xs-8">
     <div class="box box-default">
      <div class="box-header with-border">
       <h3 class="box-title">Árvore de Produtos</h3>
      </div>
      <div class="box-body">
      
        <table id="listaArvore" class="table table-bordered table-striped">
         <thead>
         <tr>
          <th style="width: 5%">#</th>
          <th style="width: 25%">ID peça</th>
          <th style="width: 50%">Peça</th>
          <th style="width: 20%">Quantidade</th>
         </tr>
        </thead>
        <tbody>
         <?php 
          while ($VCat = $Catt->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VCat['id'] . '</td>';
            echo '<td>' . $VCat['idPeca'] . '</td>';
            echo '<td>' . $VCat['nomePeca'] . '</td>';
            echo '<td>' . $VCat['qt'] . '</td>';
           echo '</tr>';
           endwhile;
         ?>
        </tbody>
        </table>
      </div>
     </div>
    </div>
   </section>
  </div>
 </div>
<?php include_once '../footer.php'; ?>
</div>
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
    $("#listaArvore").DataTable();
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
</body>
</html>
