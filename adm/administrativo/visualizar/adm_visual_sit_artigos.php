<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_situacoes_artigos = "SELECT * FROM situacoes_artigos WHERE id = '$id' LIMIT 1";
	$resultado_situacoes_artigos = mysqli_query($conn, $result_situacoes_artigos);
	$row_situacoes_artigos = mysqli_fetch_assoc($resultado_situacoes_artigos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação para Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=51">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=54&id=<?php echo $row_situacoes_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_sit_artigos.php?id=<?php echo $row_situacoes_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_situacoes_artigos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><span class="label label-<?php echo $row_situacoes_artigos['cor']; ?>"><?php echo $row_situacoes_artigos['nome']; ?></span></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_situacoes_artigos['created'])){
				$inserido = $row_situacoes_artigos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_situacoes_artigos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_situacoes_artigos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>