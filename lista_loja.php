<?php
	include("../classeLayout/classeCabecalhoHTML.php");
	include("cabecalho.php");
	
	include("conexao.php");
	
    $sql = "SELECT * FROM loja inner join cidade on loja.cod_cidade = cidade.id_cidade
    inner join estado on cidade.cod_estado = estado.id_estado";
	
	$stmt = $conexao->prepare($sql);
	
	$stmt->execute();
	
	echo "<table border='1'>";
	echo "<thead>
			<tr>
				<th>ID LOJA</th>
				<th>CNPJ</th>
				<th>RAZAO SOCIAL</th>
                <th>NOME FANTASIA</th>
                <th>CODIGO CIDADE</th>
                <th>NOME CIDADE</th>
                <th>SIGLA</th>
				<th>AÇÃO</th>
			</tr>
		  </thead>
		  <tbody>
		  ";
	while($linha=$stmt->fetch()){
		echo "<tr>
                <td>".$linha["ID_LOJA"]."</td>
                <td>".$linha["CNPJ"]."</td>
				<td>".$linha["RAZAO_SOCIAL"]."</td>
                <td>".$linha["NOME_FANTASIA"]."</td>
                <td>".$linha["COD_CIDADE"]."</td>
                <td>".$linha["NOME_CIDADE"]."</td>
				<td>".$linha["SIGLA"]."</td>
				<td>
					<form method='post' action='remover.php'>
						<input type='hidden' name='tabela' value='loja' />
						<input type='hidden' name='id' 
							value='".$linha["ID_LOJA"]."' />
						<button>Remover</button>
					</form>
					
				</td>
		      </tr>";
	}
	echo "</tbody>
		</table>";
?>