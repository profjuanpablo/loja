<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	
	if(empty($_POST['transacao_cod'])){
		$url = pg.'/adm/administrativo.php?link=86'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['transacao_cod_vazio'] = "Campo Transação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_transacao_cod'] = $_POST['transacao_cod'];
	}
	
	if(empty($_POST['tipo_pagamento'])){
		$url = pg.'/adm/administrativo.php?link=86'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['tipo_pagamento_vazio'] = "Campo Tipo de Pagamento é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_tipo_pagamento'] = $_POST['tipo_pagamento'];
	}
	
	if(empty($_POST['status_transacao'])){
		$url = pg.'/adm/administrativo.php?link=86'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['status_transacao_vazio'] = "Campo Status da Transação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_status_transacao'] = $_POST['status_transacao'];
	}
	
	if(empty($_POST['produto_id'])){
		$url = pg.'/adm/administrativo.php?link=86'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['produto_id_vazio'] = "Campo Produto é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_produto_id'] = $_POST['produto_id'];
	}	

	if(isset($_POST['nome'])){
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	
	if(isset($_POST['email'])){
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	if(isset($_POST['cep'])){
		$_SESSION['value_cep'] = $_POST['cep'];
	}
	
	if(isset($_POST['endereco'])){
		$_SESSION['value_endereco'] = $_POST['endereco'];
	}
	
	if(isset($_POST['numero'])){
		$_SESSION['value_numero'] = $_POST['numero'];
	}
	
	if(isset($_POST['complemento'])){
		$_SESSION['value_complemento'] = $_POST['complemento'];
	}
	
	if(isset($_POST['bairro'])){
		$_SESSION['value_bairro'] = $_POST['bairro'];
	}
	
	if(isset($_POST['cidade'])){
		$_SESSION['value_cidade'] = $_POST['cidade'];
	}
	
	if(isset($_POST['uf'])){
		$_SESSION['value_uf'] = $_POST['uf'];
	}
	
	if($salvar_dados_bd == 1){
		
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$transacao_cod = mysqli_real_escape_string($conn, $_POST['transacao_cod']);
		$tipo_pagamento = mysqli_real_escape_string($conn, $_POST['tipo_pagamento']);
		$status_transacao = mysqli_real_escape_string($conn, $_POST['status_transacao']);		
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$cep = mysqli_real_escape_string($conn, $_POST['cep']);
		$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);		
		$numero = mysqli_real_escape_string($conn, $_POST['numero']);
		$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
		$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
		$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
		$uf = mysqli_real_escape_string($conn, $_POST['uf']);
		$produto_id = mysqli_real_escape_string($conn, $_POST['produto_id']);
		
		$result_transacoes = "UPDATE transacoes SET 
		transacao_cod='$transacao_cod', 
		tipo_pagamento = '$tipo_pagamento', 
		status_transacao = '$status_transacao', 
		nome = '$nome', 
		email = '$email', 
		cep='$cep',  
		endereco='$endereco',  
		numero='$numero',  
		complemento='$complemento',  
		bairro='$bairro',  
		cidade='$cidade',  
		uf='$uf',  
		produto_id='$produto_id',
		modified =  NOW() WHERE id = '$id'";
		
		$resultado_transacoes = mysqli_query($conn, $result_transacoes);	
				
		unset($_SESSION['value_transacao_cod']);
		unset($_SESSION['value_tipo_pagamento']);
		unset($_SESSION['value_status_transacao']);
		unset($_SESSION['value_nome']);
		unset($_SESSION['value_email']);
		unset($_SESSION['value_cep']);
		unset($_SESSION['value_endereco']);
		unset($_SESSION['value_numero']);
		unset($_SESSION['value_complemento']);
		unset($_SESSION['value_bairro']);
		unset($_SESSION['value_cidade']);
		unset($_SESSION['value_uf']);
		unset($_SESSION['value_produto_id']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> 
				<?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=84&id='.$id;
					$_SESSION['retorno_sucesso_transac'] = "Transação alterada com Sucesso.";
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
				}else{
					$url = pg.'/adm/administrativo.php?link=86&id='.$id;
					$_SESSION['retorno_erro_transac'] = "Transação não foi alterada com Sucesso.";
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
				}?>
			</body>
		</html>
		<?php 
	}else{
		$_SESSION['value_id'] = $_POST['id'];
	}
	$conn->close(); ?>