<?php
	include_once("../../conexao/conexao.php");
	include_once('../../../lib/confin_url.php');
	$id = $_GET['id'];
	
	//Buscar os a ordem do slide a ser apagado
	$result_carrouses = "SELECT * FROM carrouses WHERE id = '$id' LIMIT 1";
	$resultado_carrouses = mysqli_query($conn, $result_carrouses);
	$row_carrouses = mysqli_fetch_assoc($resultado_carrouses);
	$ordem = $row_carrouses['ordem'];
	
	$result_carrouses = "DELETE FROM carrouses WHERE id = '$id'";
	$resultado_carrouses = mysqli_query($conn, $result_carrouses);	
	
	//Selecionar todos os itens da tabela 
	$result_carrouse = "SELECT * FROM carrouses ORDER BY ordem ASC";
	$resultado_carrouse = mysqli_query($conn , $result_carrouse);

	//Contar o total de itens
	$total_carrouses = mysqli_num_rows($resultado_carrouse);
	$total_carrouses++;
	
	//Pesquisar todos os slides com ordem maior do qual foi apagado
	$resulta_total_carroses = "SELECT * FROM carrouses WHERE ordem BETWEEN '$ordem' AND '$total_carrouses'";
	$resultado_total_carroses = mysqli_query($conn , $resulta_total_carroses);
	while($row_carrouse = mysqli_fetch_assoc($resultado_total_carroses)){
		$id_carrosel = $row_carrouse['id'];
		$ordem_alterada = $row_carrouse['ordem'];
		$ordem_alterada = $ordem_alterada - 1;
		if($row_carrouse['ordem'] >= $ordem){
			$result_carrouses_ordem = "UPDATE carrouses SET ordem='$ordem_alterada', modified =  NOW() WHERE id = '$id_carrosel'";
			$resultado_carrouses = mysqli_query($conn , $result_carrouses_ordem);
		}
	}
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			$url = pg.'/adm/administrativo.php?link=67'; 
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				<script type=\"text/javascript\">
					alert(\"Carrousel apagado com Sucesso.\");
				</script>
			";	
		}else{
			$url = pg.'/adm/administrativo.php?link=67'; 
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
				<script type=\"text/javascript\">
					alert(\"Carrousel não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>