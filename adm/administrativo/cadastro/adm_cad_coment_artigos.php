<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Comentário para Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=59"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form  name="adm_cad_coment_artigo" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_coment_artigo.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do usuário" required
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
				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail do usuário" required
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
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Artigo</label>
			<div class="col-sm-10">
				<select class="form-control" name="artigo_id">
					<option value="">Selecione</option>
					<?php
					$result_artigos = "SELECT * FROM artigos";
					$result_artigos = mysqli_query($conn, $result_artigos);
					while($row_artigos = mysqli_fetch_assoc($result_artigos)){ ?> 
						<option value="<?php echo $row_artigos['id']; ?>"
						
						<?php
						if(!empty($_SESSION['value_artigo_id'])){
							if($_SESSION['value_artigo_id'] == $row_artigos['id']){
								echo 'selected';
								unset($_SESSION['value_artigo_id']);
							}
						}
						?>						
						><?php echo $row_artigos['titulo']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['coment_artigos_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['coment_artigos_vazio']."</p>";
						unset($_SESSION['coment_artigos_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_comentario_id">
					<option value="">Selecione</option>
					<?php
					$result_sit_coment = "SELECT * FROM situacoes_comentarios";
					$result_sit_coment = mysqli_query($conn, $result_sit_coment);
					while($row_sit_coment = mysqli_fetch_assoc($result_sit_coment)){ ?> 
						<option value="<?php echo $row_sit_coment['id']; ?>"
						
						<?php
						if(!empty($_SESSION['value_sit_comenta_id'])){
							if($_SESSION['value_sit_comenta_id'] == $row_sit_coment['id']){
								echo 'selected';
								unset($_SESSION['value_sit_comenta_id']);
							}
						}
						?>						
						><?php echo $row_sit_coment['nome']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['coment_sit_comenta_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['coment_sit_comenta_vazio']."</p>";
						unset($_SESSION['coment_sit_comenta_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_cad_coment_artigo()">
			</div>
		</div>
	</form>
</div>