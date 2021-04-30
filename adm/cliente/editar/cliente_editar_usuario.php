<?php
	if(!empty($_SESSION['usuarioId'])){
		$id = $_SESSION['usuarioId'];
		//Buscar os dados referente ao usuario situado neste id
		$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Usuário</h1>
	</div>
	<form class="form-horizontal" method="POST" action="cliente/processa/cliente_proc_edita_usuario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" required
				<?php
					if(!empty($row_usuario['nome'])){
						echo "value='".$row_usuario['nome']."'";
					}
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['usuario_nome_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_nome_vazio']."</p>";
						unset($_SESSION['usuario_nome_vazio']);
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha" value="" required  
				<?php
					if(!empty($_SESSION['value_senha'])){
						echo "value='".$_SESSION['value_senha']."'";
						unset($_SESSION['value_senha']);
					}
					if(!empty($row_usuario['senha'])){
						echo "value=''";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_senha_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_senha_vazio']."</p>";
						unset($_SESSION['usuario_senha_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Foto Anterior: </label>
			<div class="col-sm-10">
				<?php
					if(!empty($row_usuario['foto'])){
						?><img src="cliente/foto/<?php echo $row_usuario['foto']; ?>" width="150" height="150">
							<input type="hidden" name="imagem_antiga" value="<?php echo $row_usuario['foto']; ?>">
						<?php
					}
					elseif(!empty($_SESSION['value_imagem_antiga'])){
						?><img src="cliente/foto/<?php echo $_SESSION['value_imagem_antiga']; ?>" width="150" height="150"><?php
						unset($_SESSION['value_imagem_antiga']);
					}else{}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Foto: </label>
			<div class="col-sm-10">
				<input type="file" name="arquivo"/>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
				<a href="cliente.php?link=2&id=<?php echo $_SESSION['usuarioId']; ?>">
					<button type="button" class="btn btn-success">Cancelar</button>
				</a>
			</div>
		</div>
	</form>
</div>