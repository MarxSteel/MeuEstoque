<?php
 $QryModelo = "SELECT * FROM produto";
 $qrymod = $PDO->prepare($QryModelo);
 $qrymod->execute();
    
?>
<div id="myModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar Nova Árvore de Produto</h4>
   </div>
   <div class="modal-body">
    <form name="nar" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-8">Produto
      <select class="form-control" name="prod" required="required">
       <option value="" selected="selected">SELECIONE</option>
        <?php while ($mod = $qrymod->fetch(PDO::FETCH_ASSOC)): ?>
          <option value="<?php echo $mod['nome'] ?>"><?php echo $mod['nome'] ?>
       </option>
       <?php endwhile; ?>
      </select>
     </div>
    <div class="col-xs-4 form-group">Modelo
     <input class="form-control" type="text" name="mod" required="required">
    </div>
    <div class="col-xs-12">Observações
     <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
    </div>
    <input name="nar" type="submit" class="btn btn-danger btn-block" id="nar" value="CADASTRAR ARVORE NOVA"  />
  </form>
  <?php
  if(@$_POST["nar"])
  {
    $nProd = $_POST['prod'];
    $nMod = $_POST['mod'];
    $DataCadastro = date('d/m/Y H:i:s');
    $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
    $ModCadastra = $nProd . " " . $nMod;
     $Cadastro = $PDO->query("INSERT INTO arvore_prod (ap_Nome, ap_Obs, Status, ap_DataCadastro) VALUES ('$ModCadastra', '$Obs', '1', '$DataCadastro')");
      if ($Cadastro) {
       $Det1 = "<strong>Usuário: </strong>" . $NomeUserLogado .  "<br />";
       $Det2 = "Data da Atualização: " . $DataCadastro . "<br/>";
       $Det3 = "Cód. Evento: 400 (Produto Arvore Cadastrado)";
       $Det4 = "<strong> Modelo </strong>" . $ModCadastra . "<br />";
       $Det5 = "<strong> Observações: </strong>" . $Obs . "<br />";
       $nOb = $Det1 . $Det2 . $Det3 . $Det4 . $Det5; 
       $NovoLog = $PDO->query("INSERT INTO sistema_log (Usuario, Evento, Data, Descricao) VALUES ('$NomeUserLogado', '400', '$dataAtual', '$nOb')");
       if ($NovoLog)
       {
        echo '<script type="text/JavaScript">alert("Arvore Adicionada");
              location.href="ArvoreProduto.php"</script>';
       }
      }
      else
      {
      echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
      }
  }
  ?>
  </div>
  <div class="modal-footer"></div>
 </div>
</div>
      </div>








<div class="modal fade" id="modalArvore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="exampleModalLabel"></h4>
   </div>
   <div class="modal-body">
   <?php
    $chamaProd = "SELECT * FROM cad_estoque";
     $prod = $PDO->prepare($chamaProd);
     $prod->execute();
   ?>
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
     <?php while ($vp = $prod->fetch(PDO::FETCH_ASSOC)): 
     echo '<tr>';
     ?>
      <form name="<?php echo $vp['id']; ?>" id="<?php echo $vp['id']; ?>" method="post" action="" enctype="multipart/form-data">
      <?php
      echo '<td><input class="form-control" type="text" name="id" disabled="disabled" value="' . $vp['id'] . '" placeholder="' . $vp['id'] . '"></td>';
      echo '<td>' . $vp['es_c2'] . '</td>';
      echo '<td>' . $vp['es_c1'] . '</td>';
      echo '<td>' . $vp['es_nome'] . '</td>';

      echo '<td><input class="form-control modal-valor" type="text" id="exampleModalLabel" name="mod" value="exampleModalLabel" disabled="disabled"></td>';
      echo '<td><input class="form-control" type="num" name="qnt" required="required" placeholder="00"></td>';
      echo '<td><input name="nar" type="submit" class="btn btn-success btn-block" id="nar" value="ADD"  /></td>';
     echo '</tr>';
    endwhile;
    ?>
    </tbody>
   </table>
  </form>
  <?php
   if(@$_POST["nar"]){
   $adQuant = $_POST["qnt"];
   $adMod = $_POST["exampleModalLabel"];
    $InsereArvore = $PDO->query("INSERT INTO arvore_lista (nomePeca, quant) VALUES ('$adMod', '$adQuant')");
    if ($InsereArvore) {
     echo '<script type="text/JavaScript">alert("Cadastrado com Sucesso");';
    }
    else{
     echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
    }
  }
  ?>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Send message</button>
   </div>
  </div>
 </div>
</div>



