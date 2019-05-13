<?php
	require_once('header.php');
?> 
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card">
				  <div class="card-header">
				    <span>Nova Imagem</span>
				  </div>
				  <div class="card-body">
				    <form>
						<div class="form-row">						    
						    <div class="form-group col-md-8">
						      <label for="title-img">Título da imagem</label>
						      <input type="text" class="form-control" name="title-img"  placeholder="Informe o título da imagem">
						    </div>				    
						    <div class="form-group col-md-4">
						      <label for="categoria">Categoria</label>
						      <select id="categoria" class="form-control">					        
						        <option>Gratis</option>
						        <option>Gold</option>
						      </select>
						    </div>
						    <div class="form-group">
							    <label for="anexo-img">Anexo da imagem</label>
							    <input type="file" class="form-control-file" name="anexo-img" id="anexo-img">
							</div>										
						    <div class="form-group col-md-12">
							  <label for="description-img">Descrição da imagem</label>
							  <textarea class="form-control" rows="5" name="description-img" id="description-img"></textarea>
							</div>    
				       	</div><!-- form-row -->
					</form>
					<div class="row btn-action-2">
						<div class="col-sm-8"></div>
						  	<div class="col-sm-4">
						  		<button type="submit" class="btn btn-lg btn-primary btn-default" data-toggle="modal" data-target="#save"><i class="far fa-save"></i> Salvar Imagem</button>
						  	</div>					  	
					  	</div>
					</div>
				  </div>
				</div>
			</div><!--col-sm-12-->
		</div><!-- row -->
	</div><!--container-->

	<!-- Modal Dados inseridos com sucesso -->
	<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-success">
	        <h5 class="modal-title" id="exampleModalLabel">Dados inserido com sucesso!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Dado foi inserido com sucesso!</p>
	      </div>
	      <div class="modal-footer">	      	
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>	        
	      </div>
	    </div>
	  </div>
	</div>
</main>
<?php
	require_once('footer.php');
?> 