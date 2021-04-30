<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_sit_contatos = "SELECT * FROM situacoes_contatos WHERE id = '$id' LIMIT 1";
	$resultado_sit_contatos = mysqli_query($conn, $result_sit_contatos);
	$row_sit_contatos = mysqli_fetch_assoc($resultado_sit_contatos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação Contatos</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=75">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=78&id=<?php echo $row_sit_contatos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_sit_contatos.php?id=<?php echo $row_sit_contatos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_sit_contatos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_sit_contatos['nome']; ?></dd>
		<dt>Cor: </dt>
		<dd>
			<span class="label label-<?php echo $row_sit_contatos['cor']; ?>"><?php echo $row_sit_contatos['nome']; ?></span>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_sit_contatos['created'])){
				$inserido = $row_sit_contatos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_sit_contatos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_sit_contatos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>