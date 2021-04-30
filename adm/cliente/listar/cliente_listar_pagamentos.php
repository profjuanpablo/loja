<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$usuario_id = $_SESSION['usuarioId'];
	$result_carrinho = "SELECT * FROM carrinhos WHERE usario_id = $usuario_id  ORDER BY id DESC";
	$resultado_carrinho = mysqli_query($conn , $result_carrinho);
	
	//Contar o total de itens
	$total_carrinhos = mysqli_num_rows($resultado_carrinho);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_carrinhos/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_carrinhos = "SELECT * FROM carrinhos WHERE usario_id = $usuario_id  ORDER BY id DESC limit $inicio, $quantidade_pg";
	$resultado_carrinhos = mysqli_query($conn , $result_carrinhos);
	$total_carrinhos = mysqli_num_rows($resultado_carrinhos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Pagamentos</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="cliente.php?link=55"><button type='button' class='btn btn-sm btn-success'>Pagar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Número</th>
						<th class="text-center">Plano</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_carrinhos = mysqli_fetch_assoc($resultado_carrinhos)){
						$carrinho_id = $row_carrinhos["id"];
						$result_transacoes = "SELECT * FROM transacoes WHERE carrinho_id = '$carrinho_id' ORDER BY id DESC LIMIT 1";
						$resultado_transacoes = mysqli_query($conn , $result_transacoes);
						$row_transacoes = mysqli_fetch_assoc($resultado_transacoes);
						?>
						<tr>
							<td class="text-center"><?php echo $row_carrinhos["id"]; ?></td>
							<td class="text-center"><?php 
							if($row_carrinhos["plano_id"] == 1){
								echo "Free";
							}if($row_carrinhos["plano_id"] == 2){
								echo "Standard";
							}if($row_carrinhos["plano_id"] == 3){
								echo "Ultimate";
							}?></td>
							<td class="text-center"><?php echo $row_transacoes["status_transacao"]; 
								if(empty($row_transacoes["status_transacao"])){
									echo "Vazio";
								}
							?></td>
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
						?><a href="administrativo.php?link=55&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=55&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=55&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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