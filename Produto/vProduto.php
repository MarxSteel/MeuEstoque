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
    $valor = $campo['es_preco'];
    $Obs = $campo['es_obs'];
    $dataAtual = date('d/m/Y H:i:s');
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
<style type="text/css">
    a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
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
     <div class="col-md-4 col-xs-12">
      <li class="list-group-item">
       <b>Produto:</b>
        <a class="pull-right"><?php echo $nomeProduto; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Revisão:</b>
        <a class="pull-right"><?php echo $Revisao; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Categoria:</b>
        <a class="pull-right"><?php echo $Categoria; ?></a>
      </li>
      <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#modalFoto">
      ATUALIZAR FOTO
      </button>
     </div>
     <div class="col-md-5 col-xs-12">
      <li class="list-group-item">
       <b>Forn. 1:</b>
        <a class="pull-right"><?php echo $For1; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Forn. 2:</b>
        <a class="pull-right"><?php echo $For2; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Forn. 3:</b>
        <a class="pull-right"><?php echo $For3; ?></a>
      </li>
      <li class="list-group-item">
       <div class="col-md-6 col-xs-12">
        <button type="button" class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modalFoto">
        PROJETO
        </button>
       </div>
       <div class="col-md-6 col-xs-12">
        <button type="button" class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#modalFoto">
        ENGENHARIA
        </button>
       </div><br />
      </li>
     </div>
     <div class="col-md-3 col-xs-12">
      <li class="list-group-item">
       <img class="fancybox" src="imagens/<?php echo $fto; ?>" class="img-responsive" width="100%"  data-big="imagens/<?php echo $fto; ?>" />
       Clique para Expandir
      </li>
     </div>
     <div class="col-xs-12"><h4>Lista de Códigos</h4></div>
     <div class="col-xs-12 col-md-6">
      <li class="list-group-item">
       <b>Cod. Engenharia</b>
        <a class="pull-right"><?php echo $C1; ?></a><br />
      </li>
      <li class="list-group-item">
       <b>Cod. Almoxarifado:</b>
        <a class="pull-right"><?php echo $C2; ?></a>
      </li>
      <li class="list-group-item">
       <b>Cod. Comercial:</b>
        <a class="pull-right"><?php echo $C4; ?></a><br />
      </li>
     </div>
     <div class="col-xs-12 col-md-6">
      <li class="list-group-item">
       <b>Estoque Mínimo</b>
        <a class="pull-right"><?php echo $EstoqueMinimo; ?>
         <button type="button" class="btn bg-black btn-xs pull-right" data-toggle="modal" data-target="#trocaEstoque"><i class="fa fa-refresh"></i> </button>
        </a><br />
      </li>
      <li class="list-group-item">
       <b>Cod. Projetos:</b>
        <a class="pull-right"><?php echo $C3; ?></a>
      </li>
      <li class="list-group-item">
       <b>Preço:</b>
        <a class="pull-right">
         <code><?php echo number_format($valor, 2, ',', '.'); ?></code>
          <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#trocaPreco"><i class="fa fa-refresh"></i> </button>
        </a>
       <br />
      </li>
     </div>
     <div class="col-xs-12"><h4>Detalhes do Produto</h4></div>
     <div class="col-xs-12">
      <li class="list-group-item">
      <?php echo $Obs; ?>
      </li>
     </div>

<!-- Modal de Cadastro de foto-->
<div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ATUALIZAR FOTO</h4>
      </div>
      <div class="modal-body">
       <div class="col-xs-5">
        <li class="list-group-item">Foto Atual
         <img src="imagens/<?php echo $fto; ?>" width="150"/>
        </li>
       </div>
       <div class="col-xs-7">
       <form method="post" enctype="multipart/form-data" action="">
       Selecione uma imagem: <input name="arquivo" type="file" />
        <br />
          <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Atualizar Foto" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
<?php
// verifica se foi enviado um arquivo 
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{
  $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
  $nome = $_FILES['arquivo']['name'];
  // Pega a extensao
  $extensao = strrchr($nome, '.');
  // Converte a extensao para mimusculo
  $extensao = strtolower($extensao);
  // Somente imagens, .jpg;.jpeg;.gif;.png
  // Aqui eu enfilero as extesões permitidas e separo por ';'
  // Isso server apenas para eu poder pesquisar dentro desta String
  if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
  {
    // Cria um nome único para esta imagem
    // Evita que duplique as imagens no servidor.
    $novoNome = md5(microtime()) . $extensao;
    
    // Concatena a pasta com o nome
    $destino = 'imagens/' . $novoNome; 
    
    // tenta mover o arquivo para o destino
    if( @move_uploaded_file( $arquivo_tmp, $destino  ))
    {
      $executa = $PDO->query("UPDATE cad_estoque SET es_img='$novoNome' WHERE id='$CodAt'");
      if($executa){
      echo '
        <script type="text/JavaScript">
        alert("Atualizado com sucesso!");
      location.href="vProduto.php?ID=' . $CodAt . '"</script>';
      }
    }
    else
  echo '
    <script type="text/JavaScript">
  alert("Erro! Cod.: 1x02");
  location.href="vProduto.php?ID=' . $CodAt . '"</script>';
  }
  else
      echo '
    <script type="text/JavaScript">
  alert("Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />");
  location.href="vProduto.php?ID=' . $CodAt . '"</script>';
}
else
{
}
?>
       </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>  
<!-- Fim do modal de cadastro de foto -->
<!-- Modal de Cadastro de foto-->
<div class="modal fade" id="modalDocto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        Novo Documento
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  
<!-- Fim do modal de cadastro de foto -->
<?php include_once 'ModalEdita.php'; ?>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
</body>
</html>