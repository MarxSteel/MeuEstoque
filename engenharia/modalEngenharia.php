   <?php 
    //CONFIGURANDO DADOS DE 
    $ChamaProduto = "SELECT * FROM produto";
    $P1 = $PDO->prepare($ChamaProduto);
    $P2 = $PDO->prepare($ChamaProduto);
    $P1->execute();
    $P2->execute();
      $NovaData = date('d/m/Y - H:i');
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
    <form name="pd" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-8">Modelo
      <input class="form-control" type="text" name="ni" required="required">
     </div>
     <div class="col-xs-4">Categoria
      <select class="form-control" name="cat" required="required">
       <option value="" selected="selected">SELECIONE</option>
       <option value="PONTO">PONTO</option>
       <option value="ACESSO">ACESSO</option>
      </select>
     </div>
     <input name="pd" type="submit" class="btn btn-success btn-block" id="pd" value="Finalizar Cadastro Inicial"  /><br /><br /><br />
    </form>
    <?php
    if(@$_POST["pd"])
    {
     $produto = $_POST['ni'];          //NOME DO ITEM
     $categoria = $_POST['cat'];
      $novoProd = $PDO->query("INSERT INTO produto (nome, tipo, dataCadastro) VALUES ('$produto', '$categoria', '$NovaData')");
        if($novoProd)
        {
        echo '<script type="text/JavaScript">alert("Modelo Adicionado!");
              location.href="dashboard.php"</script>';
        }
        else{

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
     <h4 class="modal-title">Cadastro de Firmware de Linha</h4>
   </div>
   <div class="modal-body">
    <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-md-6 col-xs-12">Versão
      <input class="form-control" type="text" name="vLinha" required="required">
     </div>
     <div class="col-md-6 col-xs-12">Produto
      <select class="form-control" name="prodLinha" required="required">
       <option value="" selected="selected">SELECIONE</option>
       <?php while ($Prod1 = $P1->fetch(PDO::FETCH_ASSOC)): ?>
       <option value="<?php echo $Prod1['nome'] ?>"><?php echo $Prod1['nome'] ?>
       </option>
       <?php endwhile; ?>
      </select>
     </div>
     <div class="col-xs-12">Arquivo
      <input type="file" name="arqLinha" id="arqLinha" required="required"><br>
     </div>
     <div class="col-xs-12">Observações
      <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
     </div>
     <div class="pull-right">
      <input name="novoProduto" type="submit" class="btn bg-purple btn-flat" id="novoProduto" value="CADASTRAR PRODUTO"  /> 
      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
    if(@$_POST["novoProduto"]){
     $vLinha = $_POST["vLinha"];
     $prodLinha = $_POST["prodLinha"];
     $nome_temporario=$_FILES["arqLinha"]["tmp_name"]; // Variável 
     $nome_real=$_FILES["Arquivo"]["name"]; // Variável $nome_real recebe o arquivo vindo do formulário
     $novonome = md5($nome_real);
     $NomeQuery = $novonome . ".zip";
     copy($nome_temporario,"firmware/" . $novonome . ".zip"); // Copiando a variável $nome_temporario para a variável $nome_real
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