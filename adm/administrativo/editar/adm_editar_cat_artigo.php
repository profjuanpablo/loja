<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Editar Categoria de Artigo</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_cat_artigo.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="recipient-name" class="col-sm-2 control-label">Nome: </label>
						<div class="col-sm-10">
							<input name="nome" type="text" class="form-control" id="nome-categoria">
						</div>
					</div>							
					<input name="id" type="hidden" class="form-control" id="id-categoria" value="">
					<button type="submit" class="btn btn-warning">Alterar</button>			 
				</form>
			  </div>			  
		</div>
	</div>
</div>