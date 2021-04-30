<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_sit_comentarios = "SELECT * FROM situacoes_comentarios WHERE id = '$id' LIMIT 1";
	$resultado_sit_comentarios = mysqli_query($conn, $result_sit_comentarios);
	$row_sit_comentarios = mysqli_fetch_assoc($resultado_sit_comentarios);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação Contatos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=79">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=82&id=<?php echo $row_sit_comentarios["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_sit_coment.php?id=<?php echo $row_sit_comentarios["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_sit_comentarios['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_sit_comentarios['nome']; ?></dd>
		<dt>Cor: </dt>
		<dd>
			<span class="label label-<?php echo $row_sit_comentarios['cor']; ?>"><?php echo $row_sit_comentarios['nome']; ?></span>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_sit_comentarios['created'])){
				$inserido = $row_sit_comentarios['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_sit_comentarios['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_sit_comentarios['modified'])); 
			} ?>
		</dd>
	</dl>
</div>