<?php
	//Selecionar todos os itens da tabela 
	$usuario_id = $_SESSION['usuarioId'];
	$result_usuarios = "SELECT * FROM usuarios WHERE id = $usuario_id LIMIT 1";
	$resultado_usuarios = mysqli_query($conn , $result_usuarios);
	$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);
	$nome = $row_usuarios['nome'];
	$email = $row_usuarios['email'];
	$cep = $row_usuarios['cep'];
	$endereco = $row_usuarios['endereco'];
	$numero = $row_usuarios['numero'];
	$complemento = $row_usuarios['complemento'];
	$bairro = $row_usuarios['bairro'];
	$cidade = $row_usuarios['cidade'];
	$estado = $row_usuarios['estado'];
	
	$result_user_plano = "SELECT * FROM usuarios_planos WHERE usuario_id = $usuario_id LIMIT 1";
	$resultado_user_plano = mysqli_query($conn , $result_user_plano);
	$row_user_plano = mysqli_fetch_assoc($resultado_user_plano);
	$plano_id = $row_user_plano['plano_id'];
	if(!empty($_GET['plano_upgrade'])){
		$plano_id = $plano_id + 1;
	}
	
	include_once("lib/pagseguro.php");//pagamento com o Pagseguro

?>