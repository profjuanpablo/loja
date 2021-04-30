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
	<form class="form-horizontal" method="POST" action="cliente/processa/cliente_proc_edita_usuario_compl.php" enctype="multipart/form-data">
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
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required
				<?php
					if(!empty($_SESSION['value_email'])){
						echo "value='".$_SESSION['value_email']."'";
						unset($_SESSION['value_email']);
					}
					if(!empty($row_usuario['email'])){
						echo "value='".$row_usuario['email']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_email_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_email_vazio']."</p>";
						unset($_SESSION['usuario_email_vazio']);
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
					if(!empty($row_usuario['telefone'])){
						echo "value='".$row_usuario['telefone']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_telefone_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_telefone_vazio']."</p>";
						unset($_SESSION['usuario_telefone_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">CEP</label>
			<div class="col-sm-10">
				<input type="text" name="cep" class="form-control" id="inputEmail3" placeholder="CEP" required
				<?php
					if(!empty($_SESSION['value_cep'])){
						echo "value='".$_SESSION['value_cep']."'";
						unset($_SESSION['value_cep']);
					}
					if(!empty($row_usuario['cep'])){
						echo "value='".$row_usuario['cep']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_cep_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_cep_vazio']."</p>";
						unset($_SESSION['usuario_cep_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Rua</label>
			<div class="col-sm-10">
				<input type="text" name="rua" class="form-control" id="inputEmail3" placeholder="Rua" required
				<?php
					if(!empty($_SESSION['value_rua'])){
						echo "value='".$_SESSION['value_rua']."'";
						unset($_SESSION['value_rua']);
					}
					if(!empty($row_usuario['endereco'])){
						echo "value='".$row_usuario['endereco']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_rua_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_rua_vazio']."</p>";
						unset($_SESSION['usuario_rua_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Número</label>
			<div class="col-sm-10">
				<input type="text" name="numero" class="form-control" id="inputEmail3" placeholder="Número" required
				<?php
					if(!empty($_SESSION['value_numero'])){
						echo "value='".$_SESSION['value_numero']."'";
						unset($_SESSION['value_numero']);
					}
					if(!empty($row_usuario['numero'])){
						echo "value='".$row_usuario['numero']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_numero_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_numero_vazio']."</p>";
						unset($_SESSION['usuario_numero_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Complemento</label>
			<div class="col-sm-10">
				<input type="text" name="complemento" class="form-control" id="inputEmail3" placeholder="Complemento"
				<?php
					if(!empty($_SESSION['value_complemento'])){
						echo "value='".$_SESSION['value_complemento']."'";
						unset($_SESSION['value_complemento']);
					}
					if(!empty($row_usuario['complemento'])){
						echo "value='".$row_usuario['complemento']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_complemento_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_complemento_vazio']."</p>";
						unset($_SESSION['usuario_complemento_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Bairro</label>
			<div class="col-sm-10">
				<input type="text" name="bairro" class="form-control" id="inputEmail3" placeholder="Bairro" required
				<?php
					if(!empty($_SESSION['value_bairro'])){
						echo "value='".$_SESSION['value_bairro']."'";
						unset($_SESSION['value_bairro']);
					}
					if(!empty($row_usuario['bairro'])){
						echo "value='".$row_usuario['bairro']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_bairro_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_bairro_vazio']."</p>";
						unset($_SESSION['usuario_bairro_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cidade</label>
			<div class="col-sm-10">
				<input type="text" name="cidade" class="form-control" id="inputEmail3" placeholder="Cidade" required
				<?php
					if(!empty($_SESSION['value_cidade'])){
						echo "value='".$_SESSION['value_cidade']."'";
						unset($_SESSION['value_cidade']);
					}
					if(!empty($row_usuario['cidade'])){
						echo "value='".$row_usuario['cidade']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_cidade_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_cidade_vazio']."</p>";
						unset($_SESSION['usuario_cidade_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-10">
				<input type="text" name="uf" class="form-control" id="inputEmail3" placeholder="uf" required
				<?php
					if(!empty($_SESSION['value_uf'])){
						echo "value='".$_SESSION['value_uf']."'";
						unset($_SESSION['value_uf']);
					}
					if(!empty($row_usuario['estado'])){
						echo "value='".$row_usuario['estado']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_uf_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_uf_vazio']."</p>";
						unset($_SESSION['usuario_uf_vazio']);
					}
				?> 
			</div>
		</div>
		
		
		<input name="ibge" type="hidden" id="ibge" size="8">
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_usuario['id'])){
					echo "value='".$row_usuario['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Editar" onclick="return val_adm_cad_usuario()">
			</div>
		</div>
	</form>
</div>