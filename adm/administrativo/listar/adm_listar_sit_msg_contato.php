<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_sit_contato = "SELECT * FROM situacoes_contatos";
	$resultado_sit_contato = mysqli_query($conn , $result_sit_contato);
	
	//Contar o total de itens
	$total_sit_contatos = mysqli_num_rows($resultado_sit_contato);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_sit_contatos/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_sit_contatos = "SELECT * FROM situacoes_contatos limit $inicio, $quantidade_pg";
	$resultado_sit_contatos = mysqli_query($conn , $result_sit_contatos);
	$total_sit_contatos = mysqli_num_rows($resultado_sit_contatos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Situação Contatos</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=77"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
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
					<?php while($row_sit_contatos = mysqli_fetch_assoc($resultado_sit_contatos)){?>
						<tr>
							<td class="text-center"><?php echo $row_sit_contatos["id"]; ?></td>
							<td class="text-center"><span class="label label-<?php echo $row_sit_contatos['cor']; ?>"><?php echo $row_sit_contatos['nome']; ?></span></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_sit_contatos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=76&id=<?php echo $row_sit_contatos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=78&id=<?php echo $row_sit_contatos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_sit_contatos.php?id=<?php echo $row_sit_contatos["id"]; ?>">
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
						?><a href="administrativo.php?link=75&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=75&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=75&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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