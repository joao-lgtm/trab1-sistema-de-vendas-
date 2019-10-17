<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	include("conexao.php");
	
	$sql = "SELECT * FROM produto ORDER BY ID_PRODUTO";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID PRODUTO</th>
				<th>DESCRIÇAO</th>
                <th>PREÇO UNITARIO</th>
                <th>AÇAO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_PRODUTO"]."</td>
				<td>".$linha["DESCRICAO"]."</td>
				<td>".$linha["PRECO_UNITARIO"]."</td>
				<td>
					<form method='post' action='remover.php'>
						<input type='hidden' name='tabela' value='produto' />
						<input type='hidden' name='id' 
							value='".$linha["ID_PRODUTO"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>