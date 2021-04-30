<?php
	$result_usuarios = "SELECT * FROM usuarios";
	$resultado_usuarios = mysqli_query($conn , $result_usuarios);
?>
<?php
	//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
	$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	
	//Selecionar todos os itens da tabela 
	$result_usuario = "SELECT * FROM usuarios";
	$resultado_usuario = mysqli_query($conn , $result_usuario);
	
	//Contar o total de itens
	$total_usuarios = mysqli_num_rows($resultado_usuario);
	
	//Seta a quantidade de itens por página
	$quantidade_pg = 20;
	
	//calcular o número de páginas 
	$num_pagina = ceil($total_usuarios/$quantidade_pg);
	
	//calcular o inicio da visualizao	
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
	
	//Selecionar  os itens da página
	$result_usuarios = "SELECT * FROM usuarios limit $inicio, $quantidade_pg";
	$resultado_usuarios = mysqli_query($conn , $result_usuarios);
	$total_usuarios = mysqli_num_rows($resultado_usuarios);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Usuários</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=14"><button type='button' class='btn btn-sm btn-info'>Pesquisar</button></a>
			<a href="administrativo.php?link=3"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Inscrição</th>
						<th class="text-center">Nome</th>
						<th class="text-center hidden-xs">E-mail</th>
						<th class="text-center hidden-xs">Situação</th>
						<th class="text-center hidden-xs">Nivel de Acesso</th>
						<th class="text-center hidden-xs">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)){?>
						<tr>
							<td class="text-center"><?php echo $row_usuarios["id"]; ?></td>
							<td class="text-center"><?php echo $row_usuarios["nome"]; ?></td>
							<td class="text-center hidden-xs"><?php echo $row_usuarios["email"]; ?></td>
							<td class="text-center hidden-xs">
								<?php $situacoe = $row_usuarios["situacoe_id"]; 
									$result_situacoe = "SELECT * FROM situacoes WHERE id = '$situacoe' LIMIT 1";
									$resultado_situacoe = mysqli_query($conn, $result_situacoe);
									$row_situacoe = mysqli_fetch_assoc($resultado_situacoe);
									?><span class="label label-<?php echo $row_situacoe['cor']; ?>"><?php echo $row_situacoe['nome']; ?></span>
							</td>
							<td class="text-center hidden-xs">
								<?php $nivel_acesso = $row_usuarios["niveis_acesso_id"]; 
									$result_nivel_acesso = "SELECT * FROM niveis_acessos WHERE id = '$nivel_acesso' LIMIT 1";
									$resultado_nivel_acesso = mysqli_query($conn, $result_nivel_acesso);
									$row_nivel_acesso = mysqli_fetch_assoc($resultado_nivel_acesso);
									echo $row_nivel_acesso['nome'];
								?>
							</td>
							<td class="text-center hidden-xs"><?php echo date('d/m/Y H:i:s',strtotime($row_usuarios["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=5&id=<?php echo $row_usuarios["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=4&id=<?php echo $row_usuarios["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_usuario.php?id=<?php echo $row_usuarios["id"]; ?>">
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
						?><a href="administrativo.php?link=2&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=2&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=2&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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