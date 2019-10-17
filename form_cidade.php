<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	require_once("../classeForm/InterfaceExibicao.php");
	require_once("../classeForm/classeInput.php");
	require_once("../classeForm/classeButton.php");
	require_once("../classeForm/classeOption.php");
	require_once("../classeForm/classeSelect.php");
	require_once("../classeForm/classeForm.php");
	include("conexao.php");

	$select = "SELECT ID_ESTADO as value, sigla as texto  from estado";

	$stmt = $conexao->prepare($select);
	$stmt->execute();
	
	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	
	$v = array("action"=>"insere.php?tabela=cidade","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_CIDADE","placeholder"=>"ID DA CIDADE...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_CIDADE","placeholder"=>"NOME DA CIDADE...");
	$f->add_input($v);
	$v = array("name"=>"COD_ESTADO");
	$f->add_select($v,$matriz);
	$v = array("texto"=>"ENVIAR");
	$f->add_button($v);	
?>

<h3>Formulário - Inserir Função</h3>

<hr />
<?php
	$f->exibe();
?>
</body>
</html>
</html>