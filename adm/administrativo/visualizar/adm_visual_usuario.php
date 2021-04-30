<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=2">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=4&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo.php?link=15&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-primary">
					Editar Senha
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_usuario.php?id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_usuario['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_usuario['nome']; ?></dd>
		<dt>E-mail: </dt>
		<dd><?php echo $row_usuario['email']; ?></dd>
		<dt>CPF: </dt>
		<dd><?php echo $row_usuario['cpf']; ?></dd>
		<dt>Telefone: </dt>
		<dd><?php echo $row_usuario['telefone']; ?></dd>
		<dt>CEP: </dt>
		<dd><?php echo $row_usuario['cep']; ?></dd>
		<dt>Logradouro: </dt>
		<dd><?php echo $row_usuario['endereco']; ?></dd>
		<dt>Número: </dt>
		<dd><?php echo $row_usuario['numero']; ?></dd>
		<dt>Complemento: </dt>
		<dd><?php echo $row_usuario['complemento']; ?></dd>
		<dt>Bairro: </dt>
		<dd><?php echo $row_usuario['bairro']; ?></dd>
		<dt>Cidade: </dt>
		<dd><?php echo $row_usuario['cidade']; ?></dd>
		<dt>Estado: </dt>
		<dd><?php echo $row_usuario['estado']; ?></dd>
		<dt>Situação: </dt>
		<dd><?php 
			$situacao_atual = $row_usuario['situacoe_id'];
			$result_situacao = "SELECT * FROM situacoes WHERE id = '$situacao_atual'";
			$result_situacao = mysqli_query($conn, $result_situacao);
			$row_situacoes = mysqli_fetch_assoc($result_situacao);
			echo $row_situacoes['nome']; ?>
		</dd>
		<dt>Nivel de Acesso: </dt>
		<dd><?php 
			$niveis_acesso_atual = $row_usuario['niveis_acesso_id'];
			$result_niveis_acesso = "SELECT * FROM niveis_acessos WHERE id = '$niveis_acesso_atual'";
			$result_niveis_acesso = mysqli_query($conn, $result_niveis_acesso);
			$row_niveis_acesso = mysqli_fetch_assoc($result_niveis_acesso);
			echo $row_niveis_acesso['nome']; ?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_usuario['created'])){
				$inserido = $row_usuario['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_usuario['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_usuario['modified'])); 
			} ?>
		</dd>
	</dl>
	
	<div class="page-header">
        <h1>Plano</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=98&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
		</div>
	</div>
	<?php
		//Buscar os dados referente ao usuario situado neste id
		$result_usuarios_planos = "SELECT * FROM usuarios_planos WHERE usuario_id = '$id' LIMIT 1";
		$resultado_usuarios_planos = mysqli_query($conn, $result_usuarios_planos);
		$row_usuarios_planos = mysqli_fetch_assoc($resultado_usuarios_planos);	
	?>
	
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_usuarios_planos['id']; ?></dd>
		<dt>Data de Vencimento: </dt>
		<dd><?php 
			if(isset($row_usuarios_planos['data_vencimento'])){
				$data_vencimento = $row_usuarios_planos['data_vencimento'];
				echo date('d/m/Y H:i:s', strtotime($data_vencimento)); 
			}?>
		</dd>
		<dt>Plano: </dt>
		<dd><?php 
			if(isset($row_usuarios_planos['plano_id'])){
				if($row_usuarios_planos['plano_id'] == 3){
					echo "Ultimate";
				}elseif($row_usuarios_planos['plano_id'] == 2){
					echo "Standard";					
				}else{
					echo "Free";
				}
			}?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_usuario['created'])){
				$inserido = $row_usuario['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_usuario['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_usuario['modified'])); 
			} ?>
		</dd>
	</dl>
	
	<div class="page-header">
        <h1>Carrinho</h1>
	</div>
	<?php
		//Buscar os dados referente ao usuario situado neste id
		$result_carrinhos = "SELECT * FROM carrinhos WHERE usario_id = '$id' ORDER BY id DESC";
		$resultado_carrinhos = mysqli_query($conn, $result_carrinhos);
	?>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Cliente</th>
						<th class="text-center">Transação</th>
						<th class="text-center">Status</th>
						<th class="text-center">Plano</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_carrinhos = mysqli_fetch_assoc($resultado_carrinhos)){?>
						<tr>
							<td class="text-center"><?php echo $row_carrinhos["id"]; ?></td>
							<td class="text-center"><?php 
								$usuarios_id = $row_carrinhos["usario_id"]; 
								$result_usuarios = "SELECT nome FROM usuarios WHERE id = '$usuarios_id' LIMIT 1";
								$resultado_usuarios = mysqli_query($conn, $result_usuarios);
								$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);
								echo $row_usuarios['nome']; ?>
							</td>
							<td class="text-center"><?php echo $row_carrinhos["transacao_cod"]; ?></td>
							<td class="text-center"><?php
								$transacao_cod = $row_carrinhos["transacao_cod"]; 
								$result_transacao = "SELECT status_transacao FROM transacoes WHERE transacao_cod = '$transacao_cod' ORDER BY id DESC LIMIT 1";
								$resultado_transacao = mysqli_query($conn, $result_transacao);
								$row_transacao = mysqli_fetch_assoc($resultado_transacao);
								echo $row_transacao['status_transacao'];?>
							</td>
							<td class="text-center"><?php 
								if(isset($row_carrinhos['plano_id'])){
									if($row_carrinhos['plano_id'] == 3){
										echo "Ultimate";
									}elseif($row_carrinhos['plano_id'] == 2){
										echo "Standard";					
									}else{
										echo "Free";
									}
								}?>
							</td>
							<td class="text-center">
								<a href="administrativo.php?link=92&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>								
								<a href="administrativo.php?link=99&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-info">
										Visualizar Transação
									</button>
								</a>
								<a href="administrativo.php?link=90&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_carrinho.php?id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
	
</div>