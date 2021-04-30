<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Carrousel</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=67"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_carrousel" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_carrousel.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome do Carrousel</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Carrousel" required
				<?php
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['carrousel_nome_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['carrousel_nome_vazio']."</p>";
						unset($_SESSION['carrousel_nome_vazio']);
					}
				?> 
			</div>
		</div>
				
		<div class="form-group">
			<label class="col-sm-2 control-label">Imagem: </label>
			<div class="col-sm-10">
				<input type="file" name="imagem"/>
				<?php 
					if(!empty($_SESSION['carrousel_imagem_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['carrousel_imagem_vazio']."</p>";
						unset($_SESSION['carrousel_imagem_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_carrouse_id">
					<option value="">Selecione</option>
					<?php
					$result_sit_carrouses = "SELECT * FROM situacoes_carrouses";
					$result_sit_carrouses = mysqli_query($conn, $result_sit_carrouses);
					while($row_sit_carrouses = mysqli_fetch_assoc($result_sit_carrouses)){ ?> 
						<option value="<?php echo $row_sit_carrouses['id']; ?>"
						
						<?php
						if(!empty($_SESSION['value_sit_carrousel_id'])){
							if($_SESSION['value_sit_artigo_id'] == $row_sit_carrouses['id']){
								echo 'selected';
								unset($_SESSION['value_sit_carrousel_id']);
							}
						}
						?>						
						><?php echo $row_sit_carrouses['nome']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['carrousel_sit_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['carrousel_sit_vazio']."</p>";
						unset($_SESSION['carrousel_sit_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_adm_cad_carrousel()">
			</div>
		</div>
	</form>
</div>