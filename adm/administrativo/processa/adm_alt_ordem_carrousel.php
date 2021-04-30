<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	$alteracao = mysqli_real_escape_string($conn, $_GET['alteracao']);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$ordem = mysqli_real_escape_string($conn, $_GET['ordem']);
	if($alteracao == "up"){
		$ordem_up = $ordem - 1;
		//echo "O que fazer? $alteracao. Ordem atual: $ordem - Ordem pretendida: $ordem_up";
		$result_carroses = "SELECT * FROM carrouses WHERE ordem='$ordem_up' LIMIT 1";
		$resultado_carrouses = mysqli_query($conn, $result_carroses);
		$row_carroses = mysqli_fetch_assoc($resultado_carrouses);
		//echo "<br>O ID do slide atual ocupando a posicao do Upgrade: ".$row_carroses['id'];
		$id_posicao_menor = $row_carroses['id'];
		
		//Alterar a ordem do slide ocupando a posicao menor
		$result_carrouses_acres = "UPDATE carrouses SET ordem='$ordem', modified =  NOW() WHERE id = '$id_posicao_menor'";		
		$resultado_carrouses_acres = mysqli_query($conn, $result_carrouses_acres);
		
		//Alterar a ordem do slide ocupando a posicao maior
		$result_carrouses_decre = "UPDATE carrouses SET ordem='$ordem_up', modified =  NOW() WHERE id = '$id'";		
		$resultado_carrouses_decre = mysqli_query($conn, $result_carrouses_decre);
	}
	if($alteracao == "down"){
		$ordem_down = $ordem + 1;
		//echo "O que fazer? $alteracao. Ordem atual: $ordem - Ordem pretendida down: $ordem_down";
		$result_carroses = "SELECT * FROM carrouses WHERE ordem='$ordem_down' LIMIT 1";
		$resultado_carrouses = mysqli_query($conn, $result_carroses);
		$row_carroses = mysqli_fetch_assoc($resultado_carrouses);
		//echo "<br>O ID do slide atual ocupando a posicao do Upgrade: ".$row_carroses['id'];
		$id_posicao_maior = $row_carroses['id'];
						
		//Alterar a ordem do slide ocupando a posicao maior
		$result_carrouses_decre = "UPDATE carrouses SET ordem='$ordem', modified =  NOW() WHERE id = '$id_posicao_maior'";		
		$resultado_carrouses_decre = mysqli_query($conn, $result_carrouses_decre);
		
		//Alterar a ordem do slide ocupando a posicao menor
		$result_carrouses_acres = "UPDATE carrouses SET ordem='$ordem_down', modified =  NOW() WHERE id = '$id'";		
		$resultado_carrouses_acres = mysqli_query($conn, $result_carrouses_acres);
	}?>
	<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="utf-8">
		</head>

		<body> <?php
			if(mysqli_affected_rows($conn) != 0){
				$url = pg.'/adm/administrativo.php?link=67'; 
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
					<script type=\"text/javascript\">
						alert(\"Ordem do Carrousel alterado com Sucesso.\");
					</script>
				";	
			}else{
				$url = pg.'/adm/administrativo.php?link=67'; 
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
					<script type=\"text/javascript\">
						alert(\"Ordem do Carrousel não foi alterado com Sucesso.\");
					</script>
				";	
			}?>
		</body>
	</html>
	<?php $conn->close(); ?>