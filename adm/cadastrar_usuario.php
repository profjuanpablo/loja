<?php
	session_start();
	ob_start();
	include_once("conexao/conexao.php");	
	if(isset($_SESSION['plano'])){
		$plano = $_SESSION['plano'];
	}else{
		$plano = "free";
		$_SESSION['plano'] = $plano;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Cadastrar usuário</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/javascriptpersonalizado.js"></script>
	</head>

	<body role="document">
		<div class="container theme-showcase" role="main">
			<div class="page-header text-center">
				<h1>Completar o cadastro</h1>
			</div>
			<form name="cad_usuario" class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" required
						<?php
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
							}elseif(!empty($_SESSION['email_cad'])){								
								echo "value='".$_SESSION['email_cad']."'";
								unset($_SESSION['email_cad']);
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
					<label class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha"  
						<?php
							if(!empty($_SESSION['value_senha'])){
								echo "value='".$_SESSION['value_senha']."'";
								unset($_SESSION['value_senha']);
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
					<label class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-10">
						<input type="text" name="cpf" class="form-control" id="inputEmail3" placeholder="CPF" required
						<?php
							if(!empty($_SESSION['value_cpf'])){
								echo "value='".$_SESSION['value_cpf']."'";
								unset($_SESSION['value_cpf']);
							}
						?>
						>
						<?php 
							if(!empty($_SESSION['usuario_cpf_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['usuario_cpf_vazio']."</p>";
								unset($_SESSION['usuario_cpf_vazio']);
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
						<input type="text" name="cep" id="cep" class="form-control" id="inputEmail3" placeholder="CEP" size="10" maxlength="9" onblur="pesquisacep(this.value);" required
						<?php
							if(!empty($_SESSION['value_cep'])){
								echo "value='".$_SESSION['value_cep']."'";
								unset($_SESSION['value_cep']);
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
						<input type="text" name="rua" id="rua" class="form-control" id="inputEmail3" placeholder="Rua, av" required
						<?php
							if(!empty($_SESSION['value_rua'])){
								echo "value='".$_SESSION['value_rua']."'";
								unset($_SESSION['value_rua']);
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
						<input type="text" name="numero" class="form-control" id="inputEmail3" placeholder="Numero" required
						<?php
							if(!empty($_SESSION['value_numero'])){
								echo "value='".$_SESSION['value_numero']."'";
								unset($_SESSION['value_numero']);
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
						<input type="text" name="bairro"  id="bairro" class="form-control" id="inputEmail3" placeholder="Bairro" required
						<?php
							if(!empty($_SESSION['value_bairro'])){
								echo "value='".$_SESSION['value_bairro']."'";
								unset($_SESSION['value_bairro']);
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
						<input type="text" name="cidade" id="cidade" class="form-control" id="inputEmail3" placeholder="Cidade" required
						<?php
							if(!empty($_SESSION['value_cidade'])){
								echo "value='".$_SESSION['value_cidade']."'";
								unset($_SESSION['value_cidade']);
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
						<input type="text" name="uf" id="uf" class="form-control" id="inputEmail3" placeholder="uf"  required
						<?php
							if(!empty($_SESSION['value_uf'])){
								echo "value='".$_SESSION['value_uf']."'";
								unset($_SESSION['value_uf']);
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
				
				<input name="ibge" type="hidden" id="ibge" size="8"><?php echo $_SESSION['plano']; ?>
				<input name="plano" type="hidden" value="<?php echo $plano; ?>">
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_cad_usuario()">
					</div>
				</div>
			</form>
		</div>
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
