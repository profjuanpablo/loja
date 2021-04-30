<!-- Inicio Carousel -->
<div class="espaco-topo">			
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
			$controle_ativo_circulo = 2; //Variavel para controlar a impressao do slide ativo
			$controle_num_slide = 1; //Variavel para controlar a impressao do circulo do slide
			//Selecionar todos os slides do carrousel
			$result_carrouse = "SELECT * FROM carrouses WHERE situacoes_carrouse_id = '1' ORDER BY ordem ASC";
			$resultado_carrouse = mysqli_query($conn , $result_carrouse);
			while($row_carrouse = mysqli_fetch_assoc($resultado_carrouse)){
				if($controle_ativo_circulo == 1){ ?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $controle_num_slide; ?>"></li>
				<?php $controle_num_slide++;
				}
				if($controle_ativo_circulo == 2){?>
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<?php 
					$controle_ativo_circulo = 1;
				}
			} ?>			
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php
			$controle_ativo = 2; //Variavel para controlar a impressao do slide ativo
			//Selecionar todos os slides do carrousel
			$result_carrouses = "SELECT * FROM carrouses WHERE situacoes_carrouse_id = '1' ORDER BY ordem ASC";
			$resultado_carrouses = mysqli_query($conn , $result_carrouses);
			while($row_carrouses = mysqli_fetch_assoc($resultado_carrouses)){
				if($controle_ativo == 1){ ?>
					<div class="item">
						<img class="<?php echo $row_carrouses["id"]; ?>" src="carrousel/<?php echo $row_carrouses["imagem"]; ?>" alt="<?php echo $row_carrouses["nome"]; ?>">
					</div>
				<?php }
				if($controle_ativo == 2){?>
					<div class="item active">
						<img class="<?php echo $row_carrouses["id"]; ?>" src="carrousel/<?php echo $row_carrouses["imagem"]; ?>" alt="<?php echo $row_carrouses["nome"]; ?>">
					</div>
					<?php 
					$controle_ativo = 1;
				}
			} ?>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<!-- Fim Carousel -->

<!-- Inicio Serviços -->
<div class="container marketing espaco-servicos text-center">
	<div class="row">
		<div class="col-lg-4">
			<img class="img-circle" src="imagens/servico-um.png" alt="Generic placeholder image" width="140" height="140">
			<h2>Automatize</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle" src="imagens/servico-tres.png" alt="Generic placeholder image" width="140" height="140">
			<h2>Gestão Avançada</h2>
			<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle" src="imagens/servico-dois.png" alt="Generic placeholder image" width="140" height="140">
			<h2>Venda Online</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		</div><!-- /.col-lg-4 -->
	</div><!-- /.row -->
</div>
<!-- Fim Serviços -->

<!-- Inicio artigos recentes -->
<div class="espaco-artigo">
	<div class="container">
		<div class="row espaco-artigo-titulo">
			<h2>Artigos Recentes</h2>
		</div>
		<div class="row">
			<?php
				//Buscar os utimos 6 artigos
				$result_artigos_sug = "SELECT * FROM artigos ORDER BY id DESC LIMIT 4";
				$resultado_artigos_sug = mysqli_query($conn, $result_artigos_sug);
				while($rows_artigos_sug = mysqli_fetch_assoc($resultado_artigos_sug)){
					?><div class="col-md-3">
						<div class="text-center">
							<a href="<?php echo pg.'/artigo/'.$rows_artigos_sug['slug']; ?>">
								<img src="<?php echo pg.'/foto/'.$rows_artigos_sug['imagem']; ?>" alt="<?php echo $rows_artigos_sug['titulo']; ?>" class="img-rounded"  width="140" height="120">
							</a>
							<h2>
								<a href="<?php echo pg.'/artigo/'.$rows_artigos_sug['slug']; ?>">
									<?php echo $rows_artigos_sug['titulo']; ?>
								</a>
							</h2>
						</div>
						<p><?php echo $rows_artigos_sug['descricao']; ?></p>
					</div><?php
				}
			?>
		</div>
	</div>
</div>
<!-- Fim artigos recentes -->

<!-- Inicio Inscreva-se -->
<div class="espaco-inscreva">
	<div class="container">
		<p>Por que você está esperando? Comece a usar hoje!</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Abrir Conta Grátis &raquo;</a></p>
	</div>
</div>
<!-- Fim Inscreva-se -->