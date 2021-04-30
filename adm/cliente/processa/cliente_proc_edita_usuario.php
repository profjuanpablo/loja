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
			
			if(empty($_POST['nome'])){
				$url = pg.'/adm/cliente.php?link=3&id='.$cliente_id; 
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				";	
				$_SESSION['usuario_nome_vazio'] = "Campo nome é obrigatorio!";		
				$salvar_dados_bd = 2;
			}else{
				$_SESSION['value_nome'] = $_POST['nome'];
			}
			
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
			
			if(!empty($_POST['imagem_antiga'])){
				$_SESSION['value_imagem_antiga'] = $_POST['imagem_antiga'];
			}
			
			if($salvar_dados_bd == 1){	
				$id = mysqli_real_escape_string($conn, $_POST['id']);
				$nome = mysqli_real_escape_string($conn, $_POST['nome']);
				$senha = mysqli_real_escape_string($conn, $_POST['senha']);
				$senha = md5($senha);
				
				if(empty($_FILES['arquivo']['name'])){
					$result_usuario = "UPDATE usuarios SET nome='$nome', senha = '$senha', modified =  NOW() WHERE id = '$id'";			
					$resultado_usuario = mysqli_query($conn, $result_usuario);
				}else{
					$nome_final 				= time()."-".$_FILES['arquivo']['name'];
					if(!empty($_POST['imagem_antiga'])){
						$imagem_antiga_apagar 	= mysqli_real_escape_string($conn, $_POST['imagem_antiga']);
						if($imagem_antiga_apagar != "icone-perfil-5487dsfeer87rt9erwr55w123132"){						
							$nome_foto_antiga = "../foto/".$imagem_antiga_apagar;
							unlink($nome_foto_antiga);
						}
					}					
					
					//Pasta onde o arquivo vai ser salvo
					$_UP['pasta'] = '../foto/';		
					//Verificar se é possivel mover o arquivo para a pasta escolhida
					if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$nome_final)){
					}
					
					$result_usuario = "UPDATE usuarios SET nome='$nome', senha = '$senha', foto='$nome_final', modified =  NOW() WHERE id = '$id'";			
					$resultado_usuario = mysqli_query($conn, $result_usuario);
				}
				if(mysqli_affected_rows($conn) != 0){
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=2&id=$id'>
						<script type=\"text/javascript\">
							alert(\"Perfil alterado com Sucesso.\");
						</script>
					";	
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=2&id=$id'>
						<script type=\"text/javascript\">
							alert(\"O Perfil não foi alterado com Sucesso.\");
						</script>
					";	
				}
			}
			$conn->close(); 
		?>
	</body>
</html>


