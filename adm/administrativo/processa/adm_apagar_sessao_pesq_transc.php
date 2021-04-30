<?php
	session_start();	
	include_once('../../../lib/confin_url.php');
	
	unset($_SESSION['data_inicio']);
	unset($_SESSION['data_final']);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<?php
			$url = pg.'/adm/administrativo.php?link=83';
			$_SESSION['retorno_sucesso_transac'] = "Pesquisa apagada com Sucesso.";
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";	
		?>
	</body>
</html>