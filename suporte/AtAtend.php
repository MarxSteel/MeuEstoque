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
    $dt = date('d/m/Y H:i:s');

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
     <?php
     if ($CodAt === '1') {
       echo $NAtAtend;
     }
     else{
     ?>
      <div class="col-xs-8"><strong>Revenda:</strong>
      <?php echo $Revenda; ?>
      </div>
      <div class="col-xs-4"><strong>Data de Cadastro:</strong>
      <?php echo $DtCadastro; ?>
      </div>
      <div class="col-xs-4"><strong>Atendente:</strong>
      <?php echo $Atendente; ?>
      </div>
      <div class="col-xs-3"><strong>Tipo:</strong>
      <?php 
        if ($TipoSuporte === "1") {
          echo "ATENDIMENTO";
        }
        elseif ($TipoSuporte === "2") {
          echo "RETORNO DE ASSISTENCIA";
        }
        elseif ($TipoSuporte === "3") {
          echo "PEÇA";
        } 
        else{

        }
      ?>
      </div>
      <div class="col-xs-5"><strong>Status de Atend.:</strong>
      <?php 
        if ($St === "1") {
          echo "SOLUCIONADO";
        }
        elseif ($St === "2") {
          echo "NÃO SOLUCIONADO (ENVIADO À HENRY)";
        }
        elseif ($St === "3") {
          echo "PENDENTE";
        } 
        elseif ($St === "4") {
          echo "NÃO SOLUCIONADO";
        } 
        else{

        }
      ?>
      </div>
      <div class="col-xs-12">
        <h3>Atendimento</h3>
      </div>
      <div class="col-xs-6">Descrição
       <li class="list-group-item">
        <?php echo $Obs; ?>
       </li>
      </div>
      <div class="col-xs-6">Atendimento
       <li class="list-group-item">
        <?php echo $Sol; ?>
       </li>
      </div>
      <div class="col-xs-12">
        <h3>Revisão</h3>
      </div>
     <form name="AttAtend" id="AtAtend" method="post" action="" enctype="multipart/form-data">
      <div class="col-xs-7 form-group">Status do Atendimento
       <select class="form-control" name="status" required="required">
        <option value="" selected="selected">SELECIONE</option>
        <option value="1">Solucionado</option>
        <option value="2">Não Solucionado (encaminhado à Henry)</option>
        <option value="3">Pendente</option>
        <option value="4">Não Solucionado</option>
       </select>
      </div>
      <div class="col-xs-5">Nova Data
      <input type="text" class="form-control" disabled placeholder="<?php echo $dt; ?>">
      </div>
      <div class="col-xs-12"><strong>Descrição</strong>
       <textarea name="sol" cols="45" rows="3" class="form-control"></textarea><hr>
      </div>
      <div class="pull-right">
       <input name="Tsenha" type="submit" class="btn bg-aqua" id="Tsenha" value="ATUALIZAR ATENDIMENTO"  /> 
      </div>
     </form>
     <?php 
      if(@$_POST["Tsenha"]){
       $nRevenda = $_POST["nm"];
        $novoStatus = $_POST["status"];
        $Dado = "<br /><strong>Novo Atendimento: </strong><br />Data: " . $dt . " <code>" . $NomeUserLogado . "</code>: <br /> ";
        $NovaObs = str_replace("\r\n", "<br/>", strip_tags($_POST["sol"]));
        $Valor = $Sol . $Dado . $NovaObs;
        $vLog = "ATUALIZADO ATENDIMENTO:<br />" . $Valor;
        $Atualiza = $PDO->query("UPDATE suporte SET Status='$novoStatus', solucao='$Valor' WHERE id='$CodAt'");  
         if ($Atualiza) {
           echo '<script type="text/javascript">alert("Atualizado!");</script>';
           $SalvaLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '102', '$dt', '$vLog')");
           if ($SalvaLog) {
           echo '<script type="text/javascript">window.close();</script>';
           }
           else{
            echo '<script type="text/javascript">alert("ERRO AO SALVAR LOG");</script>';
           }
          }
          else{
           echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR");</script>';
          }
      }
     } ?>
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