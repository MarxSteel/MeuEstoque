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
    <li class="<?php echo $cFornecedor; ?>">
     <a href="<?php echo $server; ?>/fornecedor/dashboard.php">
      <i class="fa fa-briefcase"></i> 
      Fornecedores
     </a>
    </li>
    <li class="<?php echo $cTransportadora; ?>">
     <a href="<?php echo $server; ?>/Transporte.php">
      <i class="fa fa-truck"></i>
      Transportadoras
     </a>
    </li>
   </ul>
  </li>
  <li>
   <a href="<?php echo $server; ?>/dashboard.php">
    <i class="fa fa-home"></i> <span>Suporte</span>
   </a>
  </li>
  <li class="treeview">
   <a href="#">
    <i class="fa fa-pie-chart"></i><span>Estoque & Produtos</span>
    <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
    </span>
   </a>
   <ul class="treeview-menu">
    <li>
     <a href="pages/charts/chartjs.html">
      <i class="fa fa-briefcase text-red"></i> 
      Controle de Estoque
     </a>
    </li>
    <li>
     <a href="pages/charts/chartjs.html">
      <i class="fa fa-truck text-green"></i>
      Cadastro de Produtos
     </a>
    </li>
    <li>
     <a href="pages/charts/chartjs.html">
      <i class="fa fa-truck text-green"></i>
      Árvore de Produtos
     </a>
    </li>
   </ul>
  </li>
  <li>
   <a href="<?php echo $server; ?>/fornecedor/dashboard.php">
    <i class="fa fa-briefcase"></i> <span>Controle de Notas</span>
   </a>
  </li>
  <li>
   <a href="<?php echo $server; ?>/fornecedor/dashboard.php">
    <i class="fa fa-briefcase"></i> <span>Tabela de Produtos</span>
   </a>
  </li>