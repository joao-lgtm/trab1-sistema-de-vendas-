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

	$v = array("action"=>"insere.php?tabela=compra","method"=>"post");
	$f = new Form($v);
	
	$v = array("type"=>"number","name"=>"ID_COMPRA","placeholder"=>"ID DA COMPRA...");
	$f->add_input($v);

	$v = array("type"=>"number","name"=>"QUANTIDADE","placeholder"=>"QUANTIDADE...");
	$f->add_input($v);

	$v = array("type"=>"number","name"=>"PRECO_UNITARIO","placeholder"=>"PREÇO UNITÁRIO DA COMPRA...");
	$f->add_input($v);

	$select = "SELECT ID_FORNECEDOR AS value, NOME_FANTASIA AS texto FROM fornecedor ORDER BY NOME_FANTASIA";
	$stmt = $conexao->prepare($select);
	$stmt->execute();
	
	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	

	$v = array("name"=>"ID_FORNECEDOR");
	$f->add_select($v,$matriz);

	$matriz = null;

	$select = "SELECT ID_PRODUTO AS value, descricao AS texto FROM produto ORDER BY descricao";
	$stmt = $conexao->prepare($select);
	$stmt->execute();


	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	

	$v = array("name"=>"COD_PRODUTO");
	$f->add_select($v,$matriz);

	$matriz = null;

	$select = "SELECT ID_LOJA AS value, NOME_FANTASIA AS texto FROM loja ORDER BY NOME_FANTASIA";
	$stmt = $conexao->prepare($select);
	$stmt->execute();

	while($linha=$stmt->fetch()){
		$matriz[] = $linha;
	}	

	$v = array("name"=>"COD_LOJA");
	$f->add_select($v,$matriz);

	
	
	
	$v = array("type"=>"submit","name"=>"ENVIAR");
	$f->add_input($v);	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style> input{margin:4px;}</style>
	</head>
<body>
<h3>Formulário - Inserir Compra</h3>

<hr />
<?php
	$f->exibe();

?>
</body>
</html>
</html>