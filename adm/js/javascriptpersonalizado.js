$(function(){
	//Ler sempre que o usuario digitar algo
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		//Verificar se a variavel pesquisa possui algo
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('administrativo/pesquisar/adm_busca_usuario.php', dados, function(retorna){
				//Mostrar os dados obtidos
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}
	});
});

/*Validar formulário usuário */
function val_adm_cad_usuario(){
	var nome = adm_cad_usuario.nome.value;
	var email = adm_cad_usuario.email.value;
	var senha = adm_cad_usuario.senha.value;
	var select_situacao = adm_cad_usuario.select_situacao.value;
	var select_nivel_acesso = adm_cad_usuario.select_nivel_acesso.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_usuario.nome.focus();
		return false;
	}
	
	if(email == "" || email.indexOf('@') == -1){
		alert("Campo email é obrigatorio!");
		adm_cad_usuario.email.focus();
		return false;
	}
	
	if(senha == "" || senha.length <= 5){
		alert("Campo senha é obrigatorio com minimo 6 caracteres!");
		adm_cad_usuario.senha.focus();
		return false;
	}
	
	if(select_situacao == ""){
		alert("Campo situação é obrigatorio!");
		adm_cad_usuario.select_situacao.focus();
		return false;
	}
	
	if(select_nivel_acesso == ""){
		alert("Campo nivel de acesso é obrigatorio!");
		adm_cad_usuario.select_nivel_acesso.focus();
		return false;
	}
	
}

/*Validar formulário situacao usuário */
function val_adm_cad_situacoes(){
	var nome = adm_cad_situacoes.nome.value;
	var cor = adm_cad_situacoes.cor.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_situacoes.nome.focus();
		return false;
	}	
	if(cor == ""){
		alert("Campo cor é obrigatorio!");
		adm_cad_situacoes.cor.focus();
		return false;
	}
}

/*Validar formulário nivel de acesso usuário */
function val_cad_nivel_acesso(){
	var nome = adm_cad_nivel_acesso.nome.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_nivel_acesso.nome.focus();
		return false;
	}	
}

/*Validar formulário situacao para artigos */
function val_adm_cad_sit_artigos(){
	var nome = adm_cad_sit_artigos.nome.value;
	var cor = adm_cad_sit_artigos.cor.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_sit_artigos.nome.focus();
		return false;
	}	
	if(cor == ""){
		alert("Campo cor é obrigatorio!");
		adm_cad_sit_artigos.cor.focus();
		return false;
	}	
}


/*Validar formulário artigos */
function val_adm_cad_artigos(){
	var titulo = adm_cad_artigos.titulo.value;
	var slug = adm_cad_artigos.slug.value;	
	var imagem = adm_cad_artigos.imagem.value;	
	var categorias_artigo_id = adm_cad_artigos.categorias_artigo_id.value;	
	var situacoes_artigo_id = adm_cad_artigos.situacoes_artigo_id.value;
	
	if(titulo == ""){
		alert("Campo titulo é obrigatorio!");
		adm_cad_artigos.titulo.focus();
		return false;
	}	
	if(slug == ""){
		alert("Campo slug é obrigatorio!");
		adm_cad_artigos.slug.focus();
		return false;
	}	
	if(imagem == ""){
		alert("A imagem é obrigatoria!");
		adm_cad_artigos.imagem.focus();
		return false;
	}	
	if(categorias_artigo_id == ""){
		alert("Campo categoria é obrigatorio!");
		adm_cad_artigos.categorias_artigo_id.focus();
		return false;
	}	
	if(situacoes_artigo_id == ""){
		alert("Campo Situação é obrigatorio!");
		adm_cad_artigos.situacoes_artigo_id.focus();
		return false;
	}
	
}

/*Validar formulário artigos */
function val_adm_edi_artigos(){
	var titulo = adm_edi_artigos.titulo.value;
	var conteudo = adm_edi_artigos.conteudo.value;
	var slug = adm_edi_artigos.slug.value;	
	var categorias_artigo_id = adm_edi_artigos.categorias_artigo_id.value;	
	var situacoes_artigo_id = adm_edi_artigos.situacoes_artigo_id.value;
	
	if(titulo == ""){
		alert("Campo titulo é obrigatorio!");
		adm_edi_artigos.titulo.focus();
		return false;
	}	
	
	if(conteudo == ""){
		alert("Campo conteúdo é obrigatorio!");
		adm_edi_artigos.conteudo.focus();
		return false;
	}
	if(slug == ""){
		alert("Campo slug é obrigatorio!");
		adm_edi_artigos.slug.focus();
		return false;
	}		
	if(categorias_artigo_id == ""){
		alert("Campo categoria é obrigatorio!");
		adm_edi_artigos.categorias_artigo_id.focus();
		return false;
	}	
	if(situacoes_artigo_id == ""){
		alert("Campo Situação é obrigatorio!");
		adm_edi_artigos.situacoes_artigo_id.focus();
		return false;
	}
	
}


/*Validar formulário comentario artigo */
function val_adm_cad_sit_coment(){
	var nome = adm_cad_sit_coment.nome.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_sit_coment.nome.focus();
		return false;
	}	
	
	
}

