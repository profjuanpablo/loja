<?php
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	$id = $_GET['id'];
	
	$result_msg_contato = "DELETE FROM mensagens_contatos WHERE id = '$id'";
	$resultado_msg_contato = mysqli_query($conn, $result_msg_contato);	
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
					alert(\"Mensagem de Contato apagado com Sucesso.\");
				</script>
			";	
		}else{
			$url = pg.'/adm/administrativo.php?link=63'; 
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				<script type=\"text/javascript\">
					alert(\"Mensagem de Contato não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>