<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];
   $CodAt = $_GET['ID'];
   $dFor = $PDO->prepare("SELECT * FROM suporte WHERE id='$CodAt'");
   $dFor->execute();
    $campo = $dFor->fetch();
    $Atendente = $campo['NomeTec'];
    $Revenda = $campo['Revenda'];
    $Tipo = $campo['NomeTec'];
    $DtCadastro = $campo['DataCadastro'];
    $TipoSuporte = $campo['TipoSup'];
    $St = $campo['Status'];
    $Obs = $campo['Atendimento'];
    $Sol = $campo['Solucao'];
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
  <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition <?php echo $cor; ?> layout-top-nav">
<div class="wrapper">
 <header class="main-header">
  <nav class="navbar navbar-static-top">
   <div class="container">
    <div class="navbar-header">
     <img src="../dist/img/logo/logoWhite.png" width="150" />
    </div>
    <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
       <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
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
   <section class="content">
    <div class="box box-default">
     <div class="box-header with-border">
      <h3 class="box-title">Suporte Técnico - Detalhes de Atendimento: <code><strong><?php echo $CodAt; ?></strong></code></h3>
     </div>
     <div class="box-body">
     <div class="col-xs-4">
      <li class="list-group-item">
       <b>Revenda:</b>
        <a class="pull-right"><?php echo $Revenda; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Atendente:</b>
        <a class="pull-right"><?php echo $Atendente; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Data de Cadastro:</b>
        <a class="pull-right"><?php echo $DtCadastro; ?></a>
      </li>
     </div>
     <div class="col-xs-4">
      <li class="list-group-item">
       <?php 
       if ($TipoSuporte === "1") {
         echo '<button class="btn btn-sm bg-purple btn-flat btn-block" href="#">ATENDIMENTO</button>';
       }
       elseif ($TipoSuporte === "2") {
         echo '<button class="btn btn-sm bg-navy btn-flat btn-block" href="#">RETORNO DE ASSISTENCIA</button>';
       }
       elseif ($TipoSuporte === "3") {
         echo '<button class="btn btn-sm bg-default btn-flat btn-block" href="#">RETORNO DE ASSISTENCIA</button>';
       }
       else{
       }
       ?>
      </li>
      <li class="list-group-item">
      </li>
      <li class="list-group-item">
      <?php 
      if ($St === "1") {
        echo '<button class="btn bg-green btn-sm btn-block btn-flat" href="#">SOLUCIONADO</button>';
      }
      elseif ($St === "2") {
        echo '<button class="btn btn-primary btn-sm btn-block btn-flat" href="#">ENCAMINHADO À HENRY</button>';
      }
      elseif ($St === "3") {
        echo '<button class="btn bg-orange btn-sm btn-block btn-flat" href="#">PENDENTE</button>';
      }
      elseif ($St === "4") {
        echo '<button class="btn bg-red btn-sm btn-block btn-flat" href="#">NÃO SOLUCIONADO</button>';
      } 
      else{
      }
      ?>
      </li>
     </div>
     <div class="col-xs-4">
           <li class="list-group-item">FOTO</li>

     </div>
     <div class="col-xs-12"><h4>Descrição do Problema</h4></div>
     <div class="col-xs-12">
      <li class="list-group-item">
      <?php echo $Obs; ?>
      </li>
     </div>
     <div class="col-xs-12"><h4>Orientação do Suporte</h4></div>
     <div class="col-xs-12">
      <li class="list-group-item">
      <?php echo $Sol; ?>
      </li>
     </div>
    </div>
   </section>
  </div>
 </div>
<?php include_once '../footer.php'; ?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>