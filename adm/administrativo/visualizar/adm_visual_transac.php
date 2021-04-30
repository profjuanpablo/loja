<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_transacoes = "SELECT * FROM transacoes WHERE id = '$id' LIMIT 1";
	$resultado_transacoes = mysqli_query($conn, $result_transacoes);
	$row_transacoes = mysqli_fetch_assoc($resultado_transacoes);	
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
        <h1>Visualizar Transação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=83">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=86&id=<?php echo $row_transacoes["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_transac.php?id=<?php echo $row_transacoes["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_transacoes['id']; ?></dd>
		<dt>Codigo da Transação: </dt>
		<dd><?php echo $row_transacoes['transacao_cod']; ?></dd>
		<dt>Data da Transacao: </dt>
		<dd>
			<?php echo date('d/m/Y H:i:s',strtotime($row_transacoes['data_transacao'])); ?>
		</dd>
		<dt>Tipo de Pagamento: </dt>
		<dd><?php echo $row_transacoes['tipo_pagamento']; ?></dd>
		<dt>Status da Transação: </dt>
		<dd><?php echo $row_transacoes['status_transacao']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_transacoes['nome']; ?></dd>
		<dt>E-mail: </dt>
		<dd><?php echo $row_transacoes['email']; ?></dd>
		<dt>Endereço: </dt>
		<dd><?php echo $row_transacoes['endereco']; ?></dd>
		<dt>Número: </dt>
		<dd><?php echo $row_transacoes['numero']; ?></dd>
		<dt>Complemento: </dt>
		<dd><?php echo $row_transacoes['complemento']; ?></dd>
		<dt>Bairro: </dt>
		<dd><?php echo $row_transacoes['bairro']; ?></dd>
		<dt>Cidade: </dt>
		<dd><?php echo $row_transacoes['cidade']; ?></dd>
		<dt>UF: </dt>
		<dd><?php echo $row_transacoes['uf']; ?></dd>
		<dt>CEP: </dt>
		<dd><?php echo $row_transacoes['cep']; ?></dd>
		<dt>Produto: </dt>
		<dd><?php 
			if(isset($row_transacoes['produto_id'])){
				if($row_transacoes['produto_id'] == 3){
					echo "Ultimate";
				}elseif($row_transacoes['produto_id'] == 2){
					echo "Standard";					
				}else{
					echo "Free";
				}
			}?>
		</dd>
		<dt>Preço: </dt>
		<dd><?php echo $row_transacoes['preco']; ?></dd>
		<dt>ID do Carrinho: </dt>
		<dd><?php echo $row_transacoes['carrinho_id']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_transacoes['created'])){
				$inserido = $row_transacoes['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_transacoes['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_transacoes['modified'])); 
			} ?>
		</dd>
	</dl>
</div>