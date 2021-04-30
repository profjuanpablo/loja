<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_carrinhos = "SELECT * FROM carrinhos WHERE id = '$id' LIMIT 1";
		$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
		$row_carrinhos = mysqli_fetch_assoc($resultado_carrinhos);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Carrinhos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=87"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_nivel_acesso" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_carrinho.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Plano</label>
			<div class="col-sm-10">
				<select class="form-control" name="plano_id">
					<option value="">Selecione</option>
					
					<option value="1"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 1){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_carrinhos['plano_id'])){
						if($row_carrinhos['plano_id'] == 1){
							echo 'selected';
						}
					}
					?> >Free</option>
					
					<option value="2"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 2){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_carrinhos['plano_id'])){
						if($row_carrinhos['plano_id'] == 2){
							echo 'selected';
						}
					}
					?> >Standard</option>
					
					<option value="3"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 3){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_carrinhos['plano_id'])){
						if($row_carrinhos['plano_id'] == 3){
							echo 'selected';
						}
					}
					?> >Ultimate</option>
				</select>
				<?php 
					if(!empty($_SESSION['produto_id_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['produto_id_vazio']."</p>";
						unset($_SESSION['produto_id_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Preço</label>
			<div class="col-sm-10">
				<input type="text" name="preco" class="form-control" id="inputEmail3" placeholder="00,00" 
				<?php
					if(!empty($row_carrinhos['preco'])){
						echo "value='".$row_carrinhos['preco']."'";
					}
					if(!empty($_SESSION['value_preco'])){
						echo "value='".$_SESSION['value_preco']."'";
						unset($_SESSION['value_preco']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['preco_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['preco_vazio']."</p>";
						unset($_SESSION['preco_vazio']);
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
				if(!empty($row_carrinhos['id'])){
					echo "value='".$row_carrinhos['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Alterar" onclick="return val_cad_nivel_acesso()">
			</div>
		</div>
	</form>
</div>