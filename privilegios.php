<?
 $privilegio = $PDO->prepare("SELECT * FROM privilegio WHERE idUser='$login'");
 $privilegio->execute();
  $cp = $privilegio->fetch();
  $vTabela = $cp['TabelaProdutos'];       //VER TABELA DE PRODUTOS (PREF. COM)
  $vFornecedor = $cp['pFornecedor'];      //VER TELA DE FORNECEDOR
  $vTransp = $cp['pTransportador'];       //VER TELA DE TRANSPORTADORA
  $aTransp = $cp['pAddTransportador'];    //ADICIONAR TRANSPORTADORA
  $aFornecedor = $cp['pAddFornecedor'];   //ADICIONAR FORNECEDOR
  $aSuporte = $cp['aSuporte'];			      //ADICIONAR ITENS SUPORTE
  $aEngenharia = $cp['aEngenharia'];	    //ADICIONAR ITENS ENGENHARIA
  $pSuporte = $cp['pSuporte'];			      //VER TELA DO SUPORTE
  $pEngenharia = $cp['pEngenharia'];	    //VER TELA DA ENGENHARIA
  $vProduto = $cp['pProduto'];            //PERMISSÃO PARA VER PRODUTO
  $aProduto = $cp['cProduto'];            //PERMISSÃO PARA CADASTRAR PRODUTO
  $vItens = $cp['vIP'];                   //VER ITENS DE PRODUÇÃO
  $aItens = $cp['cIProd'];                //CADASTRAR ITENS DE PRODUÇÃO
  $vArvore = $cp['lisArPro'];             //LISTAR ARVORE DE PRODUTO
  $aArvore = $cp['cArPro'];               //CADASTRAR ARVORE DE PRODUTO
  $permProdutos = $cp['estoqueProdutos']; //PERMISSÃO PARA VER ESTOQUE
  $vNota = $cp['pNotas'];                 //PERMISSÃO PARA VER NOTAS
  $cNota = $cp['cNotas'];                 //PERMISSÃO PARA CADASTRAR NOTAS
  $Almox = $cp['almoxarifado'];           //PRIVILEGIOS DO ALMOX
?>