<?php

?>
<!-- MODAL DE CADASTRO DE PRODUTO -->
<div id="NovoProduto" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-purple-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastro de Produto</h4>
   </div>
   <div class="modal-body">
    <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12 form-group">Produto
      <input class="form-control" type="text" name="nomeProd" required="required">
     </div>
     <div class="col-xs-12 form-group">Tipo
      <select class="form-control" name="tipoProd" required="required">
       <option value="" selected="selected">SELECIONE</option>
       <option value="PONTO">PONTO</option>
       <option value="ACESSO">ACESSO</option>
      </select>
     </div>
     <div class="pull-right">
      <input name="novoProduto" type="submit" class="btn bg-purple btn-flat" id="novoProduto" value="CADASTRAR PRODUTO"  /> 
      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
    if(@$_POST["novoProduto"]){
      $NomeProduto = $_POST["nomeProd"];
      $TipoProduto = $_POST["tipoProd"];
      $NovaData = date('d/m/Y - H:i');
       $AddProd = $PDO->query("INSERT INTO produto (nome, tipo, dataCadastro) VALUES ('$NomeProduto', '$TipoProduto', '$NovaData')");
        if ($AddProd) {
         echo '
              <script type="text/JavaScript">alert("Cadastrado com Sucesso!");
              location.href="dashboard.php"</script>';
        }
        else{
         echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
        }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE PRODUTO -->

<!-- MODAL DE CADASTRO DE FIRMWARE DE LINHA -->
<div id="novoFwLinha" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-red-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastro de Produto</h4>
   </div>
   <div class="modal-body">


   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE FIRMWARE DE LINHA -->

<!-- MODAL DE CADASTRO DE FIRMWARE ESPECIAL -->
<div id="novoFwEspecial" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-yellow-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastro de Produto</h4>
   </div>
   <div class="modal-body">


<form action="envia_arquivo.php" method="post" enctype="multipart/form-data">

<input type="file" name="Arquivo" id="Arquivo"><br>

<input type="submit" value="Enviar">

<input type="reset" value="Apagar">

</form>

   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE FIRMWARE ESPECIAL -->