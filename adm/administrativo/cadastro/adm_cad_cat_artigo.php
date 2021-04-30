<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cadastrar Categoria de Artigo</h4>
			</div>
			<div class="modal-body">
				
				
				<form name="adm_cad_usuario" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_cad_cat_artigo.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nome" class="col-sm-2 control-label">Nome da Categoria</label>
						<div class="col-sm-10">
							<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome da Categoria">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Cadastrar</button>
						</div>
					</div>
				</form>
				
				
				
				
			</div>
		</div>
	</div>
</div>