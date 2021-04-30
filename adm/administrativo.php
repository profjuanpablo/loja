<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao/conexao.php");	
	seguranca_adm();
	include_once('../lib/confin_url.php');
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

		<title>Administrativo</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/javascriptpersonalizado.js"></script>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>

	<body role="document">
	
		<?php include_once("administrativo/menu_adm.php"); 			
			
			$pag[1] = "administrativo/adm_home.php";
			
			$pag[2] = "administrativo/listar/adm_listar_usuario.php";
			$pag[3] = "administrativo/cadastro/adm_cad_usuario.php";
			$pag[4] = "administrativo/editar/adm_editar_usuario.php";
			$pag[5] = "administrativo/visualizar/adm_visual_usuario.php";
			
			$pag[6] = "administrativo/listar/adm_listar_nivel_acesso.php";
			$pag[7] = "administrativo/cadastro/adm_cad_nivel_acesso.php";			
			$pag[8] = "administrativo/editar/adm_editar_nivel_acesso.php";
			$pag[9] = "administrativo/visualizar/adm_visual_nivel_acesso.php";
			
			$pag[10] = "administrativo/listar/adm_listar_situacoes.php";
			$pag[11] = "administrativo/cadastro/adm_cad_situacoes.php";			
			$pag[12] = "administrativo/editar/adm_editar_situacoes.php";
			$pag[13] = "administrativo/visualizar/adm_visual_situacoes.php";
			
			$pag[14] = "administrativo/pesquisar/adm_pesq_usuario.php";
			$pag[15] = "administrativo/editar/adm_editar_usuario_senha.php";
			
			$pag[50] = "administrativo/listar/adm_listar_cat_artigos.php";
			
			$pag[51] = "administrativo/listar/adm_listar_sit_artigos.php";
			$pag[52] = "administrativo/visualizar/adm_visual_sit_artigos.php";
			$pag[53] = "administrativo/cadastro/adm_cad_sit_artigos.php";			
			$pag[54] = "administrativo/editar/adm_editar_sit_artigos.php";
			
			$pag[55] = "administrativo/listar/adm_listar_artigos.php";
			$pag[56] = "administrativo/visualizar/adm_visual_artigos.php";
			$pag[57] = "administrativo/cadastro/adm_cad_artigos.php";			
			$pag[58] = "administrativo/editar/adm_editar_artigos.php";
			
			$pag[59] = "administrativo/listar/adm_listar_coment_artigos.php";
			$pag[60] = "administrativo/visualizar/adm_visual_coment_artigos.php";
			$pag[61] = "administrativo/cadastro/adm_cad_coment_artigos.php";			
			$pag[62] = "administrativo/editar/adm_editar_coment_artigos.php";
			
			$pag[63] = "administrativo/listar/adm_listar_msg_contato.php";
			$pag[64] = "administrativo/visualizar/adm_visual_msg_contato.php";
			$pag[65] = "administrativo/cadastro/adm_cad_msg_contato.php";			
			$pag[66] = "administrativo/editar/adm_editar_msg_contato.php";
			
			$pag[67] = "administrativo/listar/adm_listar_carrousel.php";
			$pag[68] = "administrativo/visualizar/adm_visual_carrousel.php";
			$pag[69] = "administrativo/cadastro/adm_cad_carrousel.php";			
			$pag[70] = "administrativo/editar/adm_editar_carrousel.php";
			
			$pag[71] = "administrativo/listar/adm_listar_sit_carrousel.php";
			$pag[72] = "administrativo/visualizar/adm_visual_sit_carrousel.php";
			$pag[73] = "administrativo/cadastro/adm_cad_sit_carrousel.php";
			$pag[74] = "administrativo/editar/adm_editar_sit_carrousel.php";
			
			$pag[75] = "administrativo/listar/adm_listar_sit_msg_contato.php";
			$pag[76] = "administrativo/visualizar/adm_visual_sit_msg_contato.php";
			$pag[77] = "administrativo/cadastro/adm_cad_sit_msg_contato.php";
			$pag[78] = "administrativo/editar/adm_editar_sit_msg_contato.php";
			
			$pag[79] = "administrativo/listar/adm_listar_sit_coment.php";
			$pag[80] = "administrativo/visualizar/adm_visual_sit_coment.php";
			$pag[81] = "administrativo/cadastro/adm_cad_sit_coment.php";
			$pag[82] = "administrativo/editar/adm_editar_sit_coment.php";
			
			$pag[83] = "administrativo/listar/adm_listar_transac.php";
			$pag[84] = "administrativo/visualizar/adm_visual_transac.php";
			$pag[85] = "administrativo/cadastro/adm_cad_transac.php";
			$pag[86] = "administrativo/editar/adm_editar_transac.php";

			$pag[87] = "administrativo/listar/adm_listar_carrinho.php";
			$pag[88] = "administrativo/visualizar/adm_visual_carrinho.php";
			$pag[89] = "administrativo/cadastro/adm_cad_carrinho.php";
			$pag[90] = "administrativo/editar/adm_editar_carrinho.php";	
			
			//$pag[91] = "administrativo/listar/adm_listar_carrinho_user.php";
			$pag[92] = "administrativo/visualizar/adm_visual_carrinho_user.php";
			//$pag[93] = "administrativo/cadastro/adm_cad_carrinho_user.php";
			//$pag[94] = "administrativo/editar/adm_editar_carrinho_user.php";	

			$pag[95] = "administrativo/listar/adm_listar_usuario_plano.php";
			$pag[96] = "administrativo/visualizar/adm_visual_usuario_plano.php";
			$pag[97] = "administrativo/cadastro/adm_cad_usuario_plano.php";
			$pag[98] = "administrativo/editar/adm_editar_usuario_plano.php";
			
			$pag[99] = "administrativo/listar/adm_listar_transac_user.php";
			
			if(!empty($_GET["link"])){
				$link = $_GET["link"];
				if(file_exists($pag[$link])){
					include $pag[$link];
				}else{
					include "administrativo/adm_home.php";
				}				
			}else{
				include "administrativo/adm_home.php";
			}
		
		?>	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		<script type="text/javascript" src="js/modal.js"></script>
	</body>
</html>
