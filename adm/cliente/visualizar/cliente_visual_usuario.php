<?php
	$id = $_SESSION['usuarioId'];
	//Buscar os dados referente ao usuario situado neste id
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Meu Perfil</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="cliente.php?link=3&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar Senha
				</button>
			</a>
			<a href="cliente.php?link=4&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Editar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Número da Inscrição: </dt>
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
		<dt>Foto: </dt>
		<dd>
			<?php if($row_usuario['foto'] == ""){ ?>
				<a href="cliente.php?link=3&id=<?php echo $row_usuario["id"]; ?>">
					<img src="cliente/foto/icone-perfil-5487dsfeer87rt9erwr55w123132.png" width="100" height="100">
				</a>
			<?php }else{ ?>
				<img src="cliente/foto/<?php echo $row_usuario['foto']; ?>" width="100" height="100">
			<?php }?>			
		</dd>
	</dl>
	
	<div class="page-header">
        <h1>Plano</h1>
	</div>
	<?php
		//Buscar os dados referente ao usuario situado neste id
		$result_usuarios_planos = "SELECT * FROM usuarios_planos WHERE usuario_id = '$id' LIMIT 1";
		$resultado_usuarios_planos = mysqli_query($conn, $result_usuarios_planos);
		$row_usuarios_planos = mysqli_fetch_assoc($resultado_usuarios_planos);	
	?>
	
	<dl class="dl-horizontal">		
		<dt>Número do Plano: </dt>
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
								<a href="cliente.php?link=5&id=<?php echo $row_carrinhos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
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