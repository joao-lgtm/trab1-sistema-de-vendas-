<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeButton.php");
	require_once("../classeForm/classeForm.php");
	
	$v = array("action"=>"insere.php?tabela=produto","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"text","name"=>"ID_PRODUTO","placeholder"=>"ID DO PRODUTO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"DESCRICAO","placeholder"=>"DESCRIÇÂO...");
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"PRECO_UNITARIO","placeholder"=>"PREÇO UNITARIO...");
	$f->add_input($v);
	$v = array("texto"=>"ENVIAR");
	$f->add_button($v);	
?>

<h3>Formulário - Inserir produto</h3>

<hr />
<?php
	$f->exibe();
?>
</body>
</html>
</html>