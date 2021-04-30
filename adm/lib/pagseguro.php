<?php
	require_once("PagSeguroLibrary/PagSeguroLibrary.php");
	
	
		//Inicio PagSeguro
		$paymentRequest = new PagSeguroPaymentRequest();  
		$paymentRequest->setCurrency("BRL"); 
		
				
		$paymentRequest->setSender(  
		  $nome,  
		  $email
		);  
		
		// 1- PAC(Encomenda Normal)
		// 2-SEDEX
		// 3-NOT_SPECIFIED(Não especificar tipo de frete)
		
		$paymentRequest->setShippingType(3);
		
		$paymentRequest->setShippingAddress(  
		  $cep,  
		  $endereco,  
		  $numero,  
		  $complemento,  
		  $bairro,  
		  $cidade,  
		  $estado,  
		  'BRA'  
		); 
		
		  
		// URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento  
		//$paymentRequest->setRedirectUrl("http://www.lojamodelo.com.br");  
		  
		// URL para onde serão enviadas notificações (POST) indicando alterações no status da transação  
		//$paymentRequest->addParameter('notificationURL', 'http://www.lojamodelo.com.br/nas');		
		
		if($plano_id == 2){
			$preco = '49,00';
			$paymentRequest->addItem('2', 'Standard', 1, 49.00);
		}
		if($plano_id == 3){
			$preco = '89,00';
			$paymentRequest->addItem('3', 'Ultimate', 1, 89.00);
		}
		echo $plano_id;
		$result_carrinho = "INSERT INTO carrinhos (plano_id, preco, usario_id, created) VALUES ('$plano_id', '$preco', '$usuario_id', NOW())";
		$resultado_carrinho = mysqli_query($conn, $result_carrinho);
		$carrinho_id = mysqli_insert_id($conn);
		
		// Referenciando a transação do PagSeguro em seu sistema  
		$paymentRequest->setReference($carrinho_id);  
		
		try { 
			$credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
			$checkoutUrl = $paymentRequest->register($credentials);  
			header("Location: $checkoutUrl");
		  
		} catch (PagSeguroServiceException $e) {  
			die($e->getMessage());  
		} 

		//$credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
		//$checkoutUrl = $paymentRequest->register($credentials); 

		
	
	//Fim PagSeguro
?>