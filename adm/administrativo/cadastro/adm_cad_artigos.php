<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=55"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_artigos" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_artigos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo" class="form-control" id="inputEmail3" placeholder="Titulo do Artigo" required
				<?php
					if(!empty($_SESSION['value_titulo'])){
						echo "value='".$_SESSION['value_titulo']."'";
						unset($_SESSION['value_titulo']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['artigo_titulo_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_titulo_vazio']."</p>";
						unset($_SESSION['artigo_titulo_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Conteúdo</label>
			<div class="col-sm-10">
				
				<?php
					if(!empty($_SESSION['value_conteudo'])){
						?> <textarea name="conteudo" class="form-control" rows="3"><?php echo $_SESSION['value_conteudo']; ?></textarea> <?php						
						unset($_SESSION['value_conteudo']);
					}else{
						?> <textarea name="conteudo" class="form-control" rows="3"></textarea> <?php
					}
				?>					
				
				<?php 
					if(!empty($_SESSION['artigo_conteudo_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_conteudo_vazio']."</p>";
						unset($_SESSION['artigo_conteudo_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Descriçao Curta</label>
			<div class="col-sm-10">
				
				<?php
					if(!empty($_SESSION['value_descricao'])){
						?> <textarea name="descricao" class="form-control" rows="3"><?php echo $_SESSION['value_descricao']; ?></textarea> <?php						
						unset($_SESSION['value_descricao']);
					}else{
						?> <textarea name="descricao" class="form-control" rows="3"></textarea> <?php
					}
				?>					
				
				<?php 
					if(!empty($_SESSION['artigo_descricao_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_descricao_vazio']."</p>";
						unset($_SESSION['artigo_descricao_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Slug: </label>
			<div class="col-sm-10">
				<input type="text" name="slug" class="form-control" id="inputEmail3" placeholder="Slug do Artigo" required
				<?php
					if(!empty($_SESSION['value_slug'])){
						echo "value='".$_SESSION['value_slug']."'";
						unset($_SESSION['value_slug']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['artigo_slug_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_slug_vazio']."</p>";
						unset($_SESSION['artigo_slug_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Imagem: </label>
			<div class="col-sm-10">
				<input type="file" name="imagem"/>
				<?php 
					if(!empty($_SESSION['artigo_imagem_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_imagem_vazio']."</p>";
						unset($_SESSION['artigo_imagem_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Categoria</label>
			<div class="col-sm-10">
				<select class="form-control" name="categorias_artigo_id">
					<option value="">Selecione</option>
					<?php
					$result_cat_artigos = "SELECT * FROM categorias_artigos";
					$result_cat_artigos = mysqli_query($conn, $result_cat_artigos);
					while($row_cat_artigos = mysqli_fetch_assoc($result_cat_artigos)){ ?> 
						<option value="<?php echo $row_cat_artigos['id']; ?>"
						
						<?php
						if(!empty($_SESSION['value_cat_artigo_id'])){
							if($_SESSION['value_cat_artigo_id'] == $row_cat_artigos['id']){
								echo 'selected';
								unset($_SESSION['value_cat_artigo_id']);
							}
						}
						?>						
						><?php echo $row_cat_artigos['nome']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['artigo_cat_artigos_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_cat_artigos_vazio']."</p>";
						unset($_SESSION['artigo_cat_artigos_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_artigo_id">
					<option value="">Selecione</option>
					<?php
					$result_sit_artigos = "SELECT * FROM situacoes_artigos";
					$result_sit_artigos = mysqli_query($conn, $result_sit_artigos);
					while($row_sit_artigos = mysqli_fetch_assoc($result_sit_artigos)){ ?> 
						<option value="<?php echo $row_sit_artigos['id']; ?>"
						
						<?php
						if(!empty($_SESSION['value_sit_artigo_id'])){
							if($_SESSION['value_sit_artigo_id'] == $row_sit_artigos['id']){
								echo 'selected';
								unset($_SESSION['value_sit_artigo_id']);
							}
						}
						?>						
						><?php echo $row_sit_artigos['nome']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['artigo_sit_artigos_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['artigo_sit_artigos_vazio']."</p>";
						unset($_SESSION['artigo_sit_artigos_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_adm_cad_artigos()">
			</div>
		</div>
	</form>
</div>