<?php
	class ControllerBD{
		
		private $conexao;
		
		public function __construct(PDO $c){
			$this->conexao = $c;
		}
		
		public function remover($id,$tabela){
			$delete = "DELETE FROM $tabela WHERE id_$tabela=:id";
			$stmt = $this->conexao->prepare($delete);
			$stmt->bindValue(":id",$id);
			$stmt->execute();
			echo "removido(a) com sucesso";
		}
		
		public function inserir($campos,$tabela){
			
			$insert = "INSERT INTO $tabela (";
			$i=0;
			foreach($campos as $indice=>$valor){
				if($i==0){
					$insert .= $indice;
					$i++;
				}
				else{
					$insert .= ",".$indice;
				}
			}
			
			$insert .= ") VALUES (";
			
			$i=0;
			foreach($campos as $indice=>$valor){
				if($i==0){
					$insert .= ":".$indice;
					$i++;
				}
				else{
					$insert .= ",:".$indice;
				}
			}
			$insert .= ")";
			
			
			$stmt = $this->conexao->prepare($insert);
			
			foreach($campos as $indice=>$valor){
				$stmt->bindValue(":".$indice,$valor);
			}
			$stmt->execute();
			
			echo "Cadastrado com sucesso";
		}
		
		
		public function selecionar(){
			
		}
		
	}
?>