<?php 
$server = 'http://localhost:8888/MeuEstoque';
$endereco = $_SERVER ['REQUEST_URI']; 

?>
<ul class="sidebar-menu">
 <li class="header"></li>
  <li class="<?php echo $cHome; ?>">
   <a href="<?php echo $server; ?>/dashboard.php">
    <i class="fa fa-home"></i> <span>Início</span>
   </a>
  </li>
  <li class="treeview <?php echo $cLogistica; ?>">
   <a href="#">
    <i class="fa fa-pie-chart"></i><span>Logística</span>
    <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
    </span>
   </a>
   <ul class="treeview-menu">
    <?php if ($vFornecedor === "PP") { ?>
    <li class="<?php echo $cFornecedor; ?>">
     <a href="<?php echo $server; ?>/fornecedor/dashboard.php">
      <i class="fa fa-briefcase"></i> 
      Fornecedores
     </a>
    </li>
    <?php } else{ } if ($vTransp === "PP") { ?>
    <li class="<?php echo $cTransportadora; ?>">
     <a href="<?php echo $server; ?>/Transporte.php">
      <i class="fa fa-truck"></i>
      Transportadoras
     </a>
    </li>
    <?php } else{ } ?>
   </ul>
  </li>
  <?php if ($aSuporte === "PP") { ?>
  <li class="<?php echo $vSup; ?>">
   <a href="<?php echo $server; ?>/suporte/dashboard.php">
    <i class="fa fa-wrench"></i> <span>Suporte</span>
   </a>
  </li>
  <?php } else{ } if ($aEngenharia === "PP") { ?>
  <li class="<?php echo $vEng; ?>">
   <a href="<?php echo $server; ?>/engenharia/dashboard.php">
    <i class="fa fa-hdd-o"></i> <span>Engenharia</span>
   </a>
  </li>
  <?php } else{ } ?>
  <li class="treeview <?php echo $cEngenharia; ?>">
   <a href="#">
    <i class="fa fa-industry"></i><span>Estoque & Produtos</span>
    <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
    </span>
   </a>
   <ul class="treeview-menu">
    <li class="<?php echo $cContEstoque; ?>">
     <a href="<?php echo $server; ?>/estoque/dashboard.php">
     <i class="fa fa-list"></i> 
      Controle de Estoque
     </a>
    </li>
    <li class="<?php echo $cProdutos; ?>">
     <a href="<?php echo $server; ?>/Produto/dashboard.php">
      <i class="fa fa-plus-square"></i>
      Cadastro de Produtos
     </a>
    </li>
    <li class="<?php echo $cArvore; ?>">
     <a href="<?php echo $server; ?>/Produto/ArvoreProduto.php">
      <i class="fa fa-puzzle-piece"></i>
      Árvore de Produtos
     </a>
    </li>
   </ul>
  </li>
  <li class="<?php echo $cNotas; ?>">
   <a href="<?php echo $server; ?>/notas/dashboard.php">
    <i class="fa fa-file"></i> <span>Controle de Notas</span>
   </a>
  </li>
  <li class="<?php echo $cTabela; ?>">
   <a href="<?php echo $server; ?>/Produto/tabela.php">
    <i class="fa fa-sort-amount-desc"></i> <span>Tabela de Produtos</span>
   </a>
  </li>