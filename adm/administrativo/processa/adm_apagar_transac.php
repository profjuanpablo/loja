<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	$id = $_GET['id'];
	
	$result_transacoes = "DELETE FROM transacoes WHERE id = '$id'";
	$resultado_transacoes = mysqli_query($conn, $result_transacoes);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			$url = pg.'/adm/administrativo.php?link=83';
			$_SESSION['retorno_sucesso_transac'] = "Transação apagada com Sucesso.";
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
		}else{
			$url = pg.'/adm/administrativo.php?link=83';
			$_SESSION['retorno_erro_transac'] = "Transação não foi apagada com Sucesso.";
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
		}?>
	</body>
</html>
<?php $conn->close(); ?>