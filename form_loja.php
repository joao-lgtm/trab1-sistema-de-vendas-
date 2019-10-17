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
	
	$select = "SELECT ID_CIDADE as value, nome_cidade as texto  from cidade";

	$stmt = $conexao->prepare($select);
	$stmt->execute();
	
	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	
	
	$v = array("action"=>"insere.php?tabela=loja","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_LOJA","placeholder"=>"ID DA LOJA...");
	$f->add_input($v);
	$v = array("type"=>"number","name"=>"CNPJ","placeholder"=>"CNPJ...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"RAZAO_SOCIAL","placeholder"=>"RAZAO SOCIAL...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_FANTASIA","placeholder"=>"NOME DA FANTASIA...");
	$f->add_input($v);
	$v = array("name"=>"COD_CIDADE");
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