/*Validar formulário comentario artigo */
function val_cad_coment_artigo(){
	var nome = adm_cad_coment_artigo.nome.value;
	var email = adm_cad_coment_artigo.email.value;
	var mensagem = adm_cad_coment_artigo.mensagem.value;
	var artigo_id = adm_cad_coment_artigo.artigo_id.value;
	var situacoes_comentario_id = adm_cad_coment_artigo.situacoes_comentario_id.value;
	
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
	
	if(artigo_id == ""){
		alert("Campo artigo é obrigatorio!");
		adm_cad_coment_artigo.artigo_id.focus();
		return false;
	}
	
	if(situacoes_comentario_id == ""){
		alert("Campo situacoes é obrigatorio!");
		situacoes_comentario_id.email.focus();
		return false;
	}
}


/*Validar formulário mensagem de contato */
function val_cad_msg_contato(){
	var nome = adm_cad_msg_contato.nome.value;
	var email = adm_cad_msg_contato.email.value;
	var telefone = adm_cad_msg_contato.telefone.value;
	var assunto = adm_cad_msg_contato.assunto.value;
	var mensagem = adm_cad_msg_contato.mensagem.value;
	var situacoes_contato_id = adm_cad_msg_contato.situacoes_contato_id.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_msg_contato.nome.focus();
		return false;
	}	
	
	if(email == ""){
		alert("Campo email é obrigatorio!");
		adm_cad_msg_contato.email.focus();
		return false;
	}
	
	if(telefone == ""){
		alert("Campo telefone é obrigatorio!");
		adm_cad_msg_contato.telefone.focus();
		return false;
	}
	
	if(assunto == ""){
		alert("Campo assunto é obrigatorio!");
		adm_cad_msg_contato.assunto.focus();
		return false;
	}
	
	if(mensagem == ""){
		alert("Campo mensagem é obrigatorio!");
		adm_cad_msg_contato.mensagem.focus();
		return false;
	}
	
	if(situacoes_contato_id == ""){
		alert("Campo situação é obrigatorio!");
		adm_cad_msg_contato.situacoes_contato_id.focus();
		return false;
	}
}


/*Validar formulário situacao mensagem de contato */
function val_adm_cad_sit_contato(){
	var nome = adm_cad_sit_contato.nome.value;
	var cor = adm_cad_sit_contato.cor.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_sit_contato.nome.focus();
		return false;
	}	
	
	if(cor == ""){
		alert("Campo cor é obrigatorio!");
		adm_cad_sit_contato.cor.focus();
		return false;
	}
}

/*Validar formulário situacao do comentário no artigo */
function val_adm_cad_sit_comentario(){
	var nome = adm_cad_sit_comentario.nome.value;
	var cor = adm_cad_sit_comentario.cor.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_sit_comentario.nome.focus();
		return false;
	}	
	if(cor == ""){
		alert("Campo cor é obrigatorio!");
		adm_cad_sit_comentario.cor.focus();
		return false;
	}	
}

/*Validar formulário situacao do carrousel */
function val_adm_cad_sit_carrousel(){
	var nome = adm_cad_sit_carrousel.nome.value;
	var cor = adm_cad_sit_carrousel.cor.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_sit_carrousel.nome.focus();
		return false;
	}	
	if(cor == ""){
		alert("Campo cor é obrigatorio!");
		adm_cad_sit_carrousel.cor.focus();
		return false;
	}	
}


/*Validar formulário Carrousel */
function val_adm_cad_carrousel(){
	var nome = adm_cad_carrousel.nome.value;
	var imagem = adm_cad_carrousel.imagem.value;	
	var situacoes_carrouse_id = adm_cad_carrousel.situacoes_carrouse_id.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_carrousel.nome.focus();
		return false;
	}
	if(imagem == ""){
		alert("A imagem é obrigatoria!");
		adm_cad_carrousel.imagem.focus();
		return false;
	}	
	if(situacoes_carrouse_id == ""){
		alert("Campo Situação é obrigatorio!");
		adm_cad_carrousel.situacoes_carrouse_id.focus();
		return false;
	}	
}

/*Validar formulário Editar Carrousel */
function val_adm_edi_carrouses(){
	var nome = adm_edi_carrouses.nome.value;	
	var situacoes_carrouse_id = adm_edi_carrouses.situacoes_carrouse_id.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_edi_carrouses.nome.focus();
		return false;
	}	
	if(situacoes_carrouse_id == ""){
		alert("Campo Situação é obrigatorio!");
		adm_edi_carrouses.situacoes_carrouse_id.focus();
		return false;
	}	
}



/*Autocompletar endereco utilizando https://viacep.com.br/ */

	function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();		
                alert("Formato de CEP inválido.");		
				cad_usuario.cep.focus();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

/*Fim Autocompletar endereco utilizando https://viacep.com.br/ */



//Verifica se CPF é válido
function val_cad_usuario() {
	var strCPF = cad_usuario.cpf.value;	
    var Soma;
    var Resto;
    Soma = 0;   
    //strCPF  = RetiraCaracteresInvalidos(strCPF,11);
    if (strCPF == "00000000000"){
		alert("CPF inválido");
		cad_usuario.cpf.focus();
		return false;		
	}
    for (i=1; i<=9; i++){
		Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); 		
	}
    Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11)) 
	Resto = 0;

    if (Resto != parseInt(strCPF.substring(9, 10)) ){
		alert("CPF inválido");
		cad_usuario.cpf.focus();
		return false;				
	}
	Soma = 0;
    for (i = 1; i <= 10; i++)
       Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11)) 
	Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ){
		alert("CPF inválido");
		cad_usuario.cpf.focus();
		return false;		
	}
}
