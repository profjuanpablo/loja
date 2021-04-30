<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_carrinho = "SELECT * FROM carrinhos";
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
	$result_carrinhos = "SELECT * FROM carrinhos limit $inicio, $quantidade_pg";
	$resultado_carrinhos = mysqli_query($conn , $result_carrinhos);
	$total_carrinhos = mysqli_num_rows($resultado_carrinhos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
		<?php
			if(isset($_SESSION['retorno_sucesso_transac'])){ ?>
				<div class="alert alert-success" role="alert"><?php echo $_SESSION['retorno_sucesso_transac']; ?></div>
				<?php 
				unset($_SESSION['retorno_sucesso_transac']);
			}			
			if(isset($_SESSION['retorno_erro_transac'])){ ?>
				<div class="alert alert-danger" role="alert"><?php echo $_SESSION['retorno_erro_transac']; ?></div>
				<?php 
				unset($_SESSION['retorno_erro_transac']);
			}
		?>	
        <h1>Lista de Carrinho</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="#"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Cliente</th>
						<th class="text-center hidden-xs">Transação</th>
						<th class="text-center">Status</th>
						<th class="text-center hidden-xs">Plano</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_carrinhos = mysqli_fetch_assoc($resultado_carrinhos)){?>
						<tr>
							<td class="text-center"><?php echo $row_carrinhos["id"]; ?></td>
							<td class="text-center"><?php 
								$usuarios_id = $row_carrinhos["usario_id"]; 
								$result_usuarios = "SELECT nome FROM usuarios WHERE id = '$usuarios_id' LIMIT 1";
								$resultado_usuarios = mysqli_query($conn, $result_usuarios);
								$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);
								echo $row_usuarios['nome']; ?>
							</td>
							<td class="text-center hidden-xs"><?php echo $row_carrinhos["transacao_cod"]; ?></td>
							<td class="text-center"><?php
								$transacao_cod = $row_carrinhos["transacao_cod"]; 
								$result_transacao = "SELECT status_transacao FROM transacoes WHERE transacao_cod = '$transacao_cod' ORDER BY id DESC LIMIT 1";
								$resultado_transacao = mysqli_query($conn, $result_transacao);
								$row_transacao = mysqli_fetch_assoc($resultado_transacao);
								echo $row_transacao['status_transacao'];?>
							</td>
							<td class="text-center hidden-xs"><?php 
								if(isset($row_carrinhos['plano_id'])){
									if($row_carrinhos['plano_id'] == 3){
										echo "Ultimate";
									}elseif($row_carrinhos['plano_id'] == 2){
										echo "Standard";					
									}else{
										echo "Free";
									}
								}?>
							</td>
							<td class="text-center">
								<a href="administrativo.php?link=92&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=90&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_carrinho.php?id=<?php echo $row_carrinhos["id"]; ?>">
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
						?><a href="administrativo.php?link=87&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=87&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=87&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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