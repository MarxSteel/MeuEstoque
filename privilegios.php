<?
 $privilegio = $PDO->prepare("SELECT * FROM privilegio WHERE idUser='$login'");
 $privilegio->execute();
  $cp = $privilegio->fetch();
  $vTabela = $cp['TabelaProdutos'];      //VER TABELA DE PRODUTOS (PREF. COM)
  $vFornecedor = $cp['pFornecedor'];     //VER TELA DE FORNECEDOR
  $vTransp = $cp['pTransportador'];      //VER TELA DE TRANSPORTADORA
  $aTransp = $cp['pAddTransportador'];   //ADICIONAR TRANSPORTADORA
  $aFornecedor = $cp['pAddFornecedor'];  //ADICIONAR FORNECEDOR


?>