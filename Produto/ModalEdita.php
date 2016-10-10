<!-- TROCAR PREÇO -->
<div id="trocaPreco" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-aqua-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Preço</h4>
   </div>
   <div class="modal-body">
   	<form name="trocaPreco" id="name" method="post" action="" enctype="multipart/form-data">
   	 <div class="col-xs-12">
   	 <h3>Preço Atual: R$<?php echo number_format($valor, 2, ',', '.'); ?></h3>
   	 </div>
      <div class="col-xs-12">Valor
       <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" name="novovalor" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="novoPreco" type="submit" class="btn bg-aqua btn-flat" id="novoPreco" value="ATUALIZAR PREÇO"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["novoPreco"]){
     $valor = $_POST['novovalor'];
       $pontos = '.';
       $virgula = ',';
       $result = str_replace($pontos, "", $valor);
       $Valorf = str_replace($virgula, ".", $result);
       	$AtValor = $PDO->query("UPDATE cad_estoque SET es_preco='$Valorf'");
       	if ($Valorf) {
       	 $prAnt = number_format($valor, 2, ',', '.');
       	 $prNovo = number_format($Valorf, 2, ',', '.');
       	 $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
       	 $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
       	 $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
       	 $Det3 = "Cód. Evento: 301 (Alteração de Preço)";
       	 $Det4 = "<strong> Preço Anterior: </strong>" . $prAnt . "<br />";
       	 $Det5 = "<strong> Preço Novo: </strong>" . $prNovo . "<br />";
       	 $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
      	 $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '301', '$dataAtual', '$nOb')");
      	  if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Peça Adicionada Com sucesso");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
       	}
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR PREÇO -->
<!-- ALTERA ESTOQUE MÍNIMO -->
<div id="trocaEstoque" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-black-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Estoque Mínimo</h4>
   </div>
   <div class="modal-body">
    <form name="trocaEstoque" id="name" method="post" action="" enctype="multipart/form-data">
   	 <div class="col-xs-12">
   	 <h3>Estoque Atual: <?php echo $EstoqueMinimo; ?></h3>
   	 </div>
      <div class="col-xs-12">Novo Estoque
       <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
        <input type="text" name="nest" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="trocaEstoque" type="submit" class="btn bg-black btn-flat" id="trocaEstoque" value="ATUALIZAR ESTOQUE MÍNIMO"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["trocaEstoque"]){
     $novoEstoque = $_POST['nest'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_minimo='$novoEstoque'");
       if ($atEstoque) {
        $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
       	$Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
       	$Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
       	$Det3 = "Cód. Evento: 302 (Alteração de estoque mínimo)";
       	$Det4 = "<strong> Minimo Anterior: </strong>" . $EstoqueMinimo . "<br />";
       	$Det5 = "<strong> Novo Mínimo: </strong>" . $novoEstoque . "<br />";
       	$nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
      	 $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '302', '$dataAtual', '$nOb')");
      	  if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Estoque Mínimo Atualizado!");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
       	}
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ALTERA ESTOQUE MÍNIMO -->
<!-- ALTERA CODIGO ENGENHARIA -->
<div id="codEng" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-olive">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Código da Engenharia</h4>
   </div>
   <div class="modal-body">
    <form name="trocaEstoque" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h3>Código atual: <?php echo $C1; ?></h3>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Engenharia</strong></span>
        <input type="text" name="ceng" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="codEng" type="submit" class="btn bg-olive btn-flat" id="codEng" value="ATUALIZAR CÓDIGO DA ENGENHARIA"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["codEng"]){
     $novoEng = $_POST['ceng'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c1='$novoEng'");
       if ($atEstoque) {
        $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 303 (Alterado Código da Engenharia)";
        $Det4 = "<strong> Código Anterior: </strong>" . $C1 . "<br />";
        $Det5 = "<strong> Novo Código: </strong>" . $novoEng . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '303', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Código Atualizado com Sucesso!");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
        }
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ALTERA CODIGO ENGENHARIA -->
<!-- ALTERA CÓDIGO DO ALMOXARIFADO -->
<div id="codAlm" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-purple">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Código do Almoxarifado</h4>
   </div>
   <div class="modal-body">
    <form name="trocaAlm" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h3>Código atual: <?php echo $C2; ?></h3>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Almoxarifado</strong></span>
        <input type="text" name="calm" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="trocaAlm" type="submit" class="btn bg-purple btn-flat" id="trocaAlm" value="ATUALIZAR CÓDIGO DO ALMOXARIFADO"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["trocaAlm"]){
     $novoAlm = $_POST['calm'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c2='$novoAlm'");
       if ($atEstoque) {
        $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 304 (Alterado Código do Almoxarifado)";
        $Det4 = "<strong> Código Anterior: </strong>" . $C1 . "<br />";
        $Det5 = "<strong> Novo Código: </strong>" . $novoAlm . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '304', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Código Atualizado com Sucesso!");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
        }
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ALTERA CÓDIGO DO ALMOXARIFADO -->
<!-- ALTERA CÓDIGO DO COMERCIAL -->
<div id="codCom" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-maroon">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Código do Comercial</h4>
   </div>
   <div class="modal-body">
    <form name="codCom" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h3>Código atual: <?php echo $C4; ?></h3>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Comercial</strong></span>
        <input type="text" name="calm" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="codCom" type="submit" class="btn bg-maroon btn-flat" id="codCom" value="ATUALIZAR CÓDIGO DO COMERCIAL"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["codCom"]){
     $novoCom = $_POST['calm'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c4='$novoCom'");
       if ($atEstoque) {
        $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 305 (Alterado Código do Comercial)";
        $Det4 = "<strong> Código Anterior: </strong>" . $C4 . "<br />";
        $Det5 = "<strong> Novo Código: </strong>" . $novoCom . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '305', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Código Atualizado com Sucesso!");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
        }
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ALTERA CÓDIGO DO COMERCIAL -->
<!-- ALTERA CÓDIGO DO PROJETOS -->
<div id="codProj" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-orange">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Código do Projetos</h4>
   </div>
   <div class="modal-body">
    <form name="codCom" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h3>Código atual: <?php echo $C3; ?></h3>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Projetos</strong></span>
        <input type="text" name="proj" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="codCom" type="submit" class="btn bg-orange btn-flat" id="codCom" value="ATUALIZAR CÓDIGO DO COMERCIAL"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["codCom"]){
     $novoProj = $_POST['proj'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c3='$novoProj'");
       if ($atEstoque) {
        $Det1 = "<strong>Nova Atulização de Preço: </strong><br />";
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 306 (Alterado Código do Projetos)";
        $Det4 = "<strong> Código Anterior: </strong>" . $C3 . "<br />";
        $Det5 = "<strong> Novo Código: </strong>" . $novoProj . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '306', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Código Atualizado com Sucesso!");
              location.href="vProduto.php?ID=' . $CodAt . '"</script>';
          }
        }
       } 
      ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ALTERA CÓDIGO DO COMERCIAL -->
<!-- MODAL DE EXEMPLO -->
<div id="modalnovo" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-aqua-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Preço</h4>
   </div>
   <div class="modal-body">
    

   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE EXEMPLO -->
>