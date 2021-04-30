<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
			
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$situacao_comentario = mysqli_real_escape_string($conn, $_POST['situacao_comentario']);
		$result_situacoes = "UPDATE comentarios_artigos SET situacoes_comentario_id='$situacao_comentario', modified =  NOW() WHERE id = '$id'";
		
		$resultado_situacoes = mysqli_query($conn, $result_situacoes);
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
							alert(\"Situação do comentário alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=60&id=$id'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Situação do comentário não foi alterada com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	$conn->close(); ?>