<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	
	if(empty($_POST['nome'])){
		$url = pg.'/adm/administrativo.php?link=62'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	if(empty($_POST['email'])){
		$url = pg.'/adm/administrativo.php?link=62'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['coment_artigo_email_vazio'] = "Campo E-mail é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	if(empty($_POST['mensagem'])){
		$url = pg.'/adm/administrativo.php?link=62'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['coment_artigo_mensag_vazio'] = "Campo Mensagem é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_mensag'] = $_POST['mensagem'];
	}
	
	if(empty($_POST['artigo_id'])){
		$url = pg.'/adm/administrativo.php?link=62'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['coment_artigos_vazio'] = "Campo Artigo é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_artigo_id'] = $_POST['artigo_id'];
	}
	
	if(empty($_POST['situacoes_comentario_id'])){
		$url = pg.'/adm/administrativo.php?link=62'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['coment_sit_comenta_vazio'] = "Campo Artigo é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_sit_comenta_id'] = $_POST['situacoes_comentario_id'];
	}
	
	
	if($salvar_dados_bd == 1){
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
		$artigo_id = mysqli_real_escape_string($conn, $_POST['artigo_id']);
		$situacoes_comentario_id = mysqli_real_escape_string($conn, $_POST['situacoes_comentario_id']);
		
		$result_comt_artigo = "UPDATE comentarios_artigos SET nome='$nome', email = '$email', mensagem = '$mensagem', artigo_id = '$artigo_id', situacoes_comentario_id = '$situacoes_comentario_id',  modified =  NOW() WHERE id = '$id'";
		
		$resultado_comt_artigo = mysqli_query($conn, $result_comt_artigo);	
				
		unset($_SESSION['value_nome']);
		unset($_SESSION['value_email']);
		unset($_SESSION['value_mensag']);
		unset($_SESSION['value_artigo_id']);
		unset($_SESSION['value_sit_comenta_id']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=60&id=$id'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Comentário alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=60&id=$id'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Comentário não foi alterado com Sucesso.\");
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