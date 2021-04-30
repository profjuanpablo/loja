<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	if(empty($_POST['plano_id'])){
		$url = pg.'/adm/administrativo.php?link=86'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['produto_id_vazio'] = "Campo plano é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_produto_id'] = $_POST['plano_id'];
	}	
	
	if(empty($_POST['preco'])){
		$url = pg.'/adm/administrativo.php?link=90&id='.$id; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['preco_vazio'] = "Campo preço é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_preco'] = $_POST['preco'];
	}
	if($salvar_dados_bd == 1){
		
		$plano_id = mysqli_real_escape_string($conn, $_POST['plano_id']);
		$preco = mysqli_real_escape_string($conn, $_POST['preco']);
		
		$result_carrinhos = "UPDATE carrinhos SET plano_id='$plano_id', preco='$preco', modified =  NOW() WHERE id = '$id'";
		
		$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);	
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=88&id='.$id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Carrinho alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=88&id='.$id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Carrinho não foi alterado com Sucesso.\");
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