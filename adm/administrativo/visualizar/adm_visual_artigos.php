<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_artigos = "SELECT * FROM artigos WHERE id = '$id' LIMIT 1";
	$resultado_artigos = mysqli_query($conn, $result_artigos);
	$row_artigos = mysqli_fetch_assoc($resultado_artigos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar detalhes do Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=55">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=58&id=<?php echo $row_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_artigos.php?id=<?php echo $row_artigos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_artigos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd><?php echo $row_artigos['titulo']; ?></dd>
		<dt>Conteúdo: </dt>
		<dd><?php echo $row_artigos['conteudo']; ?></dd>
		<dt>Slug: </dt>
		<dd><?php echo $row_artigos['slug']; ?></dd>
		<dt>Imagem: </dt>
		<dd>
			<img src="../foto/<?php echo $row_artigos['imagem']; ?>" width="150" height="150">
		</dd>
		<dt>Categoria do Artigo: </dt>
		<dd><?php 
			$categorias_artigo = $row_artigos['categorias_artigo_id'];
			$result_cat_artigos = "SELECT * FROM categorias_artigos WHERE id = '$categorias_artigo'";
			$result_cat_artigos = mysqli_query($conn, $result_cat_artigos);
			$row_cat_artigos = mysqli_fetch_assoc($result_cat_artigos);
			echo $row_cat_artigos['nome']; ?>
		</dd>
		<dt>Situação do Artigo: </dt>
		<dd><?php 
			$situacoes_artigos = $row_artigos['situacoes_artigo_id'];
			$result_sit_artigos = "SELECT * FROM situacoes_artigos WHERE id = '$situacoes_artigos'";
			$result_sit_artigos = mysqli_query($conn, $result_sit_artigos);
			$row_sit_artigos = mysqli_fetch_assoc($result_sit_artigos);
			echo $row_sit_artigos['nome']; ?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_artigos['created'])){
				$inserido = $row_artigos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_artigos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_artigos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>