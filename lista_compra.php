<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	include("conexao.php");
	
	$sql = "SELECT * FROM compra";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID COMPRA</th>
				<th>CODIGO FORNECEDOR</th>
				<th>CODIGO PRODUTO</th>	
				<th>QUANTIDADE</th>	
				<th>CODIGO LOJA</th>		
				<th>PREÇO UNITÁRIO</th>		
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_COMPRA"]."</td>
				<td>".$linha["ID_FORNECEDOR"]."</td>
				<td>".$linha["ID_PRODUTO"]."</td>
				<td>".$linha["QUANTIDADE"]."</td>
				<td>".$linha["ID_LOJA"]."</td>
				<td>".$linha["PRECO_UNITARIO"]."</td>		
				<td>
				<form method='post' action='remover.php'>
				<input type='hidden' name='tabela' value='compra' />
				<input type='hidden' name='id' 
					value='".$linha["ID_COMPRA"]."' />
				<button>Remover</button>
			</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>