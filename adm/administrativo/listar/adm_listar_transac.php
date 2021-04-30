<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$request = md5(implode($_POST));
		if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
			$_SESSION['retorno_erro_transac'] = "Pesquisa já realizada.";
			//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
			$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
			
			//Selecionar todos os itens da tabela 
			$result_transacoe = "SELECT * FROM transacoes  ORDER BY id DESC";
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
			$result_transacoes = "SELECT * FROM transacoes ORDER BY id DESC limit $inicio, $quantidade_pg";
			$resultado_transacoes = mysqli_query($conn , $result_transacoes);
			$total_transacoes = mysqli_num_rows($resultado_transacoes);
		}else{
			$_SESSION['ultima_request'] = $request;
			if(!empty($_POST['data_inicio']) && !empty($_POST['data_final'])){
				//echo "Pesquisar Inicio: " . $_POST['data_inicio'] . " Data Final: " . $_POST['data_final'];
				$data_inicio = $_POST['data_inicio'];
				$data_final = $_POST['data_final'];
				
				//Variavel global
				$_SESSION['data_inicio'] = $_POST['data_inicio'];
				$_SESSION['data_final'] = $_POST['data_final'];
				
				//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
				$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
				
				//Selecionar todos os itens da tabela 
				$result_transacoe = "SELECT * FROM transacoes WHERE created BETWEEN '$data_inicio' AND '$data_final' ORDER BY id DESC";
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
				$result_transacoes = "SELECT * FROM transacoes WHERE created BETWEEN '$data_inicio' AND '$data_final' ORDER BY id DESC limit $inicio, $quantidade_pg";
				$resultado_transacoes = mysqli_query($conn , $result_transacoes);
				$total_transacoes = mysqli_num_rows($resultado_transacoes);
			}else{
				$_SESSION['retorno_erro_transac'] = "Necessário preencher data inicio e data final.";
				//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
				$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
				
				//Selecionar todos os itens da tabela 
				$result_transacoe = "SELECT * FROM transacoes  ORDER BY id DESC";
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
				$result_transacoes = "SELECT * FROM transacoes ORDER BY id DESC limit $inicio, $quantidade_pg";
				$resultado_transacoes = mysqli_query($conn , $result_transacoes);
				$total_transacoes = mysqli_num_rows($resultado_transacoes);
			}
		}
	}else{
		//Entra no if abaixo quando um item está sendo pesquisado
		if(isset($_SESSION['data_inicio']) && isset($_SESSION['data_final'])){			
			//Variavel global
			$data_inicio = $_SESSION['data_inicio'];
			$data_final = $_SESSION['data_final'];
			
			//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
			$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
			
			//Selecionar todos os itens da tabela 
			$result_transacoe = "SELECT * FROM transacoes WHERE created BETWEEN '$data_inicio' AND '$data_final' ORDER BY id DESC";
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
			$result_transacoes = "SELECT * FROM transacoes WHERE created BETWEEN '$data_inicio' AND '$data_final' ORDER BY id DESC limit $inicio, $quantidade_pg";
			$resultado_transacoes = mysqli_query($conn , $result_transacoes);
			$total_transacoes = mysqli_num_rows($resultado_transacoes);
		}else{ //Acessa o Else quando não há item pesquisado
			//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
			$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
			
			//Selecionar todos os itens da tabela 
			$result_transacoe = "SELECT * FROM transacoes  ORDER BY id DESC";
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
			$result_transacoes = "SELECT * FROM transacoes ORDER BY id DESC limit $inicio, $quantidade_pg";
			$resultado_transacoes = mysqli_query($conn , $result_transacoes);
			$total_transacoes = mysqli_num_rows($resultado_transacoes);
		}		
	}
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
        <h1>Lista de Transações</h1>
	</div>
	<form class="form-inline" method="POST" action="">
		<div class="form-group">
			<label for="exampleInputName2">Data de Inicio</label>
			<input type="date" name="data_inicio" class="form-control" id="exampleInputName2" placeholder="00/00/0000">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail2">Data Final</label>
			<input type="date" name="data_final" class="form-control" id="exampleInputEmail2" placeholder="00/00/0000">
		</div>
		<button type="submit" class="btn btn-info">Pesquisar</button>
	</form>
	<hr>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo/listar/gerar_pdf_transac.php"><button type='button' class='btn btn-sm btn-warning'>Gerar PDF</button></a>
			<?php
				if(isset($_SESSION['data_inicio']) && isset($_SESSION['data_final'])){	
					?> <a href="administrativo/processa/adm_apagar_sessao_pesq_transc.php"><button type='button' class='btn btn-sm btn-warning'>Limpar pesquisa</button></a> 
					<a href="administrativo/listar/gerar_planilha_transac_pesq.php?data_inicio=<?php echo $_SESSION['data_inicio']; ?>&data_final=<?php echo $_SESSION['data_final']; ?>"><button type='button' class='btn btn-sm btn-danger'>Gerar Excel da pesquisa</button></a><?php
				}else{
					?><a href="administrativo/listar/gerar_planilha_transac.php"><button type='button' class='btn btn-sm btn-danger'>Gerar Excel</button></a> <?php
				}
			?>			
			<a href="#"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center hidden-xs">Transação</th>
						<th class="text-center">Status</th>
						<th class="text-center">Cliente</th>
						<th class="text-center hidden-xs">Data</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_transacoes = mysqli_fetch_assoc($resultado_transacoes)){?>
						<tr>
							<td class="text-center"><?php echo $row_transacoes["id"]; ?></td>
							<td class="text-center hidden-xs"><?php echo $row_transacoes["transacao_cod"]; ?></td>
							<td class="text-center"><?php echo $row_transacoes["status_transacao"]; ?></td>
							<td class="text-center"><?php echo $row_transacoes["nome"]; ?></td>
							<td class="text-center hidden-xs"><?php
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
						?><a href="administrativo.php?link=83&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
						<li><a href="administrativo.php?link=83&pagina=<?php echo $i; ?>">
							<?php echo $i; ?>
						</a></li>
					<?php
				}
			?>
			<li>
				<?php 
					if($pagina_posterior <= $num_pagina){
						?><a href="administrativo.php?link=83&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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