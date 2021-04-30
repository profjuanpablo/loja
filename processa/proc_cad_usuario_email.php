<?php
	session_start();
	include_once("../adm/conexao/conexao.php");
	include_once('../lib/confin_url.php');
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário	

	if(empty($_POST['email'])){
		$url = pg.'/cadastro_email';
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_email_vazio'] = "Campo email é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	if($salvar_dados_bd == 1){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$_SESSION['plano'] = mysqli_real_escape_string($conn, $_POST['plano']);
		$situacoe_id = 1;
		$niveis_acesso_id = 3;
		
		$result_usuario = "SELECT * FROM usuarios WHERE email='$email'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);
		if(isset($row_usuario)){
			$_SESSION['loginErro'] = "E-mail já cadastrado!";
			$url = pg.'/adm/index.php';
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
			";
		}else{
			$senha = '762cb962ac59075b964b07152d234b54';
			$result_usuario = "INSERT INTO usuarios (email, senha, situacoe_id, niveis_acesso_id, created) VALUES ('$email', '$senha', '$situacoe_id', '$niveis_acesso_id', NOW())";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			$_SESSION['email_cad'] = $email;			
			
			?>	
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
				</head>

				<body> <?php
					if(mysqli_affected_rows($conn) != 0){						
						$url = pg.'/adm/cadastrar_usuario.php';
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						";	
					}else{
						$url = pg.'/cadastro_email';
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
							<script type=\"text/javascript\">
								alert(\"O Usuário não foi cadastrado com Sucesso.\");
							</script>
						";	
					}?>
				</body>
			</html>
			<?php
		}	
		$conn->close(); 
		unset($_SESSION['value_email']);		
		
	}
	
?>
