<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_coment_artigo = "SELECT * FROM comentarios_artigos";
	$resultado_coment_artigo = mysqli_query($conn , $result_coment_artigo);
	
	//Contar o total de itens
	$total_coment_artigos = mysqli_num_rows($resultado_coment_artigo);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_coment_artigos/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_coment_artigos = "SELECT * FROM comentarios_artigos limit $inicio, $quantidade_pg";
	$resultado_coment_artigos = mysqli_query($conn , $result_coment_artigos);
	$total_coment_artigos = mysqli_num_rows($resultado_coment_artigos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Comentários</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=61"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">E-mail</th>
						<th class="text-center">Artigo</th>
						<th class="text-center">Inserido</th>						
						<th class="text-center">Situação</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_coment_artigos = mysqli_fetch_assoc($resultado_coment_artigos)){?>
						<tr>
							<td class="text-center"><?php echo $row_coment_artigos["id"]; ?></td>
							<td class="text-center"><?php echo $row_coment_artigos["email"]; ?></td>
							<td class="text-center">
								<?php $artigo_id = $row_coment_artigos["artigo_id"]; 
									$result_artigos = "SELECT * FROM artigos WHERE id = '$artigo_id' LIMIT 1";
									$resultado_artigos = mysqli_query($conn, $result_artigos);
									$row_artigos = mysqli_fetch_assoc($resultado_artigos);
									echo $row_artigos['titulo'];
								?>
							</td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_coment_artigos["created"])); ?></td>							
							<td class="text-center">							
								<?php $situacoes_comentario_id = $row_coment_artigos["situacoes_comentario_id"]; 
									$result_sit_coment = "SELECT * FROM situacoes_comentarios WHERE id = '$situacoes_comentario_id' LIMIT 1";
									$resultado_sit_coment = mysqli_query($conn, $result_sit_coment);
									$row_sit_coment = mysqli_fetch_assoc($resultado_sit_coment);
								?><span class="label label-<?php echo $row_sit_coment['cor']; ?>"><?php echo $row_sit_coment['nome']; ?></span>
							</td>
							<td class="text-center">
								<a href="administrativo.php?link=60&id=<?php echo $row_coment_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=62&id=<?php echo $row_coment_artigos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_coment_artigos.php?id=<?php echo $row_coment_artigos["id"]; ?>">
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
						?><a href="administrativo.php?link=59&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=59&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=59&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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