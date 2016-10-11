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
   <section class="content">
    <div class="col-xs-4">
     <div class="box box-default">
      <div class="box-body">
      <img src="imagens/<?php echo $FotoMod; ?>" width="100%"><br />
      <button type="button" class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg">AMPLIAR</button>
      <button type="button" class="btn btn-default btn-xs btn-block" data-toggle="modal" data-target="#trocaFoto">
       TROCAR FOTO
      </button>
      <h4>
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
       <h3 class="box-title"><?php echo $NomeMod; ?> - Árvore de Produtos</h3>
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
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
        <div class="col-xs-12">
        <img src="imagens/<?php echo $FotoMod; ?>" width="100%">
        </div>
       </div>
      </div>
     </div>


<!-- MODAL DE TROCA DE FOTO -->
<div class="modal fade" id="trocaFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TROCANDO FOTO</h4>
      </div>
      <div class="modal-body">
       <div class="col-xs-4">Foto Atual:
        <li class="list-group-item">
        <img src="imagens/<?php echo $FotoMod; ?>" width="100%">
        </li>
       </div>
       <div class="col-xs-8">
        <form action="#" method="POST" enctype="multipart/form-data">
         <input type="file" name="fileUpload"><br /><br /><br />
         <input type="submit"  class="btn btn-default" value="ATUALIZAR FOTO">
       </form>
       </div>
       <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <?php
       if(isset($_FILES['fileUpload']))
       {
        date_default_timezone_set("Brazil/East"); 
          $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); 
          $novonomi = date("Y.m.d-H.i.s"); 
          $new_name = md5($novonomi) . $ext;
          $dir = 'imagens/'; //Diretório para uploads
          move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); 
        

        $NovaFoto = $PDO->query("UPDATE arvore_prod SET img='$new_name' WHERE ap_id='$IDModelo'");
         if ($NovaFoto) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 403 (Foto de Produto Atualizada)";
        $nOb = $Det1 . $Det2 . $Det3;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '403', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("foto atualizada!");
              location.href="vArvore.php?ID=' . $IDModelo . '"</script>';
          }
        }
      }
?>


      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE FOTO -->
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
