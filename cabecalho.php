<?php
	$c = new CabecalhoHTML();
	$v = array("produto"=>"Produto","estado"=>"Estado","cidade"=>"cidade","fornecedor"=>"Fornecedor","loja"=>"Loja","compra"=>"Compra");
	$c->add_menu($v);
	$c->exibe();
?>