<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_artigo = "SELECT * FROM artigos ORDER BY id DESC";
	$resultado_artigo = mysqli_query($conn , $result_artigo);
	
	//Contar o total de itens
	$total_artigos = mysqli_num_rows($resultado_artigo);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 5;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_artigos/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_artigos = "SELECT * FROM artigos ORDER BY id DESC limit $inicio, $quantidade_pg";
	$resultado_artigos = mysqli_query($conn , $result_artigos);
	$total_artigos = mysqli_num_rows($resultado_artigos);
?>
<!-- Inicio blog -->
<div class="container pag-blog">
	<?php while($row_artigos = mysqli_fetch_assoc($resultado_artigos)){?>
		<div class="row featurette">
			<div class="col-md-6">
				<a href="<?php echo pg.'/artigo/'.$row_artigos['slug']; ?>">
					<img class="featurette-image img-responsive center-block" src="foto/<?php echo $row_artigos['imagem']; ?>" alt="<?php echo $row_artigos['titulo']; ?>">
				</a>
			</div>
			<div class="col-md-6">
				<a href="<?php echo pg.'/artigo/'.$row_artigos['slug']; ?>">
					<h2 class="featurette-heading"><?php echo $row_artigos['titulo']; ?></h2>
				</a>
				<p class="lead"><?php echo $row_artigos['descricao']; ?></p>
			</div>
		</div>
		
		<hr class="featurette-divider">
	<?php } ?>
	<?php
		//Verificar pagina anterior e posterior
		$pagina_anterior = $pagina - 1;
		$pagina_posterior = $pagina + 1;
	?>
	<nav class="text-center">
		<ul class="pagination">
			<li>
				<?php 
					if($pagina_anterior != 0){
						?><a href="<?php echo pg.'/blog'; ?>&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a><?php
					}else{
						?><span aria-hidden="true">&laquo;</span><?php
					}
				?>
			</li>
			<?php
				//Apresentar a paginação
				for($i = 1; $i < $num_pagina + 1; $i++){
					?>
						<li><a href="<?php echo pg.'/blog'; ?>&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="<?php echo pg.'/blog'; ?>&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a><?php
					}else{
						?><span aria-hidden="true">&raquo;</span><?php
					}
				?>
			</li>
		</ul>
	</nav>
</div>
<!-- Fim Blog -->