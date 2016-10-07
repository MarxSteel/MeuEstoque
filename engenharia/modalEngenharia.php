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


   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE FIRMWARE ESPECIAL -->







      <!-- MODAL DE CADASTRO DE ATENDIMENTO -->
      <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-aqua-gradient">
          <button type="button" class="close" data-dismiss="modal">X</button>
           <h4 class="modal-title">Cadastrar Firmware de Linha</h4>
         </div>
         <div class="modal-body">
          <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-8 form-group">Nome da Revenda
            <input class="form-control" type="text" name="nm" required="required">
           </div>
           <div class="col-xs-4 form-group">Tipo de Atendimento
            <select class="form-control" name="tipoat" required="required">
             <option value="" selected="selected">SELECIONE</option>
             <option value="1">ATENDIMENTO</option>
             <option value="2">RETORNO DE ASSIST.</option>
             <option value="3">PEÇA</option>
            </select>
           </div>
           <div class="col-xs-7 form-group">Status do Atendimento
            <select class="form-control" name="status" required="required">
             <option value="" selected="selected">SELECIONE</option>
             <option value="1">Solucionado</option>
             <option value="2">Não Solucionado (encaminhado à Henry)</option>
             <option value="3">Pendente</option>
             <option value="4">Não Solucionado</option>
            </select>
           </div>
           <div class="col-xs-5 form-group">Data de Cadastro
            <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
           </div>
           <div class="col-xs-12"><strong>Atendimento</strong>
            <textarea name="obs" cols="45" rows="3" class="form-control"></textarea>
           </div>
           <div class="col-xs-12"><strong>Solução</strong>
            <textarea name="sol" cols="45" rows="3" class="form-control"></textarea><hr>
           </div>
           <div class="pull-right">
            <input name="Tsenha" type="submit" class="btn bg-aqua" id="Tsenha" value="CADASTRAR ATENDIMENTO"  /> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
           </div>
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $nRevenda = $_POST["nm"];
            $nStatus = $_POST["status"];
            $nTipo = $_POST["tipoat"];
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            $Sol = str_replace("\r\n", "<br/>", strip_tags($_POST["sol"]));
            $Atend = "Descr.:" . $Obs . "<br/>Atend.: " . $Sol; 
            $vLog = "NOVO ATENDIMENTO:<br />" . $Valor;


            $AddCat = $PDO->query("INSERT INTO suporte (NomeTec, Revenda, Atendimento, Solucao, Status, DataCadastro, TipoSup) VALUES ('$NomeUserLogado', '$nRevenda', '$Obs', '$Sol', '$nStatus', '$dt', '$nTipo')");
            if($AddCat)
             {
              $SalvaLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '101', '$dt', '$vLog')");
              if ($SalvaLog) {
              echo '
              <script type="text/JavaScript">alert("Atendimento Cadatrado com Sucesso!");
              location.href="dashboard.php"</script>';
              }
              else{
                echo '<script type="text/javascript">alert("ERRO AO SALVAR LOG");</script>';
              }
             }
             else{
             echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
             }
           }
          ?>
         </div>
         <div class="modal-footer">
         </div>
        </div>
       </div>
      </div>
      <!-- FIM DO MODAL DE CADASTRO DE ATENDIMENTO -->