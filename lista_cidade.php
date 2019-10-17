<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	include("conexao.php");
	
	$sql = "SELECT * FROM cidade inner join estado on cidade.cod_estado = estado.id_estado";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID CIDADE</th>
				<th>NOME DA CIDADE</th>
				<th>CODIGO DO ESTADO</th>
				<th>SIGLA DO ESTADO</th>
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
				<td>".$linha["ID_CIDADE"]."</td>
				<td>".$linha["NOME_CIDADE"]."</td>
				<td>".$linha["COD_ESTADO"]."</td>
				<td>".$linha["SIGLA"]."</td>
				<td>
					<form method='post' action='remover.php'>
						<input type='hidden' name='tabela' value='cidade' />
						<input type='hidden' name='id' 
							value='".$linha["ID_CIDADE"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>