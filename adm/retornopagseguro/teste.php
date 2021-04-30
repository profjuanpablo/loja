<?php

include_once("../conexao/conexao.php");

		/*$transacao_cod = $_REQUEST['TransacaoID'];		
		$carrinho_id = $_REQUEST['Referencia'];		
		$data_transacao = $_REQUEST['DataTransacao'];
		$data_transacao = implode('-', explode('/', $data_transacao));
		$data_transacao = date('Y-m-d H:i:s', strtotime($data_transacao));
		$tipo_pagamento = $_REQUEST['TipoPagamento'];
		$status_transacao = $_REQUEST['StatusTransacao'];
		$nome = $_REQUEST['CliNome'];
		$email = $_REQUEST['CliEmail'];
		$endereco = $_REQUEST['CliEndereco'];
		$numero = $_REQUEST['CliNumero'];
		$complemento = $_REQUEST['CliComplemento'];
		$bairro = $_REQUEST['CliBairro'];
		$cidade = $_REQUEST['CliCidade'];
		$uf = $_REQUEST['CliEstado'];
		$cep = $_REQUEST['CliCEP'];*/
		
$transacao_cod = '5615615615615';		
$carrinho_id = '';		
$data_transacao = '15/07/2016 10:20:35';
$data_transacao = implode('-', explode('/', $data_transacao));
$data_transacao = date('Y-m-d H:i:s', strtotime($data_transacao));
$tipo_pagamento = 'Cartão de Crédito';
$status_transacao = 'Cancelado';
$nome = 'Cesar Szpak';
$email = 'celkeadm@gmail.com';
$endereco = 'Av. Republica Argentina';
$numero = '5550';
$complemento = '';
$bairro = 'Capão Raso';
$cidade = 'Curitiba';
$uf = 'PR';
$cep = '81050001';

		switch($status_transacao){
			case 'Aprovado':
			$status_transacao = 'Aprovado';
			break;
			
			case 'Completo':
			$status_transacao = 'Aprovado';
			break;
			
			case 'Cancelado':
			$status_transacao = 'Cancelado';
			break;
			
			case 'Devolvido':
			$status_transacao = 'Cancelado';
			break;
			
			case 'Aguardando Pagto':
			$status_transacao = 'Aguardando Pagamento';
			break;
			
			case 'Em Análise':
			$status_transacao = 'Aguardando Pagamento';
			break;
			
		}		
		
		if($status_transacao == 'Aprovado'){
			$result_carrinho = "SELECT id, plano_id, transacao_cod, usario_id  FROM carrinhos WHERE id = '$carrinho_id' or transacao_cod = '$transacao_cod'";
			$resultado_carrinho = mysqli_query($conn, $result_carrinho);
			$row_carrinho = mysqli_fetch_assoc($resultado_carrinho);
			$carrinho_id = $row_carrinho['id'];
			$usuario_id = $row_carrinho['usario_id'];
			$plano_id = $row_carrinho['plano_id'];
			
			if(($row_carrinho['transacao_cod'] == '')||($row_carrinho['transacao_cod'] == 'NULL')){
				$result_carrinhos = "UPDATE carrinhos SET transacao_cod='$transacao_cod', modified =  NOW() WHERE usario_id = '$usuario_id'";
				$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
			}
			
			$data_vencimento = date("Y-m-d H:i:s");
			$data_vencimento = strtotime($data_vencimento);
			$data_vencimento = strtotime('+31 day', $data_vencimento);
			$data_vencimento = date('Y-m-d H:i:s', $data_vencimento);
				
			$result_user_plano = "UPDATE usuarios_planos SET data_vencimento='$data_vencimento', plano_id='$plano_id', modified =  NOW() WHERE usuario_id = '$usuario_id'";
			$resultado_user_plano = mysqli_query($conn, $result_user_plano);
			
			//Inserir no banco a transação
			$result_transacoes = "INSERT INTO transacoes (
				transacao_cod,
				data_transacao,
				tipo_pagamento,
				status_transacao,
				nome,
				email, 
				endereco,
				numero,
				complemento,
				bairro,
				cidade,
				uf,
				cep,
				produto_id,
				carrinho_id,
				created) VALUES (
				'$transacao_cod',
				'$data_transacao',
				'$tipo_pagamento',
				'$status_transacao',
				'$nome',
				'$email',
				'$endereco',
				'$numero',
				'$complemento',
				'$bairro',
				'$cidade',
				'$uf',
				'$cep',
				'$plano_id',
				'$carrinho_id',
				NOW())";
			$resultado_transacoes = mysqli_query($conn, $result_transacoes);
		
			//Enviar e-mail			
			/*$assunto = 'Compra aprovada Celke';
			
			//Corpo da Mensagem
			$mensagem = "Olá <br><br>";
			$mensagem .= "Sua compra foi aprovada.<br>";
			$mensagem .= "Respeitosamente, celke.com.br<br>";
	
			include_once("../lib/enviaremail.php");	*/	
			//Fim Enviar e-mail
		}
		
		if($status_transacao == 'Cancelado'){
			$result_carrinho = "SELECT id, plano_id, transacao_cod, usario_id  FROM carrinhos WHERE id = '$carrinho_id' or transacao_cod = '$transacao_cod'";
			$resultado_carrinho = mysqli_query($conn, $result_carrinho);
			$row_carrinho = mysqli_fetch_assoc($resultado_carrinho);
			$carrinho_id = $row_carrinho['id'];
			$usuario_id = $row_carrinho['usario_id'];
			$plano_id = $row_carrinho['plano_id'];
					
			if(($row_carrinho['transacao_cod'] == '')||($row_carrinho['transacao_cod'] == 'NULL')){
				$result_carrinhos = "UPDATE carrinhos SET transacao_cod='$transacao_cod', modified =  NOW() WHERE usario_id = '$usuario_id'";
				$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
			}
				
			//$result_user_plano = "UPDATE usuarios_planos SET data_vencimento= NOW(), modified =  NOW() WHERE usuario_id = '$usuario_id'";
			$result_user_plano = "UPDATE usuarios_planos SET data_vencimento= NOW(), plano_id='$plano_id', modified =  NOW() WHERE usuario_id = '$usuario_id'";
			$resultado_user_plano = mysqli_query($conn, $result_user_plano);
			
			//Inserir no banco a transação
			$result_transacoes = "INSERT INTO transacoes (
				transacao_cod,
				data_transacao,
				tipo_pagamento,
				status_transacao,
				nome,
				email, 
				endereco,
				numero,
				complemento,
				bairro,
				cidade,
				uf,
				cep,
				produto_id,
				carrinho_id,
				created) VALUES (
				'$transacao_cod',
				'$data_transacao',
				'$tipo_pagamento',
				'$status_transacao',
				'$nome',
				'$email',
				'$endereco',
				'$numero',
				'$complemento',
				'$bairro',
				'$cidade',
				'$uf',
				'$cep',
				'$plano_id',
				'$carrinho_id',
				NOW())";
			$resultado_transacoes = mysqli_query($conn, $result_transacoes);
			
			//Enviar e-mail			
			/*$assunto = 'Compra cancelada Celke';
			
			//Corpo da Mensagem
			$mensagem = "Olá <br><br>";
			$mensagem .= "Sua compra foi cancelada.<br>";
			$mensagem .= "Respeitosamente, celke.com.br<br>";
	
			include_once("../lib/enviaremail.php");	*/	
			//Fim Enviar e-mail			
		}
		
		if($status_transacao == 'Aguardando Pagamento'){
			$result_carrinho = "SELECT id, plano_id, transacao_cod, usario_id  FROM carrinhos WHERE id = '$carrinho_id' or transacao_cod = '$transacao_cod'";
			$resultado_carrinho = mysqli_query($conn, $result_carrinho);
			$row_carrinho = mysqli_fetch_assoc($resultado_carrinho);
			$carrinho_id = $row_carrinho['id'];
			$usuario_id = $row_carrinho['usario_id'];
			$plano_id = $row_carrinho['plano_id'];
						
			if(($row_carrinho['transacao_cod'] == '')||($row_carrinho['transacao_cod'] == 'NULL')){
				$result_carrinhos = "UPDATE carrinhos SET transacao_cod='$transacao_cod', modified =  NOW() WHERE usario_id = '$usuario_id'";
				$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
			}
			
			//Inserir no banco a transação
			$result_transacoes = "INSERT INTO transacoes (
				transacao_cod,
				data_transacao,
				tipo_pagamento,
				status_transacao,
				nome,
				email, 
				endereco,
				numero,
				complemento,
				bairro,
				cidade,
				uf,
				cep,
				produto_id,
				carrinho_id,
				created) VALUES (
				'$transacao_cod',
				'$data_transacao',
				'$tipo_pagamento',
				'$status_transacao',
				'$nome',
				'$email',
				'$endereco',
				'$numero',
				'$complemento',
				'$bairro',
				'$cidade',
				'$uf',
				'$cep',
				'$plano_id',
				'$carrinho_id',
				NOW())";
			$resultado_transacoes = mysqli_query($conn, $result_transacoes);
			
			//Enviar e-mail			
			/*$assunto = 'Compra Aguardando Pagamento Celke';
			
			//Corpo da Mensagem
			$mensagem = "Olá <br><br>";
			$mensagem .= "Sua compra esta Aguardando Pagamento.<br>";
			$mensagem .= "Respeitosamente, celke.com.br<br>";
	
			include_once("../lib/enviaremail.php");		*/
			//Fim Enviar e-mail	
		}	
?>