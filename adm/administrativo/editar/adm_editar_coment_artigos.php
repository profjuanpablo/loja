<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_sit_coment = "SELECT * FROM comentarios_artigos WHERE id = '$id' LIMIT 1";
		$resultado_sit_coment = mysqli_query($conn, $result_sit_coment);
		$row_sit_coment = mysqli_fetch_assoc($resultado_sit_coment);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Comentário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=59"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_sit_coment" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_sit_coment.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" required
				<?php
					if(!empty($row_sit_coment['nome'])){
						echo "value='".$row_sit_coment['nome']."'";
					}
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
				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required
				<?php
					if(!empty($row_sit_coment['email'])){
						echo "value='".$row_sit_coment['email']."'";
					}
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
					}elseif(!empty($row_sit_coment['mensagem'])){
						?> <textarea name="mensagem" class="form-control" rows="3"><?php echo $row_sit_coment['mensagem']; ?>
						</textarea> <?php
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
		
		<?php if(!empty($row_sit_coment['artigo_id'])){
			$artigo_id = $row_sit_coment['artigo_id']; 
		}?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Artigo</label>
			<div class="col-sm-10">
				<select class="form-control" name="artigo_id">
					<option value="">Selecione</option>
					<?php
					$result_artigo = "SELECT * FROM artigos";
					$result_artigo = mysqli_query($conn, $result_artigo);
					while($row_artigo = mysqli_fetch_assoc($result_artigo)){ ?> 
						<option value="<?php echo $row_artigo['id']; ?>"<?php
						if(!empty($_SESSION['value_artigo_id'])){
							if($_SESSION['value_artigo_id'] == $row_artigo['id']){
								echo 'selected';
								unset($_SESSION['value_artigo_id']);
							}
						}
						if(!empty($row_sit_coment['artigo_id'])){
							if($artigo_id == $row_artigo['id']){
								echo 'selected';
							}
						}
						?> >						
						<?php echo $row_artigo['titulo']; ?></option>
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
		
		<?php if(!empty($row_sit_coment['situacoes_comentario_id'])){
			$situacoes_comentario_id = $row_sit_coment['situacoes_comentario_id']; 
		}?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_comentario_id">
					<option value="">Selecione</option>
					<?php
					$result_sit_comenta = "SELECT * FROM situacoes_comentarios";
					$result_sit_comenta = mysqli_query($conn, $result_sit_comenta);
					while($row_sit_comenta = mysqli_fetch_assoc($result_sit_comenta)){ ?> 
						<option value="<?php echo $row_sit_comenta['id']; ?>"<?php
						if(!empty($_SESSION['value_sit_comenta_id'])){
							if($_SESSION['value_sit_comenta_id'] == $row_sit_comenta['id']){
								echo 'selected';
								unset($_SESSION['value_sit_comenta_id']);
							}
						}
						if(!empty($row_sit_coment['situacoes_comentario_id'])){
							if($situacoes_comentario_id == $row_sit_comenta['id']){
								echo 'selected';
							}
						}
						?> >						
						<?php echo $row_sit_comenta['nome']; ?></option>
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
				
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_sit_coment['id'])){
					echo "value='".$row_sit_coment['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Editar" onclick="return val_adm_cad_sit_coment()">
			</div>
		</div>
	</form>
</div>