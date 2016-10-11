<?php
 require("../restritos.php"); 
 require_once '../init.php';
 $PDO = db_connect();
  $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
  $query->execute();
   $row = $query->fetch();
   $NomeUserLogado = $row['Nome'];
   $foto = $row['Foto'];
   
   $NomeModelo = $_GET['MOD'];
   $IDModelo = $_GET['ID'];

    $chamaProd = "SELECT * FROM cad_estoque";
     $prod = $PDO->prepare($chamaProd);
     $prod->execute();
      $dataAgora = date('d/m/Y H:i:s');

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
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
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
          <th style="width: 50px">Quantidade</th>
          <th style="width: 50px"></th>
        </tr>
        </thead>
        <tbody>
         <?php 
          while ($p = $prod->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            $id = $p['id'];
            $Nome = $p['es_nome'];
            $Com = $p['es_c4'];
            $Comp = $p['es_c2'];
            echo '<td>' . $id . '</td>';
            echo '<td>' . $Com . '</td>';
            echo '<td>' . $Comp . '</td>';
            echo '<td>' . $Nome . '</td>';
            echo '<td>' . $Nome . '</td>';
            echo '<td>' . $p['es_c2'] . '</td>';
            echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $Nome . '" data-idvalue="' . $id . '" data-botao="ADICIONAR PEÇA">ADD</button></td>';
           echo '</tr>';
           endwhile;
         ?>
        </tbody>
        </table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       <form name="adProd" id="adProd" method="post" action="" enctype="multipart/form-data">
       <div class="col-xs-3">ID
        <div class="modal-valor">
         <input type="text" class="form-control" name="IDP" id="modal-valor">
        </div>
       </div>
       <div class="col-xs-6">Nome do item
        <div class="modal-titulo">
         <input type="text" class="form-control" name="nome" id="modal-titulo">
        </div>
       </div>
       <div class="col-xs-3">Quantiadade
         <input type="number" class="form-control" name="quant" required>
       </div>
       <br /><br /><br /><br />
       <div class="modal-botao">
       <input name="adProd" type="submit" class="btn btn-danger btn-block" id="adProd"></div>
      </form>
             <?php
        if(@$_POST["adProd"])
        {
        $nProd = $_POST['nome']; //NOME DO PRODUTO
        $iProd = $_POST['IDP']; //ID DO PRODUTO
        $quant = $_POST['quant']; //QUANTIDADE DE PEÇAS
         $CadLista = $PDO->query("INSERT INTO arvore_lista (nomePeca, idPeca, qt, modelo, idModelo, DataCadastro) VALUES ('$nProd', '$iProd', '$quant', '$NomeModelo', '$IDModelo', '$dataAgora')");
         if ($CadLista) {
          $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
          $Det2 = "Data da Atualização: " . $dataAgora . "<br/>";
          $Det3 = "Cód. Evento: 401 (Adicionado Item á Lista)";
          $Det4 = "<strong> Peça: </strong>" . $iProd . " " . $nProd . "<br />";
          $Det6 = "<strong> Modelo: </strong>" . $NomeModelo . "<br />";
        
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5 . $Rev6;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '401', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("ADICIONADO!");
              location.href="adArvore.php?ID=' . $IDModelo . '&MOD=' . $NomeModelo . '"</script>';
          }
        }
        else
        {

        }
      }
        ?>
      </div>
    </div>
  </div>
</div>    

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
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var idvalor = button.data('idvalue') 
  var botao = button.data('botao')
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  modal.find('.modal-valor input').val(idvalor)
  modal.find('.modal-botao input').val(botao)
  modal.find('.modal-titulo input').val(recipient)
})

</script>

</body>
</html>
