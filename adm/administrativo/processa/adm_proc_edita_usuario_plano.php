<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	$usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);
	
	if(empty($_POST['plano_id'])){
		$url = pg.'/adm/administrativo.php?link=98&id='.$usuario_id; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['produto_id_vazio'] = "Campo Plano é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_produto_id'] = $_POST['plano_id'];
	}
	
	if(empty($_POST['data_vencimento'])){
		$url = pg.'/adm/administrativo.php?link=98&id='.$usuario_id; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['data_vencimento_vazio'] = "Campo data de vencimento é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_data_vencimento'] = $_POST['data_vencimento'];
	}
	
	if($salvar_dados_bd == 1){
		
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$plano_id = mysqli_real_escape_string($conn, $_POST['plano_id']);		
		$data_vencimento = mysqli_real_escape_string($conn, $_POST['data_vencimento']);
		
		$result_niveis_acessos = "UPDATE usuarios_planos SET data_vencimento='$data_vencimento', plano_id='$plano_id', modified =  NOW() WHERE id = '$id'";
		
		$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);

		unset($_SESSION['value_produto_id'], $_SESSION['value_data_vencimento'], $_SESSION['value_id_usuario'],$_SESSION['value_id']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=5&id='.$usuario_id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Plano do usuário alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=5&id='.$usuario_id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Plano do usuário não foi alterado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}else{
		$_SESSION['value_id'] = $_POST['id'];
		$_SESSION['value_id_usuario'] = $_POST['usuario_id'];
	}
	$conn->close(); ?>