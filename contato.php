<!-- Inicio Comentario -->
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$requisicao = md5(implode($_POST));
			if(isset($_SESSION['ultima_requisicao']) && $_SESSION['ultima_requisicao'] == $requisicao){
				echo "
					<script type=\"text/javascript\">
						alert(\"Todos os campos são obrigatórios.\");
					</script>
					";
			}else{
				$_SESSION['ultima_requisicao'] = $requisicao;
				echo "Valor da requisicao: ". $requisicao.' - '. $_SESSION['ultima_requisicao'];
				
				$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
				if(isset($_POST['nome'])){
					if(empty($_POST['nome'])){
						$_SESSION['msg_contato_nome_vazio'] = "Campo nome é obrigatorio!";		
						$salvar_dados_bd = 2;
						//echo $_SESSION['coment_artigo_nome_vazio'];
					}else{
						$_SESSION['value_nome'] = $_POST['nome'];
					}
					
					if(empty($_POST['email'])){
						$_SESSION['msg_contato_email_vazio'] = "Campo E-mail é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_email'] = $_POST['email'];
					}
					
					if(empty($_POST['telefone'])){
						$_SESSION['msg_contato_telefone_vazio'] = "Campo telefone é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_telefone'] = $_POST['telefone'];
					}
					
					if(empty($_POST['assunto'])){
						$_SESSION['msg_contato_assunto_vazio'] = "Campo assunto é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_assunto'] = $_POST['assunto'];
					}
					
					if(empty($_POST['mensagem'])){
						$_SESSION['msg_contato_mensag_vazio'] = "Campo Mensagem é obrigatorio!";		
						$salvar_dados_bd = 2;
					}else{
						$_SESSION['value_mensag'] = $_POST['mensagem'];
					}
					
					if($salvar_dados_bd == 1){
						$nome 		= mysqli_real_escape_string($conn, $_POST['nome']);
						$email 		= mysqli_real_escape_string($conn, $_POST['email']);
						$telefone	= mysqli_real_escape_string($conn, $_POST['telefone']);
						$assunto	= mysqli_real_escape_string($conn, $_POST['assunto']);
						$mensagem 	= mysqli_real_escape_string($conn, $_POST['mensagem']);
						$result_msg_contato = "INSERT INTO mensagens_contatos (
							nome,
							email,	
							telefone,
							assunto,
							mensagem,
							situacoes_contato_id,
							created)VALUES(
							'$nome',
							'$email',
							'$telefone',
							'$assunto',
							'$mensagem',
							'1',
							NOW())";
						$resultado_msg_contato = mysqli_query($conn, $result_msg_contato);
						unset($_SESSION['value_nome']);
						unset($_SESSION['value_email']);
						unset($_SESSION['value_telefone']);
						unset($_SESSION['value_assunto']);
						unset($_SESSION['value_mensag']);
						echo "
						<script type=\"text/javascript\">
							alert(\"Mensagem enviada com sucesso.\");
						</script>
						";
					}
				}
			}
		}
	?>	
<!-- Inicio Contato -->
<div class="container espaco-contato">
	<div class="row featurette">
		<div class="col-md-6">
			<h2 class="featurette-heading">Contato por E-mail.</h2>
			<form name="cad_msg_contato" action="" method="POST" class="form-horizontal">
				
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
							if(!empty($_SESSION['msg_contato_nome_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['msg_contato_nome_vazio']."</p>";
								unset($_SESSION['msg_contato_nome_vazio']);
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
							if(!empty($_SESSION['msg_contato_email_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['msg_contato_email_vazio']."</p>";
								unset($_SESSION['msg_contato_email_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Telefone</label>
					<div class="col-sm-10">
						<input type="text" name="telefone" class="form-control" id="inputEmail3" placeholder="Telefone" required
						<?php
							if(!empty($_SESSION['value_telefone'])){
								echo "value='".$_SESSION['value_telefone']."'";
								unset($_SESSION['value_telefone']);
							}
						?>					
						/>
						<?php 
							if(!empty($_SESSION['msg_contato_telefone_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['msg_contato_telefone_vazio']."</p>";
								unset($_SESSION['msg_contato_telefone_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Assunto</label>
					<div class="col-sm-10">
						<input type="text" name="assunto" class="form-control" id="inputEmail3" placeholder="Assunto do contato" required
						<?php
							if(!empty($_SESSION['value_assunto'])){
								echo "value='".$_SESSION['value_assunto']."'";
								unset($_SESSION['value_assunto']);
							}
						?>					
						/>
						<?php 
							if(!empty($_SESSION['msg_contato_assunto_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['msg_contato_assunto_vazio']."</p>";
								unset($_SESSION['msg_contato_assunto_vazio']);
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
							if(!empty($_SESSION['msg_contato_mensag_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['msg_contato_mensag_vazio']."</p>";
								unset($_SESSION['msg_contato_mensag_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-primary" value="Enviar" onclick="return val_cad_msg_contato()">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h2 class="featurette-heading">Endereço.</h2>
			<p class="lead">
				<address>
					<strong>Celke.</strong><br>
					Av. Republica Argentina, 5550 - Capão Raso<br>
					CEP 81050-001 - Curitiba / PR<br>
					<abbr title="Phone">P:</abbr> (41) 3503-6170
				</address>
				<address>
					<strong>Cesar</strong><br>
					<a href="mailto:#">cesar@celke.com.br</a>
				</address>
			</p>
		</div>
	</div>
</div>
<!-- Fim Contato -->