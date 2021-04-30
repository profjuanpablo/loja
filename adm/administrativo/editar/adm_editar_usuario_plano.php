<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_usuarios_planos = "SELECT * FROM usuarios_planos WHERE usuario_id = '$id' LIMIT 1";
		$resultado_usuarios_planos = mysqli_query($conn, $result_usuarios_planos);
		$row_usuarios_planos = mysqli_fetch_assoc($resultado_usuarios_planos);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Plano</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=2"><button type='button' class='btn btn-sm btn-success'>Listar Usuários</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_usuario_plano.php" enctype="multipart/form-data">
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
					if(!empty($row_usuarios_planos['plano_id'])){
						if($row_usuarios_planos['plano_id'] == 1){
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
					if(!empty($row_usuarios_planos['plano_id'])){
						if($row_usuarios_planos['plano_id'] == 2){
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
					if(!empty($row_usuarios_planos['plano_id'])){
						if($row_usuarios_planos['plano_id'] == 3){
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
			<label class="col-sm-2 control-label">Data de Vencimento</label>
			<div class="col-sm-10">
				<?php
					$dataFormatada = date("Y-m-d", strtotime($row_usuarios_planos['data_vencimento']));
				?>
				<input type="date" name="data_vencimento" class="form-control" id="inputEmail3" 
				<?php				
					if(!empty($row_usuarios_planos['data_vencimento'])){ 
						echo "value='".$dataFormatada."'";
					}
					if(!empty($_SESSION['value_data_vencimento'])){
						echo "value='".$_SESSION['value_data_vencimento']."'";
						unset($_SESSION['value_data_vencimento']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['data_vencimento_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['data_vencimento_vazio']."</p>";
						unset($_SESSION['data_vencimento_vazio']);
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
				if(!empty($row_usuarios_planos['id'])){
					echo "value='".$row_usuarios_planos['id']."'";
				}
			?>>
		<input type="hidden" name="usuario_id" 
			<?php
				if(!empty($_SESSION['value_id_usuario'])){
					echo "value='".$_SESSION['value_id_usuario']."'";
					unset($_SESSION['value_id_usuario']);
				}
				if(!empty($row_usuarios_planos['usuario_id'])){
					echo "value='".$row_usuarios_planos['usuario_id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Alterar">
			</div>
		</div>
	</form>
</div>