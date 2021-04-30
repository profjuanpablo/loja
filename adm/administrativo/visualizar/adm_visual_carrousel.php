<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_carrouses = "SELECT * FROM carrouses WHERE id = '$id' LIMIT 1";
	$resultado_carrouses = mysqli_query($conn, $result_carrouses);
	$row_carrouses = mysqli_fetch_assoc($resultado_carrouses);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Carrousel</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=67">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=8&id=<?php echo $row_carrouses["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_carrouses.php?id=<?php echo $row_carrouses["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">	
		<dt>Id: </dt>
		<dd><?php echo $row_carrouses['id']; ?></dd>		
		<dt>Situação: </dt>
		<dd>
			<?php 
			$situacoes_carrouse_id = $row_carrouses['situacoes_carrouse_id'];
			$result_sit_carrouses = "SELECT * FROM situacoes_carrouses WHERE id = '$situacoes_carrouse_id'";
			$result_sit_carrouses = mysqli_query($conn, $result_sit_carrouses);
			$row_sit_carrouses = mysqli_fetch_assoc($result_sit_carrouses);
			?><span class="label label-<?php echo $row_sit_carrouses['cor']; ?>"><?php echo $row_sit_carrouses['nome']; ?></span>
		</dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_carrouses['nome']; ?></dd>
		<dt>Ordem: </dt>
		<dd><?php echo $row_carrouses['ordem']; ?></dd>
		<dt>Imagem: </dt>
		<dd>
			<img src="../carrousel/<?php echo $row_carrouses['imagem']; ?>" width="300" height="100">
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_carrouses['created'])){
				$inserido = $row_carrouses['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_carrouses['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_carrouses['modified'])); 
			} ?>
		</dd>
	</dl>
</div>