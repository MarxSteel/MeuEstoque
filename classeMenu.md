pequena gambiarra aqui.
Para definir o menu como ACTIVE nas páginas necessárias:



1 - Home
<li class="<?php echo $cHhome; ?>">	
ativo: 		"active"
inativo:	""

2 - LOGÍSTICA
páginas:
	fornecedores
	transportadoras

classes:
    <li class="treeview <?php echo $cLogistica; ?>">
ativo:		"active"
inativo:	""

	- fornecedores:
	 <li class="<?php echo $cFornecedor; ?>">
	 ativo:			"active"
	 inativo:		""
	- fornecedores:
	 <li class="<?php echo $cTransportadora; ?>">
	 ativo:			"active"
	 inativo:		""

3 - Suporte
<li class="<?php echo $cSuporte; ?>">	
ativo: 		"active"
inativo:	""



