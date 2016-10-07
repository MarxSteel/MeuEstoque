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
   $dFor = $PDO->prepare("SELECT * FROM cad_estoque WHERE id='$CodAt'");
   $dFor->execute();
    $campo = $dFor->fetch();
    $nomeProduto = $campo['es_nome'];
    $Atendente = $campo['es_nome'];
    $For1 = $campo['es_f1'];
    $For2 = $campo['es_f2'];
    $For3 = $campo['es_f3'];
    $Revisao = $campo['es_rev'];
    $Categoria = $campo['es_cat'];
    $fto = $campo['es_img'];
    $C1 = $campo['es_c1'];
    $C2 = $campo['es_c2'];
    $C3 = $campo['es_c3'];
    $C4 = $campo['es_c4'];
    $DataCad = $campo['es_DataCadastro'];
    $EstoqueMinimo = $campo['es_minimo'];
    $Obs = $campo['es_obs'];

    $Revenda = $campo['es_nome'];
    $Tipo = $campo['es_nome'];
    $DtCadastro = $campo['es_nome'];
    $TipoSuporte = $campo['es_nome'];
    $St = $campo['es_nome'];
    $Sol = $campo['es_nome'];
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
      <h3 class="box-title">Detalhe do Produto: 
      <code><?php echo $CodAt; ?></code>
      <strong><?php echo $nomeProduto; ?></strong></h3>
      <small class="pull-right">Data de Cadastro: <?php echo $DataCad; ?></small>

     </div>
     <div class="box-body">
     <div class="col-xs-4">
      <li class="list-group-item">
       <b>Produto:</b>
        <a class="pull-right"><?php echo $Revenda; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Revisão:</b>
        <a class="pull-right"><?php echo $Revisao; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Categoria:</b>
        <a class="pull-right"><?php echo $Categoria; ?></a>
      </li>
     </div>
     <div class="col-xs-5">
      <li class="list-group-item">
       <b>Fornecedor 1:</b>
        <a class="pull-right"><?php echo $For1; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Fornecedor 2:</b>
        <a class="pull-right"><?php echo $For2; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Fornecedor 3:</b>
        <a class="pull-right"><?php echo $For3; ?></a>
      </li>
     </div>
     <div class="col-xs-3">
      <li class="list-group-item">
       <img src="imagens/<?php echo $fto; ?>" width="150" />
      </li>
     </div>
     <div class="col-xs-12"><h4>Lista de Códigos</h4></div>
     <div class="col-xs-4">
      <li class="list-group-item">
       <b>Cod. Engenharia</b>
        <a class="pull-right"><?php echo $C1; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Cod. Almoxarifado:</b>
        <a class="pull-right"><?php echo $C2; ?></a>
      </li>
     </div>
     <div class="col-xs-4">
      <li class="list-group-item">
       <b>Cod. Comercial:</b>
        <a class="pull-right"><?php echo $C4; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Estoque Mínimo</b>
        <a class="pull-right"><?php echo $EstoqueMinimo; ?></a><br />
      </li>
     </div>
     <div class="col-xs-4">
      <li class="list-group-item">
       <b>Cod. Projetos:</b>
        <a class="pull-right"><?php echo $C3; ?></a>
      </li>
      <li class="list-group-item">
       <b>Preço:</b>
        <a class="pull-right"><?php echo $C4; ?></a><br />
      </li>
     </div>
     <div class="col-xs-12"><h4>Detalhes do Produto</h4></div>
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