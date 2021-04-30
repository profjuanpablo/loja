<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$_SESSION['listar_transc_id'] = $_GET['id'];
	}elseif(isset($_SESSION['listar_transc_id'])){
		$id = $_SESSION['listar_transc_id'];
	}
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_transacoe = "SELECT * FROM transacoes WHERE carrinho_id = '$id' ORDER BY id DESC";
	$resultado_transacoe = mysqli_query($conn , $result_transacoe);
	
	//Contar o total de itens
	$total_transacoes = mysqli_num_rows($resultado_transacoe);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 30;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_transacoes/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_transacoes = "SELECT * FROM transacoes WHERE carrinho_id = '$id' ORDER BY id DESC limit $inicio, $quantidade_pg";
	$resultado_transacoes = mysqli_query($conn , $result_transacoes);
	$total_transacoes = mysqli_num_rows($resultado_transacoes);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Transações</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=7"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Transação</th>
						<th class="text-center">Status</th>
						<th class="text-center">Cliente</th>
						<th class="text-center">Data</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_transacoes = mysqli_fetch_assoc($resultado_transacoes)){?>
						<tr>
							<td class="text-center"><?php echo $row_transacoes["id"]; ?></td>
							<td class="text-center"><?php echo $row_transacoes["transacao_cod"]; ?></td>
							<td class="text-center"><?php echo $row_transacoes["status_transacao"]; ?></td>
							<td class="text-center"><?php echo $row_transacoes["nome"]; ?></td>
							<td class="text-center"><?php
								echo date('d/m/Y H:i:s', strtotime($row_transacoes["created"])); ?>
							<td class="text-center">
								<a href="administrativo.php?link=84&id=<?php echo $row_transacoes["id"]; ?>">
									<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
								</a>
								<a href="administrativo.php?link=86&id=<?php echo $row_transacoes["id"]; ?>">
									<span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
								</a>
								<a href="administrativo/processa/adm_apagar_transac.php?id=<?php echo $row_transacoes["id"]; ?>" onclick="return confirm('Tem certeza de que deseja remover?');">
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
						?><a href="administrativo.php?link=99&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=99&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=99&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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