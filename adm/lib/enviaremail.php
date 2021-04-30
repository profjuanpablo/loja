<?php	
	include_once("PHPMailer/PHPMailerAutoload.php"); //Pacote enviar E-mail
	
	$Mailer = new PHPMailer();
		
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'nome-do-servidor';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'usuario@dominio.com';
	$Mailer->Password = 'senha';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'usuario@dominio.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Celke';

	//Assunto da mensagem
	$Mailer->Subject = $assunto;	

	$Mailer->Body = $mensagem;

	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';

	//Destinatario 
	$Mailer->AddAddress($email);
?>