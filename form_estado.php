<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeButton.php");
	require_once("../classeForm/classeForm.php");
	
	$v = array("action"=>"insere.php?tabela=estado","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_ESTADO","placeholder"=>"ID DO ESTADO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_ESTADO","placeholder"=>" NOME ESTADO...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"SIGLA","placeholder"=>"SIGLA DO ESTADO...");
	$f->add_input($v);
	$v = array("texto"=>"ENVIAR");
	$f->add_button($v);	
?>

<h3>Formulário - Inserir estado</h3>

<hr />
<?php
	$f->exibe();
?>
</body>
</html>
</html>