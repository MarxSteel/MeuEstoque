<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];
   


    $chamaProd = "SELECT * FROM cad_estoque";
     $prod = $PDO->prepare($chamaProd);
     $prod->execute();
   

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
<body class="hold-transition <?php echo $cor; ?> layout-top-nav">
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
    <h1>Árvore de Produtos> Adicionar novo Item
     <small><?php echo $Titulo; ?></small>
    </h1>
   </section>
   <section class="content">
    <div class="box box-default">
     <div class="box-header with-border">
      <h3 class="box-title">Cabeçalho</h3>
     </div>
     <div class="box-body">
       <table id="arvore" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th style="width: 10px">#</th>
          <th style="width: 10%">Comercial</th>
          <th style="width: 10%">Almoxarifado</th>
          <th>Nome</th>
          <th style="width: 20px">Modelo</th>
          <th style="width: 10px">Quantidade</th>
          <th style="width: 50px"></th>
         </tr>
        </thead>
        <tbody>
        <?php while ($vp = $prod->fetch(PDO::FETCH_ASSOC)): ?>
        <form name="<?php echo $vp['es_id']; ?>" id="<?php echo $vp['es_id']; ?>" method="post" action="" enctype="multipart/form-data">
  
         <tr>
          <td><?php echo $vp['es_c2']; ?></td>
          <td><?php echo $vp['es_c2']; ?></td>
          <td><?php echo $vp['es_c2']; ?></td>
          <td><?php echo $vp['es_c2']; ?></td>
          <td><?php echo $vp['es_c2']; ?></td>
          <td><input class="form-control" type="num" name="qnt" placeholder="00"></td>
          <td><input name="t" type="submit" class="btn btn-success btn-block" value="ADD"  /></td>
         </tr>
        </form> 
        <?php
         if(@$_POST["t"])
         {
         $adQuant = $_POST["qnt"];
         echo '<script type="text/JavaScript">alert(" '. $adQuant . '");';
         }
        ?>
        <?php endwhile; ?>
        </tbody>
       </table>
      

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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $("#arvore").DataTable();
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
