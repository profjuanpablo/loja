<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_carrouse = "SELECT * FROM carrouses ORDER BY ordem ASC";
	$resultado_carrouse = mysqli_query($conn , $result_carrouse);
	
	//Contar o total de itens
	$total_carrouses = mysqli_num_rows($resultado_carrouse);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_carrouses/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_carrouses = "SELECT * FROM carrouses ORDER BY ordem ASC limit $inicio, $quantidade_pg";
	$resultado_carrouses = mysqli_query($conn , $result_carrouses);
	$total_carrouses = mysqli_num_rows($resultado_carrouses);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista Carrousel</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=69"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center hidden-xs">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Ordem</th>
						<th class="text-center hidden-xs">Situação</th>
						<th class="text-center hidden-xs">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_carrouses = mysqli_fetch_assoc($resultado_carrouses)){?>
						<tr>
							<td class="text-center hidden-xs"><?php echo $row_carrouses["id"]; ?></td>
							<td class="text-center"><?php echo $row_carrouses["nome"]; ?></td>
							<td class="text-center"><?php echo $row_carrouses["ordem"]; ?></td>
							<td class="text-center hidden-xs">
								<?php $situacoes_carrouse_id = $row_carrouses["situacoes_carrouse_id"]; 
									$result_sit_carrouses = "SELECT * FROM situacoes_carrouses WHERE id = '$situacoes_carrouse_id' LIMIT 1";
									$resultado_sit_carrouses = mysqli_query($conn, $result_sit_carrouses);
									$row_sit_carrouses= mysqli_fetch_assoc($resultado_sit_carrouses);
									?><span class="label label-<?php echo $row_sit_carrouses['cor']; ?>"><?php echo $row_sit_carrouses['nome']; ?></span>
							</td>
							<td class="text-center hidden-xs"><?php echo date('d/m/Y H:i:s',strtotime($row_carrouses["created"])); ?></td>
							<td class="text-center">
								<?php if($row_carrouses["ordem"] == 1){ ?>
									<span class="glyphicon glyphicon glyphicon-arrow-up text-success" aria-hidden="true"></span>
								<?php }else{ ?>
									<a href="administrativo/processa/adm_alt_ordem_carrousel.php?id=<?php echo $row_carrouses["id"]; ?>&alteracao=up&ordem=<?php echo $row_carrouses["ordem"]; ?>">
										<span class="glyphicon glyphicon glyphicon-arrow-up text-success" aria-hidden="true"></span>
									</a>
								<?php }
								
								if($row_carrouses["ordem"] == $total_carrouses){ ?>
									<span class="glyphicon glyphicon glyphicon-arrow-down text-success" aria-hidden="true"></span>
								<?php } else{ ?>
									<a href="administrativo/processa/adm_alt_ordem_carrousel.php?id=<?php echo $row_carrouses["id"]; ?>&alteracao=down&ordem=<?php echo $row_carrouses["ordem"]; ?>">
										<span class="glyphicon glyphicon glyphicon-arrow-down text-success" aria-hidden="true"></span>
									</a>
								<?php } ?>
								<a href="administrativo.php?link=68&id=<?php echo $row_carrouses["id"]; ?>">
									<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
								</a>
								<a href="administrativo.php?link=70&id=<?php echo $row_carrouses["id"]; ?>">
									<span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
								</a>
								<a href="administrativo/processa/adm_apagar_carrouses.php?id=<?php echo $row_carrouses["id"]; ?>">
									<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
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
						?><a href="administrativo.php?link=67&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=67&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=67&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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