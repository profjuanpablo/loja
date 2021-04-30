<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	
	if(empty($_POST['nome'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['msg_contato_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	if(empty($_POST['email'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['msg_contato_email_vazio'] = "Campo email é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	if(empty($_POST['telefone'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['msg_contato_telefone_vazio'] = "Campo telefone é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_telefone'] = $_POST['telefone'];
	}
	
	if(empty($_POST['assunto'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['msg_contato_assunto_vazio'] = "Campo assunto é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_assunto'] = $_POST['assunto'];
	}
	
	if(empty($_POST['mensagem'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['msg_contato_msg_vazio'] = "Campo mensagem é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_mensagem'] = $_POST['mensagem'];
	}
	
	if(empty($_POST['situacoes_contato_id'])){
		$url = pg.'/adm/administrativo.php?link=66'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_sit_artigos_vazio'] = "Campo situação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_sit_artigo_id'] = $_POST['situacoes_contato_id'];
	}
	
	
	
	
	
	
	if($salvar_dados_bd == 1){
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
		$assunto = mysqli_real_escape_string($conn, $_POST['assunto']);
		$mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
		$situacoes_contato_id = mysqli_real_escape_string($conn, $_POST['situacoes_contato_id']);
		
		$result_msg_contatos = "UPDATE mensagens_contatos SET 
		nome='$nome', 
		email='$email', 
		telefone='$telefone', 
		assunto='$assunto', 
		mensagem='$mensagem', 
		situacoes_contato_id='$situacoes_contato_id', 
		modified =  NOW() WHERE id = '$id'";
		
		$resultado_msg_contatos = mysqli_query($conn, $result_msg_contatos);

		unset($_SESSION['value_nome']);
		unset($_SESSION['value_email']);
		unset($_SESSION['value_telefone']);
		unset($_SESSION['value_assunto']);
		unset($_SESSION['value_mensagem']);		
		unset($_SESSION['value_sit_artigo_id']);
		unset($_SESSION['value_id']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=63'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Mensagem de Contato alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=63'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Mensagem de Contato não foi alterado com Sucesso.\");
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