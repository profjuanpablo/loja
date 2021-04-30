<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_sit_comentario = "SELECT * FROM situacoes_comentarios WHERE id = '$id' LIMIT 1";
		$resultado_sit_comentario = mysqli_query($conn, $result_sit_comentario);
		$row_sit_comentario = mysqli_fetch_assoc($resultado_sit_comentario);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Situação para Comentário Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=79"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_sit_comentario" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_sit_comentario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" required
				<?php
					if(!empty($row_sit_comentario['nome'])){
						echo "value='".$row_sit_comentario['nome']."'";
					}
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['nome_sit_artigo_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['nome_sit_artigo_vazio']."</p>";
						unset($_SESSION['nome_sit_artigo_vazio']);
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cor</label>
			<div class="col-sm-10">
				<select class="form-control" name="cor">
					<option value="">Selecione</option>
					<option value='default'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "default"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "default"){
								echo 'selected';
							}
						} 
						?>
					>Cinza</option>
					<option value='primary'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "primary"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "primary"){
								echo 'selected';
							}
						} ?>
					>Azul escuro</option>
					<option value='success'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "success"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "success"){
								echo 'selected';
							}
						} ?>
					>Verde</option>
					<option value='info'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "info"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "info"){
								echo 'selected';
							}
						} ?>
					>Azul claro</option>
					<option value='warning'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "warning"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "warning"){
								echo 'selected';
							}
						} ?>
					>Laranjado</option>
					<option value='danger'
						<?php
						if(!empty($_SESSION['value_cor'])){
							if($_SESSION['value_cor'] == "danger"){
								echo 'selected';
								unset($_SESSION['value_cor']);
							}
						}
						if(!empty($row_sit_comentario['cor'])){
							if($row_sit_comentario['cor'] == "danger"){
								echo 'selected';
							}
						} ?>
					>Vermelho</option>
				</select>
				<?php 
					if(!empty($_SESSION['sit_cont_value_cor_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['sit_cont_value_cor_vazio']."</p>";
						unset($_SESSION['sit_cont_value_cor_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Legenda da cores</label>
			<div class="col-sm-10">
				<span class="label label-default">Cinza</span>
				<span class="label label-primary">Azul escuro</span>
				<span class="label label-success">Verde</span>
				<span class="label label-info">Azul claro</span>
				<span class="label label-warning">Laranjado</span>
				<span class="label label-danger">Vermelho</span>
			</div>
		</div>
				
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_sit_comentario['id'])){
					echo "value='".$row_sit_comentario['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Editar" onclick="return val_adm_cad_sit_comentario()">
			</div>
		</div>
	</form>
</div>