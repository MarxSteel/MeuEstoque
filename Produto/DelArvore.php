<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];
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
    <h1>Produtos > Árvore de Produto > Desabilitar item
     <small><?php echo $Titulo; ?></small>
    </h1>
   </section>
   <section class="content">
    <div class="callout callout-danger">
    <h3>ATENÇÃO!</h3>
    <p>Ao desabilitar este item, o sistema não conseguirá listar mais este produto para pedidos de produção, relatórios e outras funções que dependam da leitura do mesmo. Têm certeza disto?</p>
    </div>
    <div class="box box-default">
     <div class="box-header with-border">
      <h3 class="box-title">Cabeçalho</h3>
     </div>
     <div class="box-body">
     Corpo de Conteúdo
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
