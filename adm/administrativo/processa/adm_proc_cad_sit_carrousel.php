<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário
	
	if(empty($_POST['nome'])){
		$url = pg.'/adm/administrativo.php?link=73';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['nome_sit_contato_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	if(empty($_POST['cor'])){
		$url = pg.'/adm/administrativo.php?link=73';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['sit_cont_value_cor_vazio'] = "Campo cor é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_cor'] = $_POST['cor'];
	}
	
	if($salvar_dados_bd == 1){
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$cor = mysqli_real_escape_string($conn, $_POST['cor']);
		
		$result_sit_contato = "INSERT INTO situacoes_carrouses (nome, cor, created) VALUES ('$nome', '$cor', NOW())";
		$resultado_sit_contato = mysqli_query($conn, $result_sit_contato);	
		
		unset($_SESSION['value_nome']);
		unset($_SESSION['value_cor']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=71';
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Situação para carrousel cadastrado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=71';
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Situação para carrousel não foi cadastrado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html><?php 
	}
$conn->close(); ?>