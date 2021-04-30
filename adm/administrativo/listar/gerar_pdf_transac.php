<?php
	include_once("../../conexao/conexao.php");	
	
	// Criamos uma tabela HTML com o formato da planilha
	$html = '<table border="1">';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td><b>ID</b></td>';
	$html .= '<td><b>Transação</b></td>';
	$html .= '<td><b>Status</b></td>';
	$html .= '<td><b>Cliente</b></td>';
	$html .= '<td><b>Data da Transação</b></td>';
	$html .= '</tr>';	
	$html .= '</thead>';	
	$html .= '<tbody>';
	
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
	$html .= '</tbody>';
	$html .= '</table>';		
		
	/* Inicio gerar PDF */
	include_once("../../lib/dompdf/autoload.inc.php");
	
	// reference the Dompdf namespace
	use Dompdf\Dompdf;
	
	//Instanciando a classe do dompdf
	$dompdf = new Dompdf();
	
	//Inserir o conteúdo a ser impresso no pdf
	$dompdf->loadHtml('<h1 style="text_align: center;">Relatório de transações</h1>'.$html);
	
	//Método responsável em renderizar
	$dompdf->render();
	
	$dompdf->stream("relatorio_transacoes.php");
	
	//Exibir o resultado
	$dompdf->stream();
	
	/* FIM gerar PDF */
?>