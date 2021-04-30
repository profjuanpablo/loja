<?php
	session_start();
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
		
	if(empty($_POST['titulo'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_titulo_vazio'] = "Campo titulo é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_titulo'] = $_POST['titulo'];
	}
	
	if(empty($_POST['conteudo'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_conteudo_vazio'] = "Campo conteúdo é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_conteudo'] = $_POST['conteudo'];
	}
	
	if(empty($_POST['descricao'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_descricao_vazio'] = "Campo descrição é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_descricao'] = $_POST['descricao'];
	}
	
	if(empty($_POST['slug'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_slug_vazio'] = "Campo slug é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_slug'] = $_POST['slug'];
	}
	
	if(!empty($_POST['imagem_antiga'])){
		$_SESSION['value_imagem_antiga'] = $_POST['imagem_antiga'];
	}
	
	if(empty($_POST['categorias_artigo_id'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_cat_artigos_vazio'] = "Campo Categoria é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_cat_artigo_id'] = $_POST['categorias_artigo_id'];
	}
	
	if(empty($_POST['situacoes_artigo_id'])){
		$url = pg.'/adm/administrativo.php?link=58'; 
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
		";	
		$_SESSION['artigo_sit_artigos_vazio'] = "Campo Situação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_sit_artigo_id'] = $_POST['situacoes_artigo_id'];
	}
	
	if($salvar_dados_bd == 1){
		
		$id 					= mysqli_real_escape_string($conn, $_POST['id']);
		$titulo 				= mysqli_real_escape_string($conn, $_POST['titulo']);
		$conteudo 				= mysqli_real_escape_string($conn, $_POST['conteudo']);
		$slug 					= mysqli_real_escape_string($conn, $_POST['slug']);
		$categorias_artigo_id 	= mysqli_real_escape_string($conn, $_POST['categorias_artigo_id']);
		$situacoes_artigo_id 	= mysqli_real_escape_string($conn, $_POST['situacoes_artigo_id']);
		$descricao		 		= mysqli_real_escape_string($conn, $_POST['descricao']);
		
		if(empty($_FILES['imagem']['name'])){
			
			$result_artigos = "UPDATE artigos SET 
			titulo='$titulo', 
			conteudo='$conteudo', 
			descricao='$descricao',
			slug='$slug', 
			categorias_artigo_id='$categorias_artigo_id', 
			situacoes_artigo_id='$situacoes_artigo_id', 
			modified =  NOW() 
			WHERE id = '$id'";
		}else{
			$nome_img 				= time()."-".$_FILES['imagem']['name'];
			$imagem_antiga_apagar 				= mysqli_real_escape_string($conn, $_POST['imagem_antiga']);
			
			$result_artigos = "UPDATE artigos SET 
			titulo='$titulo', 
			conteudo='$conteudo',
			descricao='$descricao', 
			slug='$slug', 
			imagem='$nome_img', 
			categorias_artigo_id='$categorias_artigo_id', 
			situacoes_artigo_id='$situacoes_artigo_id', 
			modified =  NOW() 
			WHERE id = '$id'";
			
			$nome_foto_antiga = "../../../foto/".$imagem_antiga_apagar;
			unlink($nome_foto_antiga);
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../../../foto/';		
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['imagem']['tmp_name'],$_UP['pasta'].$nome_img)){
			}
		}		
		
		$resultado_artigos = mysqli_query($conn, $result_artigos);			
		
		unset($_SESSION['value_titulo']);
		unset($_SESSION['value_conteudo']);
		unset($_SESSION['value_slug']);
		unset($_SESSION['artigo_imagem_vazio']);
		unset($_SESSION['value_imagem_antiga']);
		unset($_SESSION['value_cat_artigo_id']);
		unset($_SESSION['value_sit_artigo_id']);
		unset($_SESSION['value_descricao']);
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$url = pg.'/adm/administrativo.php?link=55'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Artigo alterado com Sucesso.\");
						</script>
					";	
				}else{
					$url = pg.'/adm/administrativo.php?link=55'; 
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
						<script type=\"text/javascript\">
							alert(\"Artigo não foi alterado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}else{
		$_SESSION['value_id'] = $_POST['id'];
	}
	$conn->close(); ?>