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


4 - ESTOQUE & PRODUTOS
páginas:
	fornecedores
	transportadoras

classes:
    <li class="treeview <?php echo $cEstoque; ?>">
ativo:		"active"
inativo:	""

	- controle de estoque:
	 <li class="<li class="<?php echo $cContEstoque; ?>">">
	 ativo:			"active"
	 inativo:		""
	- Produtos:
	 <li class="<?php echo $cProdutos; ?>">
	 ativo:			"active"
	 inativo:		""
	- Produtos:
	 <li class="<?php echo $cArvore; ?>">
	 ativo:			"active"
	 inativo:		""

5 - Cadastro de Notas
<li class="<?php echo $cNotas; ?>">	
ativo: 		"active"
inativo:	""	 

6 - Tabela de produtos
<li class="<?php echo $cTabela; ?>">	
ativo: 		"active"
inativo:	""	 
