/*Validar formulário comentario artigo */
function val_cad_coment_artigo(){
	var nome = adm_cad_coment_artigo.nome.value;
	var email = adm_cad_coment_artigo.email.value;
	var mensagem = adm_cad_coment_artigo.mensagem.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_coment_artigo.nome.focus();
		return false;
	}	
	
	if(email == ""){
		alert("Campo email é obrigatorio!");
		adm_cad_coment_artigo.email.focus();
		return false;
	}
	
	if(mensagem == ""){
		alert("Campo mensagem é obrigatorio!");
		adm_cad_coment_artigo.mensagem.focus();
		return false;
	}
}

/*Validar formulário Mensagem de contato */
function val_cad_msg_contato(){
	var nome = cad_msg_contato.nome.value;
	var email = cad_msg_contato.email.value;
	var telefone = cad_msg_contato.telefone.value;
	var assunto = cad_msg_contato.assunto.value;
	var mensagem = cad_msg_contato.mensagem.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		cad_msg_contato.nome.focus();
		return false;
	}	
	
	if(email == ""){
		alert("Campo email é obrigatorio!");
		cad_msg_contato.email.focus();
		return false;
	}
	
	if(telefone == ""){
		alert("Campo telefone é obrigatorio!");
		cad_msg_contato.telefone.focus();
		return false;
	}
	
	if(assunto == ""){
		alert("Campo assunto é obrigatorio!");
		cad_msg_contato.assunto.focus();
		return false;
	}
	
	if(mensagem == ""){
		alert("Campo mensagem é obrigatorio!");
		cad_msg_contato.mensagem.focus();
		return false;
	}
}
