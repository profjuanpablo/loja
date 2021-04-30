<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_cat_artigo = "SELECT * FROM categorias_artigos";
	$resultado_cat_artigo = mysqli_query($conn , $result_cat_artigo);
	
	//Contar o total de itens
	$total_cat_artigos = mysqli_num_rows($resultado_cat_artigo);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_cat_artigos/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_cat_artigos = "SELECT * FROM categorias_artigos limit $inicio, $quantidade_pg";
	$resultado_cat_artigos = mysqli_query($conn , $result_cat_artigos);
	$total_cat_artigos = mysqli_num_rows($resultado_cat_artigos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Categoria dos Artigo</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#cadastrar">
				Cadastrar
			</button>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_cat_artigos = mysqli_fetch_assoc($resultado_cat_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_cat_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_cat_artigos["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_cat_artigos["created"])); ?></td>
							<td class="text-center">								
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row_cat_artigos["id"]; ?>" data-whatevernome="<?php echo $row_cat_artigos["nome"]; ?>" data-whateverinserido="<?php echo $row_cat_artigos["created"]; ?>" data-whateveralterado="<?php echo $row_cat_artigos["modified"]; ?>">Visualizar</button>
								
								<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editar" data-whatever="<?php echo $row_cat_artigos["id"]; ?>" data-whatevernome="<?php echo $row_cat_artigos["nome"]; ?>">Editar</button>
								
								<a href="administrativo/processa/adm_apagar_cat_artigo.php?id=<?php echo $row_cat_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
	
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
						?><a href="administrativo.php?link=50&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=50&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=50&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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

<?php include_once("administrativo/editar/adm_editar_cat_artigo.php"); ?>
<?php include_once("administrativo/visualizar/adm_visual_cat_artigos.php"); ?>
<?php include_once("administrativo/cadastro/adm_cad_cat_artigo.php"); ?>
