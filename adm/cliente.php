<?php
	session_start();		
	include_once('../lib/confin_url.php');
	include_once("conexao/conexao.php");
	include_once("seguranca.php");
	seguranca_cliente();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Area do Cliente</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">
	
		<?php include_once("cliente/menu_cliente.php"); 			
			
			$pag[1] = "cliente/cliente_home.php";
			$pag[2] = "cliente/visualizar/cliente_visual_usuario.php";			
			$pag[3] = "cliente/editar/cliente_editar_usuario.php";
			
			$pag[4] = "cliente/editar/cliente_editar_usuario_compl.php";
			$pag[5] = "cliente/visualizar/cliente_visual_carrinho_user.php";
			
			$pag[50] = "cliente/visualizar/conteudo_free_standard_ultimate.php";
			$pag[51] = "cliente/visualizar/conteudo_standard_ultimate.php";
			$pag[52] = "cliente/visualizar/conteudo_ultimate.php";
			
			$pag[53] = "cliente/listar/cliente_listar_pagamentos.php";
			$pag[54] = "cliente/visualizar/cliente_visual_pagamento.php";
			$pag[55] = "cliente/cadastro/cliente_cad_pagamento.php";
			$pag[56] = "cliente/visualizar/cliente_visual_pag_pendente.php";
			$pag[57] = "cliente/visualizar/cliente_visual_pag_upgrade.php";
			
			$pag[61] = "cliente/visualizar/conteudo_free_standard_ultimate1.php";
			$pag[62] = "cliente/visualizar/conteudo_free_standard_ultimate2.php";
			
			
			$pag[71] = "cliente/visualizar/conteudo_standard_ultimate1.php";			
			$pag[72] = "cliente/visualizar/conteudo_standard_ultimate2.php";			
			$pag[73] = "cliente/visualizar/conteudo_standard_ultimate3.php";			
			$pag[74] = "cliente/visualizar/conteudo_standard_ultimate4.php";
			
			$pag[81] = "cliente/visualizar/conteudo_ultimate1.php";
			$pag[82] = "cliente/visualizar/conteudo_ultimate2.php";
			$pag[83] = "cliente/visualizar/conteudo_ultimate3.php";
			$pag[84] = "cliente/visualizar/conteudo_ultimate4.php";
			$pag[85] = "cliente/visualizar/conteudo_ultimate5.php";
			$pag[86] = "cliente/visualizar/conteudo_ultimate6.php";
			
			
			if(!empty($_GET["link"])){
				$link = $_GET["link"];
				if(file_exists($pag[$link])){
					include $pag[$link];
				}else{
					include "cliente/cliente_home.php";
				}				
			}else{
				include "cliente/cliente_home.php";
			}
		
		?>	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
