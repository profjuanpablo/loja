<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_carrinhos = "SELECT * FROM carrinhos WHERE id = '$id' LIMIT 1";
	$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
	$row_carrinhos = mysqli_fetch_assoc($resultado_carrinhos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Usuário</h1>
	</div>
	<dl class="dl-horizontal">	
		<dt>Id: </dt>
		<dd><?php echo $row_carrinhos['id']; ?></dd>
		<dt>Plano: </dt>
		<dd><?php 
			if(isset($row_carrinhos['plano_id'])){
				if($row_carrinhos['plano_id'] == 3){
					echo "Ultimate";
				}elseif($row_carrinhos['plano_id'] == 2){
					echo "Standard";					
				}else{
					echo "Free";
				}
			}?>
		</dd>
		<dt>Preço: </dt>
		<dd><?php echo $row_carrinhos['preco']; ?></dd>		
		<dt>Código da Transação: </dt>
		<dd><?php echo $row_carrinhos['transacao_cod']; ?></dd>	
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_carrinhos['created'])){
				$inserido = $row_carrinhos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_carrinhos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_carrinhos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>