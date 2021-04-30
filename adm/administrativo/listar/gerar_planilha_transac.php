<?php
	include_once("../../conexao/conexao.php");	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Transacoes</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'transacoes_geral.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Quantidade de Transaçoes</tr>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Transação</b></td>';
		$html .= '<td><b>Status</b></td>';
		$html .= '<td><b>Cliente</b></td>';
		$html .= '<td><b>Data da Transação</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_transacoes = "SELECT id, transacao_cod, status_transacao, nome, data_transacao FROM transacoes";
		$resultado_transacoes = mysqli_query($conn , $result_transacoes);
		
		while($row_transacoes = mysqli_fetch_assoc($resultado_transacoes)){
			$html .= '<tr>';
			$html .= '<td>'.$row_transacoes['id'].'</td>';
			$html .= '<td>'.$row_transacoes['transacao_cod'].'</td>';
			$html .= '<td>'.$row_transacoes['status_transacao'].'</td>';
			$html .= '<td>'.$row_transacoes['nome'].'</td>';
			$html .= '<td>'.$row_transacoes['data_transacao'].'</td>';
			$html .= '</tr>';
		}
		$html .= '</table>';	
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>