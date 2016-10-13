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
   	 <h4>Preço Atual: R$<?php echo number_format($valor, 2, ',', '.'); ?></h4>
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
       	$AtValor = $PDO->query("UPDATE cad_estoque SET es_preco='$Valorf' WHERE id='$CodAt'");
       	if ($Valorf) {
       	 $prAnt = number_format($valor, 2, ',', '.');
       	 $prNovo = number_format($Valorf, 2, ',', '.');
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
   	 <h4>Estoque Atual: <?php echo $EstoqueMinimo; ?></h4>
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
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_minimo='$novoEstoque' WHERE id='$CodAt'");
       if ($atEstoque) {
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
     <h4>Código atual: <?php echo $C1; ?></h4>
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
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c1='$novoEng' WHERE id='$CodAt'");
       if ($atEstoque) {
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
     <h4>Código atual: <?php echo $C2; ?></h4>
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
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c2='$novoAlm' WHERE id='$CodAt'");
       if ($atEstoque) {
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
     <h4>Código atual: <?php echo $C4; ?></h4>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Comercial</strong></span>
        <input type="text" name="ccom" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="codCom" type="submit" class="btn bg-maroon btn-flat" id="codCom" value="ATUALIZAR CÓDIGO DO COMERCIAL"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["codCom"]){
     $novoCom = $_POST['ccom'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c4='$novoCom' WHERE id='$CodAt'");
       if ($atEstoque) {
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
     <h4>Código atual: <?php echo $C3; ?></h4>
     </div>
      <div class="col-xs-12">Novo Código
       <div class="input-group">
        <span class="input-group-addon"><strong>Código Projetos</strong></span>
        <input type="text" name="proj" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="codProj" type="submit" class="btn bg-orange btn-flat" id="codProj" value="ATUALIZAR CÓDIGO DO COMERCIAL"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["codProj"]){
     $novoProj = $_POST['proj'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_c3='$novoProj' WHERE id='$CodAt'");
       if ($atEstoque) {
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
<!-- ALTERA NOME DO PRODUTO -->
<div id="nomeProduto" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Nome</h4>
   </div>
   <div class="modal-body">
    <form name="nnome" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h4>Nome Atual: <br /> <?php echo $nomeProduto; ?></h4>
     </div>
      <div class="col-xs-12">
       <div class="input-group">
        <span class="input-group-addon"><strong>Novo Nome</strong></span>
        <input type="text" name="newnome" required="required" class="form-control">
       </div>
      </div>
     <div class="col-xs-12">
     <h4>Revisão Atual:<br /> <?php echo $Revisao; ?></h4>
     </div>
      <div class="col-xs-12">
       <div class="input-group">
        <span class="input-group-addon"><strong>Revisão</strong></span>
        <input type="text" name="novarev" required="required" class="form-control">
       </div>
      </div>
     <div class="pull-right"><br />
      <input name="nnome" type="submit" class="btn btn-success btn-flat" id="nnome" value="ATUALIZAR NOME DO PRODUTO"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["nnome"]){
     $novoNome = $_POST['newnome'];
     $novoRev = $_POST['novarev'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_nome='$novoNome', es_rev='$novoRev' WHERE id='$CodAt'");
       if ($atEstoque) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 307 (Nome+RevisãoAtualizado)";
        $Det4 = "<strong> Nome Anterior: </strong>" . $nomeProduto . "<br />";
        $Det5 = "<strong> Novo Nome: </strong>" . $novoNome . "<br />";
        $Det6 = "<strong> Revisão Anterior: </strong>" . $Revisao . "<br />";
        $Det7 = "<strong> Revisão Nova: </strong>" . $novoRev . "<br />";
        
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5 . $Rev6 . $Rev7;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '307', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("NOME ATUALIZADO!");
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
<!-- ALTERA NOME DO PRODUTO -->
<!-- ALTERA CATEGORIA -->
<div id="Categoria" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-teal">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Categoria</h4>
   </div>
   <div class="modal-body">
    <?php
    $QryCategoria = "SELECT * FROM categoria WHERE Status='1'";
    // seleciona os registros
    $stmt4 = $PDO->prepare($QryCategoria);
    $stmt4->execute();
    ?>
    <form name="ncat" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h4>Categoria Atual: <br /> <?php echo $Categoria; ?></h4>
     </div>
      <div class="col-xs-12">Nova Categoria
       <select class="form-control" name="novaCat" required="required">
        <option value="" selected="selected">SELECIONE</option>
         <?php while ($user3 = $stmt4->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $user3['Categoria'] ?>"><?php echo $user3['Categoria'] ?>
        </option>
       <?php endwhile; ?>
       </select>
      </div>
     <div class="pull-right"><br />
      <input name="ncat" type="submit" class="btn bg-teal btn-flat" id="ncat" value="ATUALIZAR CATEGORIA"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["ncat"]){
     $novaCat = $_POST['novaCat'];
      $atEstoque = $PDO->query("UPDATE cad_estoque SET es_cat='$novaCat' WHERE id='$CodAt'");
       if ($atEstoque) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 308 (Categoria Editada)";
        $Det4 = "<strong> Categoria Anterior: </strong>" . $Categoria . "<br />";
        $Det5 = "<strong> Categoria Nova: </strong>" . $novaCat . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '308', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("Categoria Atualizada!");
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
<!-- ALTERA CATEGORIA -->
<!-- TROCA FORNECEDOR 1 -->
<div id="For1" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Categoria</h4>
   </div>
   <div class="modal-body">
    <?php
     $ChamaFornecedor = "SELECT * FROM fornecedor";
     $F1 = $PDO->prepare($ChamaFornecedor);
     $F1->execute();
    ?>
    <form name="f1" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h4>Categoria Atual: <br /> <?php echo $Categoria; ?></h4>
     </div>
      <div class="col-xs-12">Novo Fornecedor
       <select class="form-control" name="for1" required="required">
        <option value="" selected="selected">SELECIONE</option>
         <?php while ($ff1 = $F1->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $ff1['f_Nome'] ?>"><?php echo $ff1['f_Nome'] ?>
          </option>
         <?php endwhile; ?>
        <option value="0">Nenhum</option>
       </select>
      </div>
     <div class="pull-right"><br />
      <input name="f1" type="submit" class="btn bg-red btn-flat" id="f1" value="ATUALIZAR CATEGORIA"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["f1"]){
     $novoF1 = $_POST['for1'];
      $atFor1 = $PDO->query("UPDATE cad_estoque SET es_f1='$novoF1' WHERE id='$CodAt'");
       if ($atFor1) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 309 (FORNECEDOR 1 ATUALIZADO)";
        $Det4 = "<strong> Fornecedor Anterior: </strong>" . $For1 . "<br />";
        $Det5 = "<strong> Fornecedor Novo: </strong>" . $novoF1 . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '309', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("FORNECEDOR ATUALIZADO!");
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
<!-- TROCA FORNECEDOR 1 -->
<!-- TROCA FORNECEDOR 2 -->
<div id="For2" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-orange">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Categoria</h4>
   </div>
   <div class="modal-body">
    <?php
     $ChamaFornecedor = "SELECT * FROM fornecedor";
     $F2 = $PDO->prepare($ChamaFornecedor);
     $F2->execute();
    ?>
    <form name="f2" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h4>Categoria Atual: <br /> <?php echo $Categoria; ?></h4>
     </div>
      <div class="col-xs-12">Novo Fornecedor
       <select class="form-control" name="for2" required="required">
        <option value="" selected="selected">SELECIONE</option>
         <?php while ($ff2 = $F2->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $ff2['f_Nome'] ?>"><?php echo $ff2['f_Nome'] ?>
          </option>
         <?php endwhile; ?>
        <option value="0">Nenhum</option>
       </select>
      </div>
     <div class="pull-right"><br />
      <input name="f2" type="submit" class="btn bg-orange btn-flat" id="f2" value="ATUALIZAR CATEGORIA"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["f2"]){
     $novoF2 = $_POST['for2'];
      $atFor2 = $PDO->query("UPDATE cad_estoque SET es_f2='$novoF2' WHERE id='$CodAt'");
       if ($atFor2) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 310 (FORNECEDOR 2 ATUALIZADO)";
        $Det4 = "<strong> Fornecedor Anterior: </strong>" . $For2 . "<br />";
        $Det5 = "<strong> Fornecedor Novo: </strong>" . $novoF2 . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '310', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("FORNECEDOR ATUALIZADO!");
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
<!-- TROCA FORNECEDOR 2 -->
<!-- TROCA FORNECEDOR 3 -->
<div id="For3" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Categoria</h4>
   </div>
   <div class="modal-body">
    <?php
     $ChamaFornecedor = "SELECT * FROM fornecedor";
     $F3 = $PDO->prepare($ChamaFornecedor);
     $F3->execute();
    ?>
    <form name="f3" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">
     <h4>Categoria Atual: <br /> <?php echo $Categoria; ?></h4>
     </div>
      <div class="col-xs-12">Novo Fornecedor
       <select class="form-control" name="for3" required="required">
        <option value="" selected="selected">SELECIONE</option>
         <?php while ($ff3 = $F3->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $ff3['f_Nome'] ?>"><?php echo $ff3['f_Nome'] ?>
          </option>
         <?php endwhile; ?>
        <option value="0">Nenhum</option>
       </select>
      </div>
     <div class="pull-right"><br />
      <input name="f3" type="submit" class="btn btn-primary btn-flat" id="f3" value="ATUALIZAR CATEGORIA"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["f3"]){
     $novoF3 = $_POST['for3'];
      $atFor3 = $PDO->query("UPDATE cad_estoque SET es_f3='$novoF3' WHERE id='$CodAt'");
       if ($atFor3) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 311 (FORNECEDOR 3 ATUALIZADO)";
        $Det4 = "<strong> Fornecedor Anterior: </strong>" . $For3 . "<br />";
        $Det5 = "<strong> Fornecedor Novo: </strong>" . $novoF3 . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '311', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("FORNECEDOR ATUALIZADO!");
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
<!-- TROCA FORNECEDOR 3 -->
<!-- MODAL DE ATUALIZAR DESCRIÇÃO -->
<!-- TROCA FORNECEDOR 3 -->
<div id="obs" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-default">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR OBSERVAÇÕES</h4>
   </div>
   <div class="modal-body">
    <div class="col-xs-12">Observação Anterior
     <li class="list-group-item">
      <i class="texto">
      <?php echo $Obs; ?>
      </i>
     </li>
    </div>
    <form name="nobs" id="nnome" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Nova Observação
     <textarea name="obs" cols="45" rows="3" class="form-control" id="obs" required="required"></textarea><hr>
     </div>
     <div class="pull-right"><br />
      <input name="nobs" type="submit" class="btn btn-primary btn-flat" id="nobs" value="ATUALIZAR OBSERVAÇÃO"  /> 
      <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
     if(@$_POST["nobs"]){
      $nObs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));

      $atObs = $PDO->query("UPDATE cad_estoque SET es_obs='$nObs' WHERE id='$CodAt'");
       if ($atObs) {
        $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
        $Det2 = "Data da Atualização: " . $dataAtual . "<br/>";
        $Det3 = "Cód. Evento: 318 (OBSERVAÇÃO ATUALIZADA)";
        $Det4 = "<strong> Observação Anterior: </strong>" . $Obs . "<br />";
        $Det5 = "<strong> Nova Observação: </strong>" . $nObs . "<br />";
        $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5;
         $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '318', '$dataAtual', '$nOb')");
          if ($NovoLog)
          {
           echo '<script type="text/JavaScript">alert("OBSERVAÇÃO ATUALIZADA!");
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
<!-- TROCA FORNECEDOR 3 -->
<!-- MODAL DE ATUALIZAR DESCRIÇÃO -->


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