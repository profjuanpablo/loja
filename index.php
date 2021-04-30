<?php
	session_start();
	include_once('lib/confin_url.php');
	include_once('adm/conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Funil de Venda</title>
		<link href="<?php echo pg.'/css/bootstrap.css'; ?>" rel="stylesheet">		
		<link href="<?php echo pg.'/css/personalizado.css'; ?>" rel="stylesheet">	
		<link rel="icon" href="<?php echo pg.'/imagens/favicon.ico'; ?>">
		<script type="text/javascript" src="<?php echo pg.'/js/javascriptpersonalizado.js'; ?>"></script>
	</head>
	<body>
		<?php include_once("menu.php"); 
		
			$url = (isset($_GET['url'])) ? $_GET['url']:'home.php';
			$url = array_filter(explode('/',$url));
			
			$file = $url[0].'.php';
			
			if(is_file($file)){
				include $file;
			}else{
				include_once("home.php");
			}	
		
		
		include_once("rodape.php"); ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>