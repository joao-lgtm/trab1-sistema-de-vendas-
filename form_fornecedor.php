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

	$select = "SELECT ID_CIDADE as value, NOME_CIDADE as texto  from cidade";

	$stmt = $conexao->prepare($select);
	$stmt->execute();
	
	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}
	$v = array("action"=>"insere.php?tabela=fornecedor","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_FORNECEDOR","placeholder"=>"ID DO FORNECEDOR...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"RAZAO_SOCIAL","placeholder"=>"RAZÂO SOCIAL...");
	$f->add_input($v);
	$v = array("type"=>"text","name"=>"NOME_FANTASIA","placeholder"=>"NOME DA FANTASIA..");
	$f->add_input($v);
	$v = array("name"=>"NOME_CIDADE");
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