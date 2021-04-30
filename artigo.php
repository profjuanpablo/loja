<?php
	if(isset($url[1])){
		$slug_artigo = $url[1];
	}else{
		$destino = pg.'/home';
		header("Location: $destino");
	}
	
	//Buscar os dados referente ao artigo com este slug
	$result_artigos = "SELECT * FROM artigos WHERE slug LIKE '%$slug_artigo%' LIMIT 1";
	$resultado_artigos = mysqli_query($conn, $result_artigos);
	$row_artigos = mysqli_fetch_assoc($resultado_artigos);
	$id_artigo = $row_artigos['id'];;
	
?>
	<!-- Inicio corpo artigo -->
	<div class="container pag-blog">
		<div class="blog-header">
			<h1 class="blog-title"><?php echo $row_artigos['titulo']; ?></h1>
		</div>

		<div class="row">
			<div class="col-sm-8 blog-main">
				<div class="blog-post">
					<?php echo $row_artigos['conteudo']; ?>
		
				</div><!-- /.blog-post -->

			</div><!-- /.blog-main -->

			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
				<div class="sidebar-module sidebar-module-inset">
					<h4>Sobre Mim</h4>
					<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
				</div>
				<div class="sidebar-module">
					<h4>Ultimos Artigos</h4>
					<ol class="list-unstyled">
						<?php
							//Buscar os utimos 6 artigos
							$result_artigos_sug = "SELECT * FROM artigos ORDER BY id DESC LIMIT 6";
							$resultado_artigos_sug = mysqli_query($conn, $result_artigos_sug);
							while($rows_artigos_sug = mysqli_fetch_assoc($resultado_artigos_sug)){
								?><li><a href="<?php echo pg.'/artigo/'.$rows_artigos_sug['slug']; ?>"><?php echo $rows_artigos_sug['titulo']; ?></a></li><?php
							}
						?>
					</ol>
				</div>
			</div><!-- /.blog-sidebar -->

		</div><!-- /.row -->
		
	</div>
	<!-- Fim corpo artigo -->
	
	<?php
		$result_artigo = "SELECT * FROM artigos  LIMIT 4";
		$resultado_artigo = mysqli_query($conn , $result_artigo);
	?>
	<!-- Inicio artigos recentes -->
	<div class="espaco">
		<div class="container">			
			<div class="row">
				<h2>Sugestões</h2>
			</div>
			<div class="row">
				<?php while($row_artigo = mysqli_fetch_assoc($resultado_artigo)){ ?>
					<div class="col-md-3">
						<div class="text-center">
							<a href="<?php echo pg.'/artigo/'.$row_artigo['slug']; ?>">
								<img src="<?php echo pg.'/foto/'.$row_artigo['imagem']; ?>" alt="..." class="img-rounded" width="140" height="120">
							</a>
							<a href="<?php echo pg.'/artigo/'.$row_artigo['slug']; ?>">
								<h2><?php echo $row_artigo['titulo']; ?></h2>
							</a>
						</div>
						<?php echo $row_artigo['descricao']; ?>
					</div>
				<?php } ?>
			</div>				
		</div>
	</div>
	<!-- Fim artigos recentes -->
	
	<!-- Inicio Comentario -->
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$requisicao = md5(implode($_POST));
			if(isset($_SESSION['ultima_requisicao']) && $_SESSION['ultima_requisicao'] == $requisicao){
				echo "
					<script type=\"text/javascript\">
						alert(\"Campo nome, email e mensagem são obrigatorios .\");
					</script>
					";
			}else{
				$_SESSION['ultima_requisicao'] = $requisicao;
				//echo "Valor da requisicao: ". $requisicao.' - '. $_SESSION['ultima_requisicao'];
				
				$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
				if(isset($_POST['nome'])){
					if(empty($_POST['nome'])){
						$_SESSION['coment_artigo_nome_vazio'] = "Campo nome é obrigatorio!";		
						$salvar_dados_bd = 2;
						//echo $_SESSION['coment_artigo_nome_vazio'];
					}else{
						$_SESSION['value_nome'] = $_POST['nome'];
					}
					
					if(empty($_POST['email'])){
						$_SESSION['coment_artigo_email_vazio'] = "Campo E-mail é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_email'] = $_POST['email'];
					}
					
					if(empty($_POST['mensagem'])){
						$_SESSION['coment_artigo_mensag_vazio'] = "Campo Mensagem é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_mensag'] = $_POST['mensagem'];
					}
					
					if($salvar_dados_bd == 1){
						$id_artigo 		= mysqli_real_escape_string($conn, $_POST['id_artigo']);
						$nome 		= mysqli_real_escape_string($conn, $_POST['nome']);
						$email 		= mysqli_real_escape_string($conn, $_POST['email']);
						$mensagem 	= mysqli_real_escape_string($conn, $_POST['mensagem']);
						$mensagem = nl2br($mensagem);
						$result_coment_artigo = "INSERT INTO comentarios_artigos (
							nome,
							email,	
							mensagem,
							artigo_id,
							situacoes_comentario_id,
							created)VALUES(
							'$nome',
							'$email',
							'$mensagem',
							'$id_artigo',
							'1',
							NOW())";
						$resultado_coment_artig = mysqli_query($conn, $result_coment_artigo);
					}
				}
			}
		}
	?>	
	<div class="container">	
		<div class="row">
			<h2>Deixe seu Comentários</h2>
		</div>
		<div class="row">
			<form name="adm_cad_coment_artigo" action="" method="POST" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" required
						<?php
							if(!empty($_SESSION['value_nome'])){
								echo "value='".$_SESSION['value_nome']."'";
								unset($_SESSION['value_nome']);
							}
						?>					
						/>
						<?php 
							if(!empty($_SESSION['coment_artigo_nome_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['coment_artigo_nome_vazio']."</p>";
								unset($_SESSION['coment_artigo_nome_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required
						<?php
							if(!empty($_SESSION['value_email'])){
								echo "value='".$_SESSION['value_email']."'";
								unset($_SESSION['value_email']);
							}
						?>					
						/>
						<?php 
							if(!empty($_SESSION['coment_artigo_email_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['coment_artigo_email_vazio']."</p>";
								unset($_SESSION['coment_artigo_email_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Mensagem</label>
					<div class="col-sm-10">
						
						<?php
							if(!empty($_SESSION['value_mensag'])){
								?> <textarea name="mensagem" class="form-control" rows="3"><?php echo $_SESSION['value_mensag']; ?></textarea> <?php						
								unset($_SESSION['value_mensag']);
							}else{
								?> <textarea name="mensagem" class="form-control" rows="3"></textarea> <?php
							}
						?>					
						
						<?php 
							if(!empty($_SESSION['coment_artigo_mensag_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['coment_artigo_mensag_vazio']."</p>";
								unset($_SESSION['coment_artigo_mensag_vazio']);
							}
						?> 
					</div>
				</div>
				
				<input type="hidden" value="<?php echo $id_artigo; ?>" name="id_artigo">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-primary" value="Enviar" onclick="return val_cad_coment_artigo()">
					</div>
				</div>
			</form>
		</div>
		<div class="row">
			<h2>Comentários</h2>
		</div>
		<?php
			$result_coment_artigos = "SELECT * FROM comentarios_artigos WHERE artigo_id = '$id_artigo'";
			$resultado_coment_artigos = mysqli_query($conn , $result_coment_artigos);
		?>
		<?php while($row_coment_artigos = mysqli_fetch_assoc($resultado_coment_artigos)){?>
			<div class="media">
				<div class="media-left media-middle">
					<img class="media-object" src="<?php echo pg.'/imagens/icone_usuario_sem_fundo.png'; ?>" alt="..." width="80" height="80">
				</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $row_coment_artigos['nome']; ?></h4>
					<p><?php echo $row_coment_artigos['mensagem']; ?></p>
					<p><?php echo nl2br($row_coment_artigos['mensagem']); ?></p>
				</div>
			</div>
		<?php } ?>		
	</div>
	<!-- Fim Comentario -->
	
	