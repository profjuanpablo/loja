<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_transacoes = "SELECT * FROM transacoes WHERE id = '$id' LIMIT 1";
		$resultado_transacoes = mysqli_query($conn, $result_transacoes);
		$row_transacoes = mysqli_fetch_assoc($resultado_transacoes);	
	}
		
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Transação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=83"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_sit_comentario" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_transac.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Código da Transação</label>
			<div class="col-sm-10">
				<input type="text" name="transacao_cod" class="form-control" id="inputEmail3" placeholder="transacao_cod" required
				<?php
					if(!empty($row_transacoes['transacao_cod'])){
						echo "value='".$row_transacoes['transacao_cod']."'";
					}
					if(!empty($_SESSION['value_transacao_cod'])){
						echo "value='".$_SESSION['value_transacao_cod']."'";
						unset($_SESSION['value_transacao_cod']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['transacao_cod_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['transacao_cod_vazio']."</p>";
						unset($_SESSION['transacao_cod_vazio']);
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Tipo de Pagamento</label>
			<div class="col-sm-10">
				<select class="form-control" name="tipo_pagamento">
					<option value="">Selecione</option>
					
					<option value="Boleto"<?php
					if(!empty($_SESSION['value_tipo_pagamento'])){
						if($_SESSION['value_tipo_pagamento'] == "Boleto"){
							echo 'selected';
							unset($_SESSION['value_tipo_pagamento']);
						}
					}
					if(!empty($row_transacoes['tipo_pagamento'])){
						if($row_transacoes['tipo_pagamento'] == "Boleto"){
							echo 'selected';
						}
					}
					?> >Boleto</option>
					
					<option value="Cartão de Crédito"<?php
					if(!empty($_SESSION['value_tipo_pagamento'])){
						if($_SESSION['value_tipo_pagamento'] == "Cartão de Crédito"){
							echo 'selected';
							unset($_SESSION['value_tipo_pagamento']);
						}
					}
					if(!empty($row_transacoes['tipo_pagamento'])){
						if($row_transacoes['tipo_pagamento'] == "Cartão de Crédito"){
							echo 'selected';
						}
					}
					?> >Cartão de Crédito</option>
					
					<option value="Pagamento Online"<?php
					if(!empty($_SESSION['value_tipo_pagamento'])){
						if($_SESSION['value_tipo_pagamento'] == "Pagamento Online"){
							echo 'selected';
							unset($_SESSION['value_tipo_pagamento']);
						}
					}
					if(!empty($row_transacoes['tipo_pagamento'])){
						if($row_transacoes['tipo_pagamento'] == "Pagamento Online"){
							echo 'selected';
						}
					}
					?> >Pagamento Online</option>
					
					<option value="Pagamento"<?php
					if(!empty($_SESSION['value_tipo_pagamento'])){
						if($_SESSION['value_tipo_pagamento'] == "Pagamento"){
							echo 'selected';
							unset($_SESSION['value_tipo_pagamento']);
						}
					}
					if(!empty($row_transacoes['tipo_pagamento'])){
						if($row_transacoes['tipo_pagamento'] == "Pagamento"){
							echo 'selected';
						}
					}
					?> >Pagamento</option>
				</select>
				<?php 
					if(!empty($_SESSION['tipo_pagamento_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['tipo_pagamento_vazio']."</p>";
						unset($_SESSION['tipo_pagamento_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Status da Transação</label>
			<div class="col-sm-10">
				<select class="form-control" name="status_transacao">
					<option value="">Selecione</option>
					
					<option value="Aguardando Pagamento"<?php
					if(!empty($_SESSION['value_status_transacao'])){
						if($_SESSION['value_status_transacao'] == "Aguardando Pagamento"){
							echo 'selected';
							unset($_SESSION['value_status_transacao']);
						}
					}
					if(!empty($row_transacoes['status_transacao'])){
						if($row_transacoes['status_transacao'] == "Aguardando Pagamento"){
							echo 'selected';
						}
					}
					?> >Aguardando Pagamento</option>
					
					<option value="Aprovado"<?php
					if(!empty($_SESSION['value_status_transacao'])){
						if($_SESSION['value_status_transacao'] == "Aprovado"){
							echo 'selected';
							unset($_SESSION['value_status_transacao']);
						}
					}
					if(!empty($row_transacoes['status_transacao'])){
						if($row_transacoes['status_transacao'] == "Aprovado"){
							echo 'selected';
						}
					}
					?> >Aprovado</option>
					
					<option value="Cancelado"<?php
					if(!empty($_SESSION['value_status_transacao'])){
						if($_SESSION['value_status_transacao'] == "Cancelado"){
							echo 'selected';
							unset($_SESSION['value_status_transacao']);
						}
					}
					if(!empty($row_transacoes['status_transacao'])){
						if($row_transacoes['status_transacao'] == "Cancelado"){
							echo 'selected';
						}
					}
					?> >Cancelado</option>
				</select>
				<?php 
					if(!empty($_SESSION['status_transacao_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['status_transacao_vazio']."</p>";
						unset($_SESSION['status_transacao_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cliente</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="nome" 
				<?php
					if(!empty($row_transacoes['nome'])){
						echo "value='".$row_transacoes['nome']."'";
					}
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
			</div>
		</div>		
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="email" 
				<?php
					if(!empty($row_transacoes['email'])){
						echo "value='".$row_transacoes['email']."'";
					}
					if(!empty($_SESSION['value_email'])){
						echo "value='".$_SESSION['value_email']."'";
						unset($_SESSION['value_email']);
					}
				?>					
				/>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">CEP</label>
			<div class="col-sm-10">
				<input type="text" name="cep" class="form-control" id="inputEmail3" placeholder="cep" 
				<?php
					if(!empty($row_transacoes['cep'])){
						echo "value='".$row_transacoes['cep']."'";
					}
					if(!empty($_SESSION['value_cep'])){
						echo "value='".$_SESSION['value_cep']."'";
						unset($_SESSION['value_cep']);
					}
				?>					
				/>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Endereço</label>
			<div class="col-sm-10">
				<input type="text" name="endereco" class="form-control" id="inputEmail3" placeholder="endereco" 
				<?php
					if(!empty($row_transacoes['endereco'])){
						echo "value='".$row_transacoes['endereco']."'";
					}
					if(!empty($_SESSION['value_endereco'])){
						echo "value='".$_SESSION['value_endereco']."'";
						unset($_SESSION['value_endereco']);
					}
				?>					
				/>
			</div>
		</div>			
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Número</label>
			<div class="col-sm-10">
				<input type="text" name="numero" class="form-control" id="inputEmail3" placeholder="numero" 
				<?php
					if(!empty($row_transacoes['numero'])){
						echo "value='".$row_transacoes['numero']."'";
					}
					if(!empty($_SESSION['value_numero'])){
						echo "value='".$_SESSION['value_numero']."'";
						unset($_SESSION['value_numero']);
					}
				?>					
				/>
			</div>
		</div>				
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Complemento</label>
			<div class="col-sm-10">
				<input type="text" name="complemento" class="form-control" id="inputEmail3" placeholder="complemento" 
				<?php
					if(!empty($row_transacoes['complemento'])){
						echo "value='".$row_transacoes['complemento']."'";
					}
					if(!empty($_SESSION['value_complemento'])){
						echo "value='".$_SESSION['value_complemento']."'";
						unset($_SESSION['value_complemento']);
					}
				?>					
				/>
			</div>
		</div>				
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Bairro</label>
			<div class="col-sm-10">
				<input type="text" name="bairro" class="form-control" id="inputEmail3" placeholder="bairro" 
				<?php
					if(!empty($row_transacoes['bairro'])){
						echo "value='".$row_transacoes['bairro']."'";
					}
					if(!empty($_SESSION['value_bairro'])){
						echo "value='".$_SESSION['value_bairro']."'";
						unset($_SESSION['value_bairro']);
					}
				?>					
				/>
			</div>
		</div>				
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cidade</label>
			<div class="col-sm-10">
				<input type="text" name="cidade" class="form-control" id="inputEmail3" placeholder="cidade" 
				<?php
					if(!empty($row_transacoes['cidade'])){
						echo "value='".$row_transacoes['cidade']."'";
					}
					if(!empty($_SESSION['value_cidade'])){
						echo "value='".$_SESSION['value_cidade']."'";
						unset($_SESSION['value_cidade']);
					}
				?>					
				/>
			</div>
		</div>				
		
		<div class="form-group">
			<label class="col-sm-2 control-label">UF</label>
			<div class="col-sm-10">
				<input type="text" name="uf" class="form-control" id="inputEmail3" placeholder="uf" 
				<?php
					if(!empty($row_transacoes['uf'])){
						echo "value='".$row_transacoes['uf']."'";
					}
					if(!empty($_SESSION['value_uf'])){
						echo "value='".$_SESSION['value_uf']."'";
						unset($_SESSION['value_uf']);
					}
				?>					
				/>
			</div>
		</div>		
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Produto</label>
			<div class="col-sm-10">
				<select class="form-control" name="produto_id">
					<option value="">Selecione</option>
					
					<option value="1"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 1){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_transacoes['produto_id'])){
						if($row_transacoes['produto_id'] == 1){
							echo 'selected';
						}
					}
					?> >Free</option>
					
					<option value="2"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 2){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_transacoes['produto_id'])){
						if($row_transacoes['produto_id'] == 2){
							echo 'selected';
						}
					}
					?> >Standard</option>
					
					<option value="3"<?php
					if(!empty($_SESSION['value_produto_id'])){
						if($_SESSION['value_produto_id'] == 3){
							echo 'selected';
							unset($_SESSION['value_produto_id']);
						}
					}
					if(!empty($row_transacoes['produto_id'])){
						if($row_transacoes['produto_id'] == 3){
							echo 'selected';
						}
					}
					?> >Ultimate</option>
				</select>
				<?php 
					if(!empty($_SESSION['produto_id_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['produto_id_vazio']."</p>";
						unset($_SESSION['produto_id_vazio']);
					}
				?> 
			</div>
		</div>	
		
		
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_transacoes['id'])){
					echo "value='".$row_transacoes['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Editar" onclick="return val_adm_cad_sit_comentario()">
			</div>
		</div>
	</form>
</div>