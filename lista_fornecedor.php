<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	include("conexao.php");
	
	$sql = "SELECT * FROM fornecedor ORDER BY ID_FORNECEDOR";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID_FORNECEDOR</th>
				<th>RAZÃO SOCIAL</th>
				<th>NOME_FANTASIA</th>
				<th>ID_CIDADE</th>
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_FORNECEDOR"]."</td>
				<td>".$linha["RAZAO_SOCIAL"]."</td>
				<td>".$linha["NOME_FANTASIA"]."</td>
				<td>".$linha["ID_CIDADE"]."</td>
				<td>
					<form method='post' action='remover.php'>
						<input type='hidden' name='tabela' value='fornecedor' />
						<input type='hidden' name='id' 
							value='".$linha["ID_FORNECEDOR"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>