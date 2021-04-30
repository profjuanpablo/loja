<?php
	if(isset($url[1])){
		$plano = $url[1];
		$_SESSION['plano'] = $plano;
	}else{
		$plano = "free";
		$_SESSION['plano'] = $plano;
	}	
?>
<div class="espaco-cad-email">
	<div class="row">
		<div class="text-center" style="margin-bottom: 60px;">
			<h1>Cadastre-se Grátis</h1>
		</div>
		<form name="adm_cad_usuario" class="form-horizontal" method="POST" action="<?php echo pg.'/processa/proc_cad_usuario_email.php'; ?>" enctype="multipart/form-data">
			<div class="col-sm-3 col-md-3">
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Informe seu e-mail e ganhe 7 dias gratuitos"
						<?php
							if(!empty($_SESSION['value_email'])){
								echo "value='".$_SESSION['value_email']."'";
								unset($_SESSION['value_email']);
							}
						?>
						>
						<?php 
							if(!empty($_SESSION['usuario_email_vazio'])){
								echo "<p style='color: #fff; '>".$_SESSION['usuario_email_vazio']."</p>";
								unset($_SESSION['usuario_email_vazio']);
							}echo $_SESSION['plano'];
						?> 
					</div>
				</div>
			</div>
			<input name="plano" type="hidden" value="<?php echo $plano; ?>">
			<div class="col-sm-3 col-md-3">
			</div>
			<div class="col-md-12 text-center">
					<input type="submit" class="btn btn-danger" value="Cadastrar" onclick="return val_adm_cad_usuario()">
			</div>
		</form>
	</div>
</div>	
	<!-- Inicio Serviços -->
	<div class="container marketing espaco-servicos text-center">
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="<?php echo pg.'/imagens/servico-um.png'; ?>" alt="Generic placeholder image" width="140" height="140">
				<h2>Automatize</h2>
				<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="<?php echo pg.'/imagens/servico-tres.png'; ?>" alt="Generic placeholder image" width="140" height="140">
				<h2>Gestão Avançada</h2>
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="<?php echo pg.'/imagens/servico-dois.png'; ?>" alt="Generic placeholder image" width="140" height="140">
				<h2>Venda Online</h2>
				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	</div>
	<!-- Fim Serviços -->

