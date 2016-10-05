<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];

   $cF = $_GET['ID'];
   $dFor = $PDO->prepare("SELECT * FROM fornecedor WHERE f_id='$cF'");
   $dFor->execute();
    $campo = $dFor->fetch();
    $NomeCompleto = $campo['f_Nome'];
    $Doc = $campo['f_CNPJ'];
    $Tipo = $campo['f_Tipo'];
    $DtCadastro = $campo['DataCadastro'];
    //DADOS DE ENDEREÇO
    $End = $campo['f_End'];
    $Num = $campo['f_Num'];
    $Bairro = $campo['f_Bairro'];
    $CEP = $campo['f_CEP'];
    $Cidade = $campo['f_Cidade'];
    $Estado = $campo['f_UF'];
    $Mail = $campo['f_Mail'];
    $F1 = $campo['f_Fone'];
    $F2 = $campo['f_Celular'];
    $Obs = $campo['Obs'];




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
</head>
<body class="hold-transition skin-red layout-top-nav">
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
   <section class="content">
    <div class="box box-default">
     <div class="box-header with-border">
      <h3 class="box-title">Fornecedores > Ver Fornecedor</h3>
       <small><?php echo $Titulo; ?></small>
     </div>
     <div class="box-body">
     <div class="col-xs-12"><h3><?php echo $NomeCompleto; ?></h3></div>
     <div class="col-xs-6">
      <li class="list-group-item">
       <b>Documento:</b>
        <a class="pull-right"><?php echo $Doc; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Data de Cadastro:</b>
        <a class="pull-right"><?php echo $DtCadastro; ?></a>
      </li>
      <li class="list-group-item">
       <?php 
        if ($Tipo === "1") {
          echo '<button href="#" class="btn bg-olive btn-block">
          FORNECEDOR NACIONAL</button>';
        }
        elseif ($Tipo === "2") {
          echo '<button href="#" class="btn bg-aqua btn-block">
          FORNECEDOR INTERNACIONAL</button>';
        }
        else{
        }
       ?>
      </li>
     </div>
     <div class="col-xs-6">
      <li class="list-group-item">
       <b>Endereço:</b>
       <a class="pull-right"><?php echo $End . ', ' . $Num; ?></a>
       <br />
       <b>Bairro / CEP:</b>
       <a class="pull-right"><?php echo $Bairro . ' / '. $CEP; ?></a>
       <br />
       <b>Cidade:</b>
       <a class="pull-right"><?php echo $Cidade . ' - ' . $Estado; ?></a>
       <br />
       <b>E-Mail:</b>
       <a class="pull-right"><?php echo $Mail; ?></a>
       <br />
       <b>Telefone 1:</b>
       <a class="pull-right"><?php echo $F1; ?></a>
       <br />
       <b>Telefone 2:</b>
       <a class="pull-right"><?php echo $F2; ?></a>
      </li>
     </div>
     <div class="col-xs-12"><h4>Observações</h4></div>
     <div class="col-xs-12">
      <li class="list-group-item">
      <?php echo $Obs; ?>
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
