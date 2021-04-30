<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário
	
	if(empty($_POST['nome'])){
		$url = pg.'/adm/administrativo.php?link=69';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	//Array com as extensoes permitidas
	$_UP['extensoes'] = array('png','jpg','jpeg','gif');
	
	$nome_img = $_FILES['imagem']['name'];
	$array_nome_img = explode('.', $nome_img);
	$extensao_img = end($array_nome_img);
	
	if(array_search($extensao_img, $_UP['extensoes']) === false){
		$url = pg.'/adm/administrativo.php?link=69';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_imagem_vazio'] = "A imagem deve ser png, jpg, jpeg ou gif!";		
		$salvar_dados_bd = 2;
	}
	
	
	if(empty($_FILES['imagem']['name'])){
		$url = pg.'/adm/administrativo.php?link=69';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_imagem_vazio'] = "A imagem é obrigatorio!";		
		$salvar_dados_bd = 2;
	}
		
	if(empty($_POST['situacoes_carrouse_id'])){
		$url = pg.'/adm/administrativo.php?link=69';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['carrousel_sit_vazio'] = "Campo Situação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_sit_carrousel_id'] = $_POST['situacoes_carrouse_id'];
	}
	
	if($salvar_dados_bd == 1){
		$nome	 				= mysqli_real_escape_string($conn, $_POST['nome']);
		$nome_img 				= time()."-".$_FILES['imagem']['name'];
		$situacoes_carrouse_id 	= mysqli_real_escape_string($conn, $_POST['situacoes_carrouse_id']);
		
		//Selecionar todos os itens da tabela 
		$result_carrouse = "SELECT * FROM carrouses ORDER BY ordem ASC";
		$resultado_carrouse = mysqli_query($conn , $result_carrouse);
	
		//Contar o total de itens
		$total_carrouses = mysqli_num_rows($resultado_carrouse);
		
		$ordem = $total_carrouses + 1;
		
		$result_carrouses = "INSERT INTO carrouses (
			nome, 
			ordem,
			imagem,
			situacoes_carrouse_id,
			created) VALUES (
			'$nome',
			'$ordem',
			'$nome_img',
			'$situacoes_carrouse_id',
			NOW())";
			
		$resultado_carrouses = mysqli_query($conn, $result_carrouses);	
				
		unset($_SESSION['value_nome']);
		unset($_SESSION['value_ordem']);
		unset($_SESSION['carrousel_imagem_vazio']);
		unset($_SESSION['value_sit_carrousel_id']);
		
		//Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = '../../../carrousel/';		
		//Verificar se é possivel mover o arquivo para a pasta escolhida
		if(move_uploaded_file($_FILES['imagem']['tmp_name'],$_UP['pasta'].$nome_img)){
		}
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
							alert(\"Carrousel cadastrado com Sucesso.\");
						</script>
					";	
				}else{
				$url = pg.'/adm/administrativo.php?link=67';
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Carrousel não foi cadastrado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html><?php 
	}
$conn->close(); ?>