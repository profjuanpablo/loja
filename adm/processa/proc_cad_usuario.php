<?php
	session_start();
	ob_start();
	include_once("../conexao/conexao.php");
	include_once('../../lib/confin_url.php');
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário
	
	if(empty($_POST['nome'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	

	if(empty($_POST['email'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_email_vazio'] = "Campo email é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	
	if(empty($_POST['senha'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_senha_vazio'] = "Campo senha é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_senha'] = $_POST['senha'];
	}
	
	
	
	
	if(empty($_POST['cpf'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_cpf_vazio'] = "Campo cpf é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{	
		$strCPF = $_POST['cpf'];
		$cpf = str_pad(preg_replace('/[^0-9]/', '', $strCPF), 11, '0', STR_PAD_LEFT);
		$Soma = 0;
		$Resto = ""; 
		//strCPF  = RetiraCaracteresInvalidos(strCPF,11);
		if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {			
			$url = pg.'/adm/cadastrar_usuario.php'; 
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
			";	
			$_SESSION['usuario_cpf_vazio'] = "CPF Inválido!";
			$salvar_dados_bd = 2;
		}else{
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {			
					$url = pg.'/adm/cadastrar_usuario.php'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
					";	
					$_SESSION['usuario_cpf_vazio'] = "CPF Inválido!";
					$salvar_dados_bd = 2;
				}
			}
			$_SESSION['value_cpf'] = $_POST['cpf'];
		}
		
	}
	
	
	if(empty($_POST['telefone'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_telefone_vazio'] = "Campo telefone é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_telefone'] = $_POST['telefone'];
	}
	
	
	if(empty($_POST['cep'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_cep_vazio'] = "Campo cep é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_cep'] = $_POST['cep'];
	}
	
	
	if(empty($_POST['rua'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_rua_vazio'] = "Campo rua é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_rua'] = $_POST['rua'];
	}
	
	
	if(empty($_POST['numero'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_numero_vazio'] = "Campo número é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_numero'] = $_POST['numero'];
	}	
	
	if(empty($_POST['bairro'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_bairro_vazio'] = "Campo bairro é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_bairro'] = $_POST['bairro'];
	}
	
	
	if(empty($_POST['cidade'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_cidade_vazio'] = "Campo cidade é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_cidade'] = $_POST['cidade'];
	}
	
	
	if(empty($_POST['uf'])){
		$url = pg.'/adm/cadastrar_usuario.php'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['usuario_uf_vazio'] = "Campo uf é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_uf'] = $_POST['uf'];
	}
	
	if($salvar_dados_bd == 1){
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
		$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
		$cep = mysqli_real_escape_string($conn, $_POST['cep']);
		$endereco = mysqli_real_escape_string($conn, $_POST['rua']);
		$numero = mysqli_real_escape_string($conn, $_POST['numero']);
		$plano = mysqli_real_escape_string($conn, $_POST['plano']);
		
		//Obter o id do plano conforme o plano recebido atraves do formulario
		if($plano == "free"){
			$plano_id = 1;
		}elseif($plano == "standard"){
			$plano_id = 2;			
		}elseif($plano == "ultimate"){
			$plano_id = 3;			
		}else{
			$plano_id = 1;			
		}
		
		if(empty($_POST['complemento'])){
			$complemento = "";
		}else{
			$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
		}
		$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
		$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
		$estado = mysqli_real_escape_string($conn, $_POST['uf']);
		$senha = md5($senha);
		$situacoe_id = 1;
		$niveis_acesso_id = 3;
		
		$result_usuario = "SELECT * FROM usuarios WHERE email='$email' || cpf='$cpf'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);
		if(isset($row_usuario)){
			$usuario_id = $row_usuario['id'];
			$result_usuario = "UPDATE usuarios SET 
			nome='$nome', 
			senha='$senha', 
			cpf='$cpf', 
			telefone='$telefone', 
			cep='$cep', 
			endereco='$endereco', 
			numero='$numero', 
			complemento='$complemento',
			bairro='$bairro', 
			cidade='$cidade', 
			estado='$estado', 
			modified =  NOW() WHERE id = '$usuario_id'";
			
			$resultado_usuario = mysqli_query($conn, $result_usuario); 
			
			if($plano_id == 1){
				$data_vencimento = date("Y-m-d H:i:s");
				$data_vencimento = strtotime($data_vencimento);
				$data_vencimento = strtotime('+7 day', $data_vencimento);
				$data_vencimento = date('Y-m-d H:i:s', $data_vencimento);
			}else{
				$data_vencimento = date("Y-m-d H:i:s");
			}
			//$plano_id = 1;
			$result_usuario_plano = "INSERT INTO usuarios_planos (
			data_vencimento, 
			usuario_id, 
			plano_id, 
			created) VALUES (
			'$data_vencimento', 
			'$usuario_id', 
			'$plano_id', 
			NOW())";
			$resultado_usuario_plano = mysqli_query($conn, $result_usuario_plano); 				
			
			?>	
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
				</head>

				<body> <?php
					if(mysqli_affected_rows($conn) != 0){						
						
						$url = pg.'/adm/index.php'; 
						unset($_SESSION['value_nome'], 
						$_SESSION['value_email'], 
						$_SESSION['value_senha'],
						$_SESSION['value_cpf'], 
						$_SESSION['value_telefone'], 
						$_SESSION['value_cep'], 
						$_SESSION['value_endereco'], 
						$_SESSION['value_numero'], 
						$_SESSION['value_complemento'], 
						$_SESSION['value_bairro'], 
						$_SESSION['value_cidade'], 
						$_SESSION['value_uf']);		
						if($plano_id == 2){
							include_once("../lib/pagseguro.php");//pagamento com o Pagseguro
						}
						if($plano_id == 3){
							include_once("../lib/pagseguro.php");//pagamento com o Pagseguro
						}else{
							$url = pg.'/adm/index.php'; 
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
								<script type=\"text/javascript\">
									alert(\"O Usuário cadastrado com Sucesso.\");
								</script>
							";	
						}
							
					}else{
						$url = pg.'/adm/cadastrar_usuario.php'; 
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
							<script type=\"text/javascript\">
								alert(\"O Usuário não foi cadastrado com Sucesso.\");
							</script>
						";	
					}?>
				</body>
			</html><?php
		}else{
			$result_usuario = "INSERT INTO usuarios (
			nome, 
			email, 
			senha, 
			cpf, 
			telefone, 
			cep, 
			endereco, 
			numero, 
			complemento, 
			bairro, 
			cidade, 
			estado, 
			situacoe_id, 
			niveis_acesso_id, 
			created) VALUES (
			'$nome', 
			'$email', 
			'$senha', 
			'$cpf', 
			'$telefone', 
			'$cep', 
			'$endereco', 
			'$numero', 
			'$complemento', 
			'$bairro', 
			'$cidade', 
			'$estado', 
			'$situacoe_id', 
			'$niveis_acesso_id', 
			NOW())";
			$resultado_usuario = mysqli_query($conn, $result_usuario); 
			
			unset($_SESSION['value_nome'], 
			$_SESSION['value_email'], 
			$_SESSION['value_senha'],
			$_SESSION['value_cpf'], 
			$_SESSION['value_telefone'], 
			$_SESSION['value_cep'], 
			$_SESSION['value_endereco'], 
			$_SESSION['value_numero'], 
			$_SESSION['value_complemento'], 
			$_SESSION['value_bairro'], 
			$_SESSION['value_cidade'], 
			$_SESSION['value_uf']);			
			
			if($plano_id == 1){
				$data_vencimento = date("Y-m-d H:i:s");
				$data_vencimento = strtotime($data_vencimento);
				$data_vencimento = strtotime('+7 day', $data_vencimento);
				$data_vencimento = date('Y-m-d H:i:s', $data_vencimento);
			}else{
				$data_vencimento = date("Y-m-d H:i:s");
			}
			
			$usuario_id = mysqli_insert_id($conn);
			//$plano_id = 1;
			$result_usuario_plano = "INSERT INTO usuarios_planos (
			data_vencimento, 
			usuario_id, 
			plano_id, 
			created) VALUES (
			'$data_vencimento', 
			'$usuario_id', 
			'$plano_id', 
			NOW())";
			$resultado_usuario_plano = mysqli_query($conn, $result_usuario_plano); 
			
			?>	
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
				</head>

				<body> <?php
					if(mysqli_affected_rows($conn) != 0){								
						if($plano_id == 2){
							include_once("../lib/pagseguro.php");//pagamento com o Pagseguro
						}
						if($plano_id == 3){
							include_once("../lib/pagseguro.php");//pagamento com o Pagseguro
						}else{
							$url = pg.'/adm/index.php'; 
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
								<script type=\"text/javascript\">
									alert(\"O Usuário cadastrado com Sucesso.\");
								</script>
							";	
						}	
					}else{
						$url = pg.'/adm/cadastrar_usuario.php'; 
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
							<script type=\"text/javascript\">
								alert(\"O Usuário não foi cadastrado com Sucesso.\");
							</script>
						";	
					}?>
				</body>
			</html><?php
		}	
		
		$conn->close(); 
	}
	
?>
