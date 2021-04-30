<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<?php
			session_start();
			include_once("../../conexao/conexao.php");
			include_once('../../../lib/confin_url.php');
			$cliente_id = $_SESSION['usuarioId'];
			
			//Variavel controla a necessidade de salvar no banco
			$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
			//Verifica o campo nome não esta vazio
			//Estando vazio redirecionao usuário para o formulário
			
			if(empty($_POST['senha'])){
				$url = pg.'/adm/cliente.php?link=3&id='.$cliente_id; 
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				";	
				$_SESSION['usuario_senha_vazio'] = "Campo senha é obrigatorio!";
				$salvar_dados_bd = 2;
			}else{		
				$_SESSION['value_senha'] = $_POST['senha'];
			}
						
			if($salvar_dados_bd == 1){	
				$id = mysqli_real_escape_string($conn, $_POST['id']);
				$senha = mysqli_real_escape_string($conn, $_POST['senha']);
				$senha = md5($senha);
				
				$result_usuario = "UPDATE usuarios SET senha = '$senha', modified =  NOW() WHERE id = '$id'";			
				$resultado_usuario = mysqli_query($conn, $result_usuario);
				
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=5&id='.$id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Senha alterada com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=5&id='.$id; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Senha não foi alterada com Sucesso.\");
						</script>
					";	
				}
			}
			$conn->close(); 
		?>
	</body>
</html>


