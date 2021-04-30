<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
			
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$situacao_contato = mysqli_real_escape_string($conn, $_POST['situacao_contato']);
		$result_sit_contato = "UPDATE mensagens_contatos SET situacoes_contato_id='$situacao_contato', modified =  NOW() WHERE id = '$id'";
		
		$resultado_sit_contato = mysqli_query($conn, $result_sit_contato);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=64&id=$id'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Situação do contato alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=64&id=$id'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Situação do contato não foi alterada com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	$conn->close(); ?>