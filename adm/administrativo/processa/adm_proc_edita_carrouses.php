<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
		
	if(empty($_POST['nome'])){
		$url = pg.'/adm/administrativo.php?link=70'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	if(!empty($_POST['imagem_antiga'])){
		$_SESSION['value_imagem_antiga'] = $_POST['imagem_antiga'];
	}
	
	if(empty($_POST['situacoes_carrouse_id'])){
		$url = pg.'/adm/administrativo.php?link=70'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_sit_vazio'] = "Campo Situação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_sit_carrouses_id'] = $_POST['situacoes_carrouse_id'];
	}
	
	if($salvar_dados_bd == 1){
		
		$id 					= mysqli_real_escape_string($conn, $_POST['id']);
		$nome	 				= mysqli_real_escape_string($conn, $_POST['nome']);
		$situacoes_carrouse_id 	= mysqli_real_escape_string($conn, $_POST['situacoes_carrouse_id']);
		
		if(empty($_FILES['imagem']['name'])){
			
			$result_carrouses = "UPDATE carrouses SET 
			nome='$nome', 
			situacoes_carrouse_id='$situacoes_carrouse_id', 
			modified =  NOW() 
			WHERE id = '$id'";
		}else{
			$nome_img 							= time()."-".$_FILES['imagem']['name'];
			$imagem_antiga_apagar 				= mysqli_real_escape_string($conn, $_POST['imagem_antiga']);
			
			$result_carrouses = "UPDATE carrouses SET 
			nome='$nome', 
			imagem='$nome_img', 
			situacoes_carrouse_id='$situacoes_carrouse_id',
			modified =  NOW() 
			WHERE id = '$id'";
			
			$nome_foto_antiga = "../../../carrousel/".$imagem_antiga_apagar;
			unlink($nome_foto_antiga);
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../../../carrousel/';		
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['imagem']['tmp_name'],$_UP['pasta'].$nome_img)){
			}
		}		
		
		$resultado_carrouses = mysqli_query($conn, $result_carrouses);			
		
		unset($_SESSION['value_nome']);
		unset($_SESSION['value_ordem']);
		unset($_SESSION['value_imagem_antiga']);
		unset($_SESSION['value_sit_carrouses_id']);
		?>
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
							alert(\"Carrousel alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=67'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Carrousel não foi alterado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}else{
		$_SESSION['value_id'] = $_POST['id'];
	}
	$conn->close(); ?